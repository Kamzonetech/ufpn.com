<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\Team;

class AboutComponent extends Component
{
    public $team;
    public $selTeam;

    protected $listeners = ['openTeamModal' => 'loadTeamDetails', 'closeTeamModal' => 'hideModal'];

    public function hideModal()
    {
        $this->selTeam = null;
        $this->dispatch('modalClosed');
    }

    public function setTeam($teamId)
    {
        $this->selTeam = Team::where('id', $teamId)->first();

        if (!$this->selTeam) {
            abort(404, 'Details not found.');
        }
    }

    public function render()
    {
        $teams = Team::limit(2)->get();
        return view('livewire.guest.about-component',compact('teams'))->layout('livewire.guest.layouts.guest');
    }
}
