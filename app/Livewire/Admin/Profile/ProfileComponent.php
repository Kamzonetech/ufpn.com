<?php

namespace App\Livewire\Admin\Profile;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\JpegEncoder;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileComponent extends Component
{
    use WithFileUploads;

    public $photo;

    public $selectedPhoto;

    public $user;

    public $profile_photo_path; // Added missing property

    protected $listeners = ['profilePhotoUpdated' => 'refreshProfilePhoto'];

    public function refreshProfilePhoto()
    {
        $this->profile_photo_path = Auth::user()->profile_photo_path;
    }

    // Changed from $message to $messages (correct Livewire property)
    protected function messages()
    {
        return [
            'photo.required' => 'Please select your passport photograph',
            'photo.image' => 'The uploaded file must be an image',
            'photo.mimes' => 'Only JPG and PNG images are allowed',
            'photo.dimensions' => 'The photo must have a minimum width and height of 230px',
            'photo.max' => 'The photo must not exceed 2MB in size',
        ];
    }

    public function updatedPhoto($photo)
    {
        if ($this->photo) {
            $fileExtension = $this->photo->getClientOriginalExtension();
            if ($this->isImage($fileExtension)) {
                $this->dispatch('image_file', image_file: 'image_file');
            }
        }
    }

    private function isImage($extension)
    {
        return in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->profile_photo_path = $this->user->profile_photo_path;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'photo' => 'required',
        ]);

        if ($this->photo) {
            $fileExtension = $this->photo->getClientOriginalExtension();

            if ($this->isImage($fileExtension)) {
                $this->validateOnly($fields, [
                    'photo' => 'required|mimes:jpeg,png,gif|max:2000',
                ]);
            } else {
                // Fixed: Added error handling
                $this->addError('photo', 'Unsupported file format!');
            }
        }
    }

    public function uploadMemberImage($image)
    {
        try {
            $image_parts = explode(';base64,', $image);

            // Check if the image is valid
            if (count($image_parts) < 2) {
                throw new \Exception('Invalid image format');
            }

            $image_type_aux = explode('image/', $image_parts[0]);
            $image_type = $image_type_aux[1] ?? 'jpeg';
            $image_base64 = base64_decode($image_parts[1]);

            $postImage = Carbon::now()->timestamp.'_member.jpg';
            $manager = new ImageManager(new Driver);
            $img = $manager->read($image_base64)->encode(new JpegEncoder(quality: 80));

            $path = public_path('admin/assets/images/users/');

            if (! file_exists($path)) {
                mkdir($path, 0777, true);
            }

            // Delete old profile photo if exists
            $user = Auth::user();
            if ($user->profile_photo_path) {
                $oldPhotoPath = $path.$user->profile_photo_path;
                if (file_exists($oldPhotoPath)) {
                    @unlink($oldPhotoPath);
                }
            }

            file_put_contents($path.$postImage, $img);

            return $postImage;

        } catch (\Exception $e) {
            \Log::error('Profile photo upload error: '.$e->getMessage());
            throw $e;
        }
    }

    public function updateProfilePhoto($formData)
    {
        $this->validate([
            'photo' => 'required',
        ]);

        $user = Auth::user();

        try {
            $fileExtension = $this->photo->getClientOriginalExtension();

            if ($this->isImage($fileExtension)) {
                $this->validate([
                    'photo' => 'required|mimes:jpeg,png,gif|max:2000',
                ]);

                // Use cropped image if available
                if (isset($formData['croped_image']) && ! empty($formData['croped_image'])) {
                    $memberPhoto = $this->uploadMemberImage($formData['croped_image']);
                } else {
                    // Fallback to regular upload
                    $memberPhoto = $this->uploadRegularImage();
                }
            } else {
                $this->addError('photo', 'Unsupported file format!');

                return;
            }

            // Update user profile photo
            $user->update(['profile_photo_path' => $memberPhoto]);

            $this->dispatch('profilePhotoUpdated', $memberPhoto);

            $this->reset('photo');
            $this->dispatch('feedback', feedback: 'Photo updated successfully');

        } catch (\Exception $e) {
            \Log::error('Update profile photo error: '.$e->getMessage());
            $this->dispatch('feedback', feedback: 'Failed to update photo. Please try again.');
        }
    }

    // New helper method for regular image upload
    private function uploadRegularImage()
    {
        $memberPhoto = Carbon::now()->timestamp.'_'.$this->photo->getClientOriginalName();
        $path = public_path('admin/assets/images/users/');

        if (! file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Delete old profile photo if exists
        $user = Auth::user();
        if ($user->profile_photo_path) {
            $oldPhotoPath = $path.$user->profile_photo_path;
            if (file_exists($oldPhotoPath)) {
                @unlink($oldPhotoPath);
            }
        }

        // Move uploaded file
        $this->photo->storeAs('', $memberPhoto, ['disk' => 'public_users']);

        return $memberPhoto;
    }

    public function render()
    {
        return view('livewire.admin.profile.profile-component')
            ->layout('livewire.admin.layouts.app');
    }
}
