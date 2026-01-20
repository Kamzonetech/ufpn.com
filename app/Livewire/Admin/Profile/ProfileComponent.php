<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Carbon\Carbon;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\JpegEncoder;

class ProfileComponent extends Component
{
    use WithFileUploads;

    public $photo;
    public $selectedPhoto;
    public $user;

    protected $listeners = ['profilePhotoUpdated' => 'refreshProfilePhoto'];

    public function refreshProfilePhoto()
    {
        $this->profile_photo_path = Auth::user()->profile_photo_path;
    }

    protected $message = [
        'photo.required' => "Please select your passport photograph",
        'photo.image' => "The uploaded file must be an image",
        'photo.mimes' => "Only JPG and PNG images are allowed",
        'photo.dimensions' => "The photo must have a minimum width and height of 230px",
        'photo.max' => "The photo must not exceed 2MB in size",
    ];

    public function updatedPhoto($photo){
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


    public function mount() {
        $this->user = Auth::user();
    }

    public function updated($fields) {
        $this->validateOnly($fields, [
           'photo' => 'required',
        ],$this->message);

        if($this->photo){
            $fileExtension = $this->photo->getClientOriginalExtension();

            if ($this->isImage($fileExtension)) {
                $this->validateOnly($fields,[
                    'photo' => 'required|mimes:jpeg,png,gif|max:2000',
                ],$this->message);
            } else {
                $this->message = 'Unsupported file format!';
            }
        }
    }

    public function uploadMemberImage($image)
    {
        $image_parts = explode(";base64,", $image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $postImage = Carbon::now()->timestamp . 'member.jpg';
        $manager = new ImageManager(new Driver());
        $img = $manager->read($image_base64)->encode(new JpegEncoder(60));
        $path = public_path('admin/assets/images/users/');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        file_put_contents($path . $postImage, $img);

        return $postImage;
    }

    public function updateProfilePhoto($formData){
        $this->validate([
            'photo' => 'required',
        ],$this->message);

        $user = Auth::user();

        $fileExtension = $this->photo->getClientOriginalExtension();

        if ($this->isImage($fileExtension)) {
            $this->validate([
                'photo' => 'required|mimes:jpeg,png,gif|max:2000',
            ],$this->message);
        } else {
            $this->message = 'Unsupported file format!';
        }

        if ($this->isImage($fileExtension)) {
            $memberPhoto  = $this->uploadMemberImage($formData['croped_image']);
        }else{
            $memberPhoto = Carbon::now()->timestamp. '.' . $this->photo->getClientOriginalName();
            $this->photo->storeAs('/users',$memberPhoto);
        }

        $user->update(['profile_photo_path' => $memberPhoto]);

        $this->dispatch('profilePhotoUpdated', $memberPhoto);

        $this->reset('photo');
        $this->dispatch('feedback', feedback: "Photo updated successfully");
    }
    
    public function render()
    {
        return view('livewire.admin.profile.profile-component')->layout('livewire.admin.layouts.app');
    }
}
