<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\Project;

class ProjectDetailsComponent extends Component
{
    public $project;
    public $relatedProjects;

    public function mount($slug)
    {
        $this->project = Project::where('slug', $slug)->firstOrFail();
        $this->relatedProjects = Project::where('id', '!=', $this->project->id)->limit(5)->get();
    }

    public function render()
    {
        return view('livewire.guest.project-details-component')->layout('livewire.guest.layouts.guest');
    }
}
