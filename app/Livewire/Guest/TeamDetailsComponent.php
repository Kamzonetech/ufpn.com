<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\User;
use App\Models\Team;

class TeamDetailsComponent extends Component
{
    public $team;

    public function mount($id)
    {
        $this->team = Team::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.guest.team-details-component')->layout('livewire.guest.layouts.guest');
    }
}
