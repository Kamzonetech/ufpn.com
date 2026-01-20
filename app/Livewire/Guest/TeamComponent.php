<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\User;
use App\Models\Team;
use Livewire\WithPagination;

class TeamComponent extends Component
{
    use WithPagination;

    use WithPagination;
    public $paginate;
    public $actionId;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm = null;
    public $sn;
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
        // $this->selTeam = Team::where('id', $teamId)->first();
        $this->selTeam = Team::find($teamId);

        $this->dispatchBrowserEvent('openTeamModal');

        if (!$this->selTeam) {
            abort(404, 'Details not found.');
        }
    }

    public function render()
    {
        $teams = Team::paginate(6);
        return view('livewire.guest.team-component',compact('teams'))->layout('livewire.guest.layouts.guest');
    }
}
