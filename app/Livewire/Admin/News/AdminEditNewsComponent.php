<?php

namespace App\Livewire\Admin\News;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\JpegEncoder;

class AdminEditNewsComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $photo;
    public $selNews;

    public $message = [
        'title.required' => "Please provide your news title",
        'description.required' => "Please provide your news description",
        'photo.required' => "Please upload news photo",
        'photo.dimensions' => "photo must have a minimum of 860 width and 500 height",
        'photo.max' => "File must not be greater than 2M(2000 kilobytes)",
    ];

    public function mount($id){
        $this->selNews = $selNews = News::find($id);
        $this->title = $selNews->title;
        $this->description = $selNews->description;
    }

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
            'title'=> ['required', 'string', 'max:255','unique:news,title'],
            'description'=> ['required', 'string'],
            'photo' => 'required|max:2000',
        ],$this->message);

        if($this->photo){
            // Determine the file type based on the extension
            $fileExtension = $this->photo->getClientOriginalExtension();

            if ($this->isImage($fileExtension)) {
                $this->validateOnly($fields,[
                    'photo' => 'required|mimes:jpeg,png,gif|max:2000',
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

    public function uploadNewsImage($image)
    {
        $image_parts = explode(";base64,", $image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $postImage = Carbon::now()->timestamp . 'new.jpg';

        $manager = new ImageManager(new Driver()); // Use GD driver
        $img = $manager->read($image_base64)->encode(new JpegEncoder(60)); // Use JpegEncoder

        $path = public_path('admin/assets/images/news/');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        file_put_contents($path . $postImage, $img);

        return $postImage;
    }

    public function updateNews($formData)
    {
        $this->validate([
            'title'=> ['required', 'string', 'max:255'],
            'description'=> ['required', 'string'],
        ], $this->message);

        //upload photo if a new photo is selected
        if($this->photo){
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
                $this->message = 'Unsupported file type!';
            }

            unlink('admin/assets/images/news/'.$this->selNews->photo);
            if ($this->isImage($fileExtension)) {
                $newsImageName  = $this->uploadNewsImage($formData['croped_image']);
            }else{
                $newsImageName = Carbon::now()->timestamp. '.' . $this->photo->getClientOriginalName(); //generates name for the news image
                $this->photo->storeAs('/news',$newsImageName);
            }
            $this->selNews->update(['photo'=>$newsImageName ]);
        }

        $this->selNews->update([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('news.index')->with('feedback','News post updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.news.admin-edit-news-component')->layout('livewire.admin.layouts.app');
    }
}
