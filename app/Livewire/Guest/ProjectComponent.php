<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class ProjectComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $projects = Project::latest()->paginate(6);
        return view('livewire.guest.project-component',compact('projects'))->layout('livewire.guest.layouts.guest');
    }
}
