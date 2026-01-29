<?php

namespace App\Livewire\Admin\News;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\JpegEncoder;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditNewsComponent extends Component
{
    use WithFileUploads;

    public $title;

    public $description;

    public $photo;

    public $selNews;

    public $media_type;

    public $currentMediaUrl;

    // Define allowed file types
    private $allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];

    private $allowedVideoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv', 'webm', 'm4v', '3gp'];

    public $message = [
        'title.required' => 'Please provide your news title',
        'description.required' => 'Please provide your news description',
        'photo.max' => 'File must not be greater than 20MB',
    ];

    public function mount($id)
    {
        $this->selNews = News::find($id);
        $this->title = $this->selNews->title;
        $this->description = $this->selNews->description;
        $this->media_type = $this->selNews->media_type;
        $this->currentMediaUrl = asset('admin/assets/images/news/'.$this->selNews->photo);
    }

    public function updatedPhoto($photo)
    {
        $this->validate([
            'photo' => 'nullable|max:20480', // 20MB
        ]);

        if ($this->photo) {
            $fileExtension = strtolower($this->photo->getClientOriginalExtension());

            if ($this->isImage($fileExtension)) {
                $this->media_type = 'image';
                $this->dispatch('image_file');
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
        ], $this->message);

        if ($this->photo) {
            $fileExtension = strtolower($this->photo->getClientOriginalExtension());

            if ($this->isImage($fileExtension)) {
                $this->validateOnly($fields, [
                    'photo' => 'nullable|mimes:jpg,jpeg,png,gif,webp,bmp|max:20480',
                ], $this->message);
            } elseif ($this->isVideo($fileExtension)) {
                $this->validateOnly($fields, [
                    'photo' => 'nullable|mimes:mp4,avi,mov,wmv,flv,mkv,webm,m4v,3gp|max:20480',
                ], $this->message);
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
        $directory = 'admin/assets/images/news';
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

            // Fallback
            return $this->photo->storeAs($directory, $fileName, 'public');

        } catch (\Exception $e) {
            \Log::error('File upload error: '.$e->getMessage());

            return null;
        }
    }

    public function uploadNewsImage($image)
    {
        $image_parts = explode(';base64,', $image);
        $image_type_aux = explode('image/', $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        // Generate filename with appropriate extension
        $fileName = Carbon::now()->timestamp.'_news.'.$image_type;

        $manager = new ImageManager(new Driver);

        if (in_array(strtolower($image_type), ['jpeg', 'jpg', 'png', 'gif', 'webp', 'bmp'])) {
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

            $path = public_path('admin/assets/images/news/');
            if (! is_dir($path)) {
                mkdir($path, 0755, true);
            }

            $fullPath = $path.$fileName;
            file_put_contents($fullPath, $img);

            return $fileName;
        }

        return null;
    }

    public function updateNews($formData = null)
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => 'required',
        ], $this->message);

        $updates = [
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => Auth::user()->id,
        ];

        // Upload new photo if selected
        if ($this->photo) {
            $fileExtension = strtolower($this->photo->getClientOriginalExtension());

            if ($this->isImage($fileExtension)) {
                $this->validate([
                    'photo' => 'nullable|mimes:jpg,jpeg,png,gif,webp,bmp|max:20480',
                ], $this->message);
            } elseif ($this->isVideo($fileExtension)) {
                $this->validate([
                    'photo' => 'nullable|mimes:mp4,avi,mov,wmv,flv,mkv,webm,m4v,3gp|max:20480',
                ], $this->message);
            } else {
                $this->addError('photo', 'Unsupported file format!');

                return;
            }

            // Delete old file if it exists
            $oldFilePath = public_path('admin/assets/images/news/'.$this->selNews->photo);
            if (file_exists($oldFilePath)) {
                @unlink($oldFilePath);
            }

            // Store new file
            $newsFileName = null;
            if ($this->isImage($fileExtension) && isset($formData['croped_image'])) {
                $newsFileName = $this->uploadNewsImage($formData['croped_image']);
            } else {
                $newsFileName = $this->storeMediaFile();
            }

            if ($newsFileName) {
                $updates['photo'] = $newsFileName;
                $updates['media_type'] = $this->isImage($fileExtension) ? 'image' : 'video';
            }
        }

        // Update the news
        $this->selNews->update($updates);

        return redirect()->route('news.index')->with('feedback', 'News post updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.news.admin-edit-news-component')->layout('livewire.admin.layouts.app');
    }
}
