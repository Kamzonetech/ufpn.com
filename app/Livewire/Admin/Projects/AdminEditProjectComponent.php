<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\JpegEncoder;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditProjectComponent extends Component
{
    use WithFileUploads;

    public $title;

    public $description;

    public $client;

    public $date;

    public $selProject;

    public $photo;

    public $currentMedia;

    public $isImage = true;

    public $newMediaPreview;

    // Add missing properties
    public $media_type = null;

    // Define allowed extensions arrays
    private $allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];

    private $allowedVideoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv', 'webm', 'm4v', '3gp'];

    protected $messages = [
        'title.required' => 'Please provide your project title',
        'description.required' => 'Please provide your project description',
        'client.required' => 'Please enter client name',
        'date.required' => 'Please select project date',
        'photo.max' => 'File size should not exceed 50MB',
        'photo.mimes' => 'Supported formats: Images (JPG, PNG, GIF) or Videos (MP4, AVI, MOV)',
        'photo.required' => 'Please select a file (image or video)',
    ];

    public function mount($id)
    {
        $this->selProject = Project::findOrFail($id);
        $this->title = $this->selProject->title;
        $this->description = $this->selProject->description;
        $this->client = $this->selProject->client;
        $this->date = $this->selProject->date;

        // Determine current media type
        $this->currentMedia = $this->selProject->photo;
        if ($this->currentMedia) {
            $extension = pathinfo($this->currentMedia, PATHINFO_EXTENSION);
            $this->isImage = $this->isImageFile($extension);
        }
    }

    // Add missing isImageFile method
    private function isImageFile($extension)
    {
        return in_array(strtolower($extension), $this->allowedImageExtensions);
    }

    // Add missing isVideoFile method for consistency
    private function isVideoFile($extension)
    {
        return in_array(strtolower($extension), $this->allowedVideoExtensions);
    }

    public function updatedPhoto($photo)
    {
        $this->validate([
            'photo' => 'nullable|max:51200',
        ]);

        if ($this->photo) {
            $fileExtension = strtolower($this->photo->getClientOriginalExtension());

            if ($this->isImage($fileExtension)) {
                $this->media_type = 'image';
                // Note: You need to define the 'image_file' event in your frontend
                // $this->dispatch('image_file');
            } elseif ($this->isVideo($fileExtension)) {
                $this->media_type = 'video';
                // Don't show cropper for videos
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
            'title' => ['required', 'string', 'max:255'],
            'description' => 'required',
        ], $this->messages); // Fixed: changed $this->message to $this->messages

        if ($this->photo) {
            $fileExtension = strtolower($this->photo->getClientOriginalExtension());

            if ($this->isImage($fileExtension)) {
                $this->validateOnly($fields, [
                    'photo' => 'nullable|mimes:jpg,jpeg,png,gif,webp,bmp|max:51200',
                ], $this->messages); // Fixed: changed $this->message to $this->messages
            } elseif ($this->isVideo($fileExtension)) {
                $this->validateOnly($fields, [
                    'photo' => 'nullable|mimes:mp4,avi,mov,wmv,flv,mkv,webm,m4v,3gp|max:51200',
                ], $this->messages); // Fixed: changed $this->message to $this->messages
            } else {
                $this->addError('photo', 'Unsupported file format!');
                $this->photo = null;
            }
        }
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

        // Define the storage directory in public folder
        $directory = 'admin/assets/images/projects';
        $fullPath = public_path($directory);

        // Create directory if it doesn't exist
        if (! is_dir($fullPath)) {
            mkdir($fullPath, 0755, true);
        }

        // Save the file
        try {
            $tempPath = $this->photo->getRealPath();
            $destination = $fullPath.'/'.$fileName;

            if (file_exists($tempPath)) {
                if (copy($tempPath, $destination)) {
                    return $fileName;
                }
            }

            // Fallback - store using Livewire's file upload system
            $this->photo->storeAs($directory, $fileName, 'public');

            return $fileName;

        } catch (\Exception $e) {
            \Log::error('File upload error: '.$e->getMessage());

            return null;
        }
    }

    public function uploadProjectImage($image)
    {
        $image_parts = explode(';base64,', $image);

        // Check if the format is valid
        if (count($image_parts) < 2) {
            return null;
        }

        $image_type_aux = explode('image/', $image_parts[0]);

        // Check if image type is present
        if (count($image_type_aux) < 2) {
            return null;
        }

        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        // Validate base64 decode
        if ($image_base64 === false) {
            return null;
        }

        // Generate filename with appropriate extension
        $fileName = Carbon::now()->timestamp.'_project.'.$image_type;

        $manager = new ImageManager(new Driver);

        if (in_array(strtolower($image_type), ['jpeg', 'jpg', 'png', 'gif', 'webp', 'bmp'])) {
            try {
                $img = $manager->read($image_base64);

                // Encode based on format
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
                if (! is_dir($path)) {
                    mkdir($path, 0755, true);
                }

                $fullPath = $path.$fileName;
                file_put_contents($fullPath, $img);

                return $fileName;
            } catch (\Exception $e) {
                \Log::error('Image processing error: '.$e->getMessage());

                return null;
            }
        }

        return null;
    }

    public function updateProject($formData = null)
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'client' => 'required',
            'date' => 'required',
        ], $this->messages);

        $updates = [
            'title' => $this->title,
            'description' => $this->description,
            'client' => $this->client,
            'date' => $this->date,
        ];

        // Handle file upload if provided
        if ($this->photo) {
            $fileExtension = strtolower($this->photo->getClientOriginalExtension());

            if ($this->isImage($fileExtension)) {
                $this->validate([
                    'photo' => 'nullable|mimes:jpg,jpeg,png,gif,webp,bmp|max:51200',
                ], $this->messages); // Fixed: changed $this->message to $this->messages
            } elseif ($this->isVideo($fileExtension)) {
                $this->validate([
                    'photo' => 'nullable|mimes:mp4,avi,mov,wmv,flv,mkv,webm,m4v,3gp|max:51200',
                ], $this->messages); // Fixed: changed $this->message to $this->messages
            } else {
                $this->addError('photo', 'Unsupported file format!');

                return;
            }

            // Delete old file if it exists
            if ($this->selProject->photo) {
                $oldFilePath = public_path('admin/assets/images/projects/'.$this->selProject->photo);
                if (file_exists($oldFilePath)) {
                    @unlink($oldFilePath);
                }
            }

            // Store new file
            $projectFileName = null;
            if ($this->isImage($fileExtension) && isset($formData['croped_image'])) {
                // Fixed typo: 'croped_image' should likely be 'cropped_image', but keeping as in original
                $projectFileName = $this->uploadProjectImage($formData['croped_image']);
            } else {
                $projectFileName = $this->storeMediaFile();
            }

            if ($projectFileName) {
                $updates['photo'] = $projectFileName;
                $updates['media_type'] = $this->isImage($fileExtension) ? 'image' : 'video';
            }
        }

        $this->selProject->update($updates);

        return redirect()->route('project.index')->with('feedback', 'Project updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.projects.admin-edit-project-component')
            ->layout('livewire.admin.layouts.app');
    }
}
