<?php

namespace App\Livewire\Admin\Teams;

use Livewire\Component;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class AdminTeamsComponent extends Component
{
    protected $listeners = ['delete-confirmed'=>'deleteMember'];

    use WithPagination;
    public $surname;
    public $othernames;
    public $email;
    public $phone;
    public $role;
    public $bio;
    public $instagram;
    public $twitter;
    public $linkedin;
    public $facebook;

    public $paginate;
    public $actionId;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm = null;
    public $sn;
    public $Member;
    public $selMember;

    public function mount(){
        $this->paginate = 10;
    }

    public function getMembers(){
        $members = Team::query()
            ->where(function($query) {
            if($this->searchTerm) {
                $query->where('surname', 'like', '%'.$this->searchTerm.'%' )
                    ->orWhere('email', 'like', '%'.$this->searchTerm.'%' );
            }
        })
        ->latest()->paginate($this->paginate);

        return $members;
    }

    public function clearSearch(){
        $this->searchTerm = "";
    }

    public function setMember(Team $member){
        $this->surname = $member->surname;
        $this->othernames = $member->othernames;
        $this->email = $member->email;
        $this->phone = $member->phone;
        $this->role = $member->role;
        $this->bio = $member->bio;
        $this->instagram = $member->instagram;
        $this->twitter = $member->twitter;
        $this->linkedin = $member->linkedin;
        $this->selMember = $member;
    }

    public function deleteMember(){
        $member = Team::find($this->actionId);
        if($member){
            try{
                unlink('img/members/'.$member->photo);
            }catch (\Exception $e) { }
        }
        $member->delete();
        $this->dispatch('feedback',feedback:'Member Successfully Deleted');
    }

    public function setActionId($actionId){
        $this->actionId = $actionId;
    }

    public function render()
    {
        $members = $this->getMembers();
        return view('livewire.admin.teams.admin-teams-component',compact('members'))->layout('livewire.admin.layouts.app');
    }
}
