<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\JpegEncoder;

class AdminAddProjectComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $client;
    public $date;
    public $photo;

    public $message = [
        'title.required' => "Please provide your project title",
        'description.required' => "Please provide your project description",
        'client.required' => "Please enter client name",
        'date.required' => "Please select project date",
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
            'title'=> ['required', 'string', 'max:255','unique:projects,title'],
            'description'=> 'required',
            'client'=> 'required',
            'date'=> 'required',
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

    public function uploadProjectImage($image)
    {
        $image_parts = explode(";base64,", $image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $postImage = Carbon::now()->timestamp . 'project.jpg';

        $manager = new ImageManager(new Driver()); // Use GD driver
        $img = $manager->read($image_base64)->encode(new JpegEncoder(60)); // Use JpegEncoder

        $path = public_path('admin/assets/images/projects/');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        file_put_contents($path . $postImage, $img);

        return $postImage;
    }

    public function addProject($formData)
    {
        $this->validate([
            'title'=> ['required', 'string', 'max:255'],
            'description'=> 'required',
            'client'=> 'required',
            'date'=> 'required',
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
            $projectImageName  = $this->uploadProjectImage($formData['croped_image']);
        }else{
            $projectImageName = Carbon::now()->timestamp. '.' . $this->photo->getClientOriginalName(); //generates name for the news image
            $this->photo->storeAs('/projects',$projectImageName);
        }

        $project = Project::create([
            'title' => $this->title,
            'description' => $this->description,
            'client' => $this->client,
            'date' => $this->date,
            'photo' => $projectImageName,
            // 'slug' => Str::slug($this->title),
        ]);

        $this->reset();
        $this->dispatch('feedback', feedback: "Project info created successfully");
    }

    

    public function render()
    {
        return view('livewire.admin.projects.admin-add-project-component')->layout('livewire.admin.layouts.app');
    }
}
