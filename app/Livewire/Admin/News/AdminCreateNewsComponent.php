<?php

namespace App\Livewire\Admin\News;

use App\Mail\NewsNotification;
use App\Models\News;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\JpegEncoder;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCreateNewsComponent extends Component
{
    use WithFileUploads;

    public $title;

    public $description;

    public $photo;

    public $media_type;

    public $notifySubscribers = false;

    private $allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];

    private $allowedVideoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv', 'webm', 'm4v', '3gp'];

    public $message = [
        'title.required' => 'Please provide your news title',
        'description.required' => 'Please provide your news description',
        'photo.required' => 'Please upload news photo',
        'photo.max' => 'File must not be greater than 20MB',
    ];

    public function updatedPhoto($photo)
    {
        $this->validate([
            'photo' => 'required|max:51200', // 20MB
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
            'title' => ['required', 'string', 'max:255', 'unique:news,title'],
            'description' => 'required',
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
            // Method 1: Using copy() - most reliable on Windows
            $tempPath = $this->photo->getRealPath();
            $destination = $fullPath.'/'.$fileName;

            if (file_exists($tempPath)) {
                if (copy($tempPath, $destination)) {
                    return $fileName;
                }
            }

            // Method 2: Fallback using storeAs()
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

        // Generate filename
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

    public function postNews($formData = null)
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255', 'unique:news,title'],
            'description' => 'required',
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
        $newsFileName = null;
        $fileExtension = strtolower($this->photo->getClientOriginalExtension());

        if ($this->isImage($fileExtension) && isset($formData['croped_image'])) {
            // Use cropped image
            $newsFileName = $this->uploadNewsImage($formData['croped_image']);
        } else {
            // Store original file (image or video)
            $newsFileName = $this->storeMediaFile();
        }

        if (! $newsFileName) {
            $this->addError('photo', 'Failed to upload file. Please try again.');

            return;
        }

        // Determine media type
        $mediaType = $this->isImage($fileExtension) ? 'image' : 'video';

        // Create news
        $newsUpdate = News::create([
            'title' => $this->title,
            'description' => $this->description,
            'photo' => $newsFileName,
            'media_type' => $mediaType,
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($this->title).'-'.Carbon::now()->timestamp,
        ]);

        if ($this->notifySubscribers) {
            $this->sendNewsNotification($newsUpdate);
        }

        $this->reset();
        $this->dispatch('feedback', feedback: 'News posted successfully'.($this->notifySubscribers ? ' and subscribers notified!' : ''));
    }

    private function sendNewsNotification($newsUpdate)
    {
        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->queue(new NewsNotification($newsUpdate, $subscriber));
        }
    }

    public function render()
    {
        return view('livewire.admin.news.admin-create-news-component')->layout('livewire.admin.layouts.app');
    }
}
