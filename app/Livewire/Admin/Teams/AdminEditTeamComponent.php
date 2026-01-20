<?php

namespace App\Livewire\Admin\Teams;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\JpegEncoder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class AdminEditTeamComponent extends Component
{
    use WithFileUploads;

    public $surname;
    public $othernames;
    public $email;
    public $phone;
    public $role;
    public $bio;
    public $photo;

    public $linkedin;
    public $twitter;
    public $facebook;
    public $instagram;

    public $selMember;
    public $memberId;

    public $message = [
        'surname.required' => "Please provide member surname",
        'lastothernamesname.required' => "Please provide member other names",
        'email.required' => "Please provide member's email",
        'phone.required' => "Please provide member phone number",
        'role.required' => "Please provide member's role",
        'bio.required' => "Please provide member's bio",
        'photo.required' => "Please upload member's photo",
        'photo.dimensions' => "photo must have a minimum of 860 width and 500 height",
    ];

    public function mount($id){
        $this->selMember = $selMember = Team::findOrFail($id);
        $this->memberId = $selMember->id;
        $this->surname = $selMember->surname;
        $this->othernames = $selMember->othernames;
        $this->email = $selMember->email;
        $this->phone = $selMember->phone;
        $this->role = $selMember->role;
        $this->bio = $selMember->bio;
        $this->linkedin = $selMember->linkedin;
        $this->twitter = $selMember->twitter;
        $this->instagram = $selMember->instagram;
        $this->facebook = $selMember->facebook;
        
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
            'surname'=> ['required', 'string'],
            'othernames'=> ['required', 'string'],
            // 'email'=> ['required', 'string','unique:teams'],
            'email' => ['required', 'string'],
            'phone'=> ['nullable'],
            'bio'=> ['required', 'string'],
            'role'=> ['required', 'string'],
            // 'photo' => 'required|max:2000',
            'linkedin'=> ['nullable', 'url'],
            'twitter'=> ['nullable', 'url'],
            'facebook'=> ['nullable', 'url'],
            'instagram'=> ['nullable', 'url'],
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
                    'photo' => 'required|mimes:mp4,avi,mov|max:12000',
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
        $path = public_path('img/members/');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        file_put_contents($path . $postImage, $img);

        return $postImage;
    }

    public function updateTeamMember($formData)
    {
        $this->validate([
            'surname'=> ['required', 'string'],
            'othernames'=> ['required', 'string'],
            // 'email'=> ['required', 'string','unique:members'],
            'email' => ['required', 'string'],
            'phone'=> ['nullable'],
            'bio'=> ['required', 'string'],
            // 'photo' => 'required|max:2000',
            'linkedin'=> ['nullable', 'url'],
            'twitter'=> ['nullable', 'url'],
            'facebook'=> ['nullable', 'url'],
            'instagram'=> ['nullable', 'url'],
        ], $this->message);

        if($this->photo){
            $fileExtension = $this->photo->getClientOriginalExtension();

            if ($this->isImage($fileExtension)) {
                $this->validate([
                    'photo' => 'required|mimes:jpeg,png,gif|max:2000',
                ],$this->message);
            } elseif ($this->isVideo($fileExtension)) {
                $this->validate([
                    'photo' => 'required|mimes:mp4,avi,mov|max:12000',
                ],$this->message);
            } else {
                $this->message = 'Unsupported file format!';
            }

            unlink('img/members/'.$this->selMember->photo);
            if ($this->isImage($fileExtension)) {
                $memberPhoto  = $this->uploadMemberImage($formData['croped_image']);
            }else{
                $memberPhoto = Carbon::now()->timestamp. '.' . $this->photo->getClientOriginalName(); //generates name for the news image
                $this->photo->storeAs('/members',$memberPhoto);
            }
            $this->selMember->update(['photo'=>$memberPhoto ]);
        }

        DB::beginTransaction();

        try {
            // Update the user table
            $user = User::where('id', $this->selMember->user_id)->first();
            
            if ($user) {
                $user->update([
                    'surname' => $this->surname,
                    'othernames' => $this->othernames,
                    'email' => $this->email,
                    'user_type' => 'Staff',
                    'status' => "Active",
                ]);
            }
        
            // Update the team table
            $this->selMember->update([
                'surname' => $this->surname,
                'othernames' => $this->othernames,
                'email' => $this->email,
                'phone' => $this->phone,
                'role' => $this->role,
                'bio' => $this->bio,
                'linkedin' => $this->linkedin,
                'twitter' => $this->twitter,
                'instagram' => $this->instagram,
                'facebook' => $this->facebook,
            ]);
        
            DB::commit(); // Save changes if everything works
            return redirect()->route('team.index')->with('feedback', 'Team Member info updated successfully');
        } catch (\Exception $e) {
            DB::rollBack(); // Undo changes if something goes wrong
            return redirect()->back()->with('error', 'An error occurred while updating. Please try again.');
        }
        return redirect()->route('team.index')->with('feedback','Team Member info updated successfully');
    }
    
    public function render()
    {
        return view('livewire.admin.teams.admin-edit-team-component')->layout('livewire.admin.layouts.app');
    }
}
