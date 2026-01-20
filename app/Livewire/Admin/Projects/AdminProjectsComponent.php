<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class AdminProjectsComponent extends Component
{
    protected $listeners = ['delete-confirmed'=>'deleteProject'];

    use WithPagination;
    public $paginate;
    public $actionId;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm = null;
    public $sn;
    public $project;
    public $selProject;

    public function mount(){
        $this->paginate = 10;
    }

    public function getProjects(){
        $projects = Project::query()
            ->where(function($query) {
            if($this->searchTerm) {
                $query->where('title', 'like', '%'.$this->searchTerm.'%' )
                ->orWhere('client', 'like', '%'.$this->searchTerm.'%' );
            }
        })
        ->latest()->paginate($this->paginate);
        return $projects;
    }

    public function clearSearch(){
        $this->searchTerm = "";
    }

    public function setProject(Project $project){
        $this->title = $project->title;
        $this->link = $project->link;
        $this->selproject = $project;
    }

    public function deleteProject(){
        $publication = Project::find($this->actionId);
        $publication->delete();
        $this->dispatch('feedback',feedback:'Publication Successfully Deleted');
    }

    //set action id
    public function setActionId($actionId){
        $this->actionId = $actionId;
    }

    public function render()
    {
        $projects = $this->getProjects();
        return view('livewire.admin.projects.admin-projects-component',compact('projects'))->layout('livewire.admin.layouts.app');
    }
}
