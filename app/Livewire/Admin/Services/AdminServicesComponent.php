<?php

namespace App\Livewire\Admin\Services;

use Livewire\Component;
use App\Models\Service;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class AdminServicesComponent extends Component
{
    protected $listeners = ['delete-confirmed'=>'deleteService'];

    use WithPagination;
    public $paginate;
    public $actionId;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm = null;
    public $sn;
    public $news;
    public $selNews;

    public function mount(){
        $this->paginate = 10;
    }

    public function getServices(){
        $services = Service::query()
            ->where(function($query) {
            if($this->searchTerm) {
                $query->where('title', 'like', '%'.$this->searchTerm.'%' )
                ->orWhere('description', 'like', '%'.$this->searchTerm.'%' );
            }
        })

        ->latest()->paginate($this->paginate);
        return $services;
    }

    public function clearSearch(){
        $this->searchTerm = "";
    }

    public function setNews($slug)
    {
        $this->selNews = Service::where('slug', $slug)->first();

        if (!$this->selNews) {
            abort(404, 'News not found.');
        }
    }

    public function deleteService(){
        $newsUpdate = Service::find($this->actionId);
        if($newsUpdate){
            unlink('admin/assets/images/services/'.$newsUpdate->photo);
        }
        $newsUpdate->delete();
        $this->dispatch('feedback',feedback:'Service Successfully Deleted');
    }

    public function setActionId($actionId){
        $this->actionId = $actionId;
    }

    public function render()
    {
        $services = $this->getServices();
        return view('livewire.admin.services.admin-services-component',compact('services'))->layout('livewire.admin.layouts.app');
    }
}
