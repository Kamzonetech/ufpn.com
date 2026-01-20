<?php

namespace App\Livewire\Admin\Services;

use Livewire\Component;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\JpegEncoder;
use Illuminate\Support\Str;

class AdminAddServiceComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $photo;

    public $notifySubscribers = false;

    public $message = [
        'title.required' => "Please provide your service title",
        'description.required' => "Please provide your service description",
        'photo.required' => "Please upload service banner",
        'photo.dimensions' => "photo must have a minimum of 860 width and 500 height",
        'photo.max' => "File must not be greater than 2M(2000 kilobytes)",
    ];

    public function updatedPhoto($photo){
        $this->validate([
            'photo' => 'required|max:2000',
        ]);

        if($this->photo){
            $fileExtension = $this->photo->getClientOriginalExtension();
            if ($this->isImage($fileExtension)) {
                $this->dispatch('image_file', image_file:  'image_file');
            }
        }
    }

    private function isImage($extension)
    {
        return in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
    }

    private function isVideo($extension)
    {
        return in_array(strtolower($extension), ['mp4', 'avi', 'mov']);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title'=> ['required', 'string', 'max:255','unique:services,title'],
            'description'=> ['required', 'string'],
            'photo' => 'required|max:2000',
        ],$this->message);

        if($this->photo){
            // Determine the file type based on the extension
            $fileExtension = $this->photo->getClientOriginalExtension();

            if ($this->isImage($fileExtension)) {
                $this->validateOnly($fields,[
                    'photo' => 'required|mimes:jpeg,png,gif',
                ],$this->message);
            } elseif ($this->isVideo($fileExtension)) {
                $this->validateOnly($fields,[
                    'photo' => 'required|mimes:mp4,avi,mov|max:2000',
                ],$this->message);
            } else {
                $this->message = 'Unsupported file format!';
            }
        }

    }

    public function uploadServiceImage($image)
    {
        $image_parts = explode(";base64,", $image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $postImage = Carbon::now()->timestamp . 'service.jpg';

        $manager = new ImageManager(new Driver()); // Use GD driver
        $img = $manager->read($image_base64)->encode(new JpegEncoder(60)); // Use JpegEncoder

        $path = public_path('admin/assets/images/services/');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        file_put_contents($path . $postImage, $img);

        return $postImage;
    }


    public function addService($formData)
    {
        $this->validate([
            'title'=> ['required', 'string', 'max:255'],
            'description'=> ['required', 'string'],
            'photo' => 'required|max:2000',
        ], $this->message);

        $fileExtension = $this->photo->getClientOriginalExtension();

        if ($this->isImage($fileExtension)) {
            $this->validate([
                'photo' => 'required|mimes:jpeg,png,gif|max:2000',
            ],$this->message);
        } elseif ($this->isVideo($fileExtension)) {
            $this->validate([
                'photo' => 'required|mimes:mp4,avi,mov|max:2000',
            ],$this->message);
        } else {
            $this->message = 'Unsupported file format!';
        }

        if ($this->isImage($fileExtension)) {
            $serviceImageName  = $this->uploadServiceImage($formData['croped_image']);
        }else{
            $serviceImageName = Carbon::now()->timestamp. '.' . $this->photo->getClientOriginalName(); //generates name for the news image
            $this->photo->storeAs('/services',$serviceImageName);
        }

        $newsUpdate = Service::create([
            'title' => $this->title,
            'description' => $this->description,
            'photo' => $serviceImageName,
            // 'user_id' => Auth::user()->id,
        ]);

        $this->reset();
        $this->dispatch('feedback', feedback: "Service added successfully");
    }

    public function render()
    {
        return view('livewire.admin.services.admin-add-service-component')->layout('livewire.admin.layouts.app');
    }
}
