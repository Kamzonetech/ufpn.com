<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\JpegEncoder;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddProjectComponent extends Component
{
    use WithFileUploads;

    public $title;

    public $description;

    public $client;

    public $date;

    public $photo;

    public $media_type;

    private $allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];

    private $allowedVideoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv', 'webm', 'm4v', '3gp'];

    public $message = [
        'title.required' => 'Please provide your project title',
        'description.required' => 'Please provide your project description',
        'client.required' => 'Please enter client name',
        'date.required' => 'Please select project date',
        'photo.required' => 'Please select a file (image or video)',
        'photo.mimes' => 'File must be an image (jpg, png, gif, webp, bmp) or video (mp4, avi, mov, wmv, flv, mkv, webm)',
        'photo.max' => 'File size must be less than 50MB',
    ];

    public function updatedPhoto($photo)
    {
        $this->validate([
            'photo' => 'required|max:51200',
        ]);

        if ($this->photo) {
            $fileExtension = strtolower($this->photo->getClientOriginalExtension());

            if ($this->isImage($fileExtension)) {
                $this->media_type = 'image';
                $this->dispatch('image_file', image_file: 'image_file');
            } elseif ($this->isVideo($fileExtension)) {
                $this->media_type = 'video';
                $this->dispatch('video_file', video_file: 'video_file');
            } else {
                $this->addError('photo', 'Unsupported file format!');
                $this->photo = null;
                $this->media_type = null;
            }
        }
    }

    private function isImage($extension)
    {
        return in_array(strtolower($extension), $this->allowedImageExtensions);
    }

    private function isVideo($extension)
    {
        return in_array(strtolower($extension), $this->allowedVideoExtensions);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => ['required', 'string', 'max:255', 'unique:projects,title'],
            'description' => 'required',
            'client' => 'required',
            'date' => 'required',
        ], $this->message);

        if ($this->photo) {
            $fileExtension = strtolower($this->photo->getClientOriginalExtension());

            if ($this->isImage($fileExtension)) {
                $this->validateOnly($fields, [
                    'photo' => 'required|mimes:jpg,jpeg,png,gif,webp,bmp|max:51200',
                ], $this->message);
            } elseif ($this->isVideo($fileExtension)) {
                $this->validateOnly($fields, [
                    'photo' => 'required|mimes:mp4,avi,mov,wmv,flv,mkv,webm,m4v,3gp|max:51200',
                ], $this->message);
            } else {
                $this->addError('photo', 'Unsupported file format!');
                $this->photo = null;
            }
        }
    }

    public function uploadProjectImage($image)
    {
        $image_parts = explode(';base64,', $image);
        $image_type_aux = explode('image/', $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $originalExtension = $this->photo ? $this->photo->getClientOriginalExtension() : 'jpg';
        $postImage = Carbon::now()->timestamp.'_project.'.$originalExtension;

        $manager = new ImageManager(new Driver);

        if (in_array(strtolower($image_type), ['jpeg', 'jpg', 'png', 'gif', 'webp', 'bmp'])) {
            $img = $manager->read($image_base64);

            if (strtolower($image_type) === 'png') {
                $img = $img->encode(new \Intervention\Image\Encoders\PngEncoder);
            } elseif (strtolower($image_type) === 'webp') {
                $img = $img->encode(new \Intervention\Image\Encoders\WebpEncoder);
            } elseif (strtolower($image_type) === 'gif') {
                $img = $img->encode(new \Intervention\Image\Encoders\GifEncoder);
            } else {
                $img = $img->encode(new JpegEncoder(80));
            }

            $path = public_path('admin/assets/images/projects/');
            if (! file_exists($path)) {
                mkdir($path, 0777, true);
            }
            file_put_contents($path.$postImage, $img);

            return $postImage;
        }

        return null;
    }

    public function storeMediaFile()
    {
        if (! $this->photo) {
            return null;
        }

        $fileExtension = strtolower($this->photo->getClientOriginalExtension());

        // Generate unique filename
        $originalName = pathinfo($this->photo->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName = Str::slug($originalName);
        $fileName = Carbon::now()->timestamp.'_'.$safeName.'.'.$fileExtension;

        // Define the storage path (relative to public directory)
        $storagePath = 'admin/assets/images/projects';

        // Create directory if it doesn't exist in public folder
        $publicPath = public_path($storagePath);
        if (! file_exists($publicPath)) {
            mkdir($publicPath, 0777, true);
        }

        // Method 1: Direct move (for Windows compatibility)
        try {
            // Get the temporary uploaded file path
            $tempPath = $this->photo->getRealPath();

            // Destination path in public folder
            $destination = $publicPath.DIRECTORY_SEPARATOR.$fileName;

            // Copy the file from temp location to public folder
            copy($tempPath, $destination);

            // Generate thumbnail for video
            if ($this->isVideo($fileExtension)) {
                $this->generateVideoThumbnail($destination, $publicPath, $fileName);
            }

            return $fileName;

        } catch (\Exception $e) {
            \Log::error('File move error: '.$e->getMessage());

            // Fallback: Use Livewire's store method
            try {
                $path = $this->photo->storeAs($storagePath, $fileName, 'public_uploads');

                // Generate thumbnail for video
                if ($this->isVideo($fileExtension)) {
                    $this->generateVideoThumbnail(public_path($path), $publicPath, $fileName);
                }

                return $fileName;
            } catch (\Exception $e2) {
                \Log::error('Fallback storage error: '.$e2->getMessage());

                return null;
            }
        }
    }

    private function generateVideoThumbnail($videoPath, $thumbnailPath, $videoFileName)
    {
        try {
            // Generate thumbnail using FFmpeg if available
            if (function_exists('shell_exec') && file_exists($videoPath)) {
                $thumbnailName = pathinfo($videoFileName, PATHINFO_FILENAME).'_thumb.jpg';
                $fullThumbnailPath = $thumbnailPath.$thumbnailName;

                // Use FFmpeg to capture first frame
                $ffmpegCommand = "ffmpeg -i \"{$videoPath}\" -ss 00:00:01 -vframes 1 -q:v 2 \"{$fullThumbnailPath}\" 2>&1";
                shell_exec($ffmpegCommand);

                // If FFmpeg fails, create a simple placeholder
                if (! file_exists($fullThumbnailPath)) {
                    $this->createVideoPlaceholder($thumbnailPath.$thumbnailName);
                }
            } else {
                // Create a simple placeholder if FFmpeg is not available
                $thumbnailName = pathinfo($videoFileName, PATHINFO_FILENAME).'_thumb.jpg';
                $this->createVideoPlaceholder($thumbnailPath.$thumbnailName);
            }
        } catch (\Exception $e) {
            // Log error
            \Log::error('Video thumbnail generation failed: '.$e->getMessage());
        }
    }

    private function createVideoPlaceholder($path)
    {
        $width = 320;
        $height = 180;

        $image = imagecreatetruecolor($width, $height);
        $bgColor = imagecolorallocate($image, 41, 128, 185);
        $textColor = imagecolorallocate($image, 255, 255, 255);

        imagefill($image, 0, 0, $bgColor);

        // Add video icon
        $iconSize = 50;
        $iconX = ($width - $iconSize) / 2;
        $iconY = ($height - $iconSize) / 2;

        $trianglePoints = [
            $iconX, $iconY,
            $iconX + $iconSize, $iconY + ($iconSize / 2),
            $iconX, $iconY + $iconSize,
        ];
        imagefilledpolygon($image, $trianglePoints, 3, $textColor);

        // Add text
        $text = 'VIDEO';
        $font = 5;
        $textWidth = imagefontwidth($font) * strlen($text);
        $textX = ($width - $textWidth) / 2;
        $textY = $iconY + $iconSize + 10;
        imagestring($image, $font, $textX, $textY, $text, $textColor);

        imagejpeg($image, $path, 80);
        imagedestroy($image);
    }

    public function addProject($formData = null)
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255', 'unique:projects,title'],
            'description' => 'required',
            'client' => 'required',
            'date' => 'required',
            'photo' => 'required|max:51200',
        ], $this->message);

        // Additional validation based on file type
        if ($this->photo) {
            $fileExtension = strtolower($this->photo->getClientOriginalExtension());

            if ($this->isImage($fileExtension)) {
                $this->validate([
                    'photo' => 'required|mimes:jpg,jpeg,png,gif,webp,bmp|max:51200',
                ], $this->message);
            } elseif ($this->isVideo($fileExtension)) {
                $this->validate([
                    'photo' => 'required|mimes:mp4,avi,mov,wmv,flv,mkv,webm,m4v,3gp|max:51200',
                ], $this->message);
            } else {
                $this->addError('photo', 'Unsupported file format!');

                return;
            }
        }

        // Handle media file storage
        $projectFileName = null;
        if ($this->isImage(strtolower($this->photo->getClientOriginalExtension())) && isset($formData['croped_image'])) {
            // Use cropped image if available
            $projectFileName = $this->uploadProjectImage($formData['croped_image']);
        } else {
            // Store original file (image or video)
            $projectFileName = $this->storeMediaFile();
        }

        if (! $projectFileName) {
            $this->addError('photo', 'Failed to upload file. Please try again.');

            return;
        }

        // Determine media type for database
        $fileExtension = strtolower($this->photo->getClientOriginalExtension());
        $mediaType = $this->isImage($fileExtension) ? 'image' : 'video';

        // Create project
        $project = Project::create([
            'title' => $this->title,
            'description' => $this->description,
            'client' => $this->client,
            'date' => $this->date,
            'photo' => $projectFileName,
            'media_type' => $mediaType,
        ]);

        $this->reset();
        $this->dispatch('feedback', feedback: 'Project created successfully');
    }

    public function render()
    {
        return view('livewire.admin.projects.admin-add-project-component')
            ->layout('livewire.admin.layouts.app');
    }
}
