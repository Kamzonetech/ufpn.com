<?php

namespace App\Livewire\Admin\News;

use Livewire\Component;
use App\Models\News;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class AdminNewsComponent extends Component
{
    protected $listeners = ['delete-confirmed'=>'deleteNews'];

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

    public function getNews(){
        $newsUpdates = News::query()
            ->where(function($query) {
            if($this->searchTerm) {
                $query->where('title', 'like', '%'.$this->searchTerm.'%' )
                ->orWhere('description', 'like', '%'.$this->searchTerm.'%' );
            }
        })

        ->latest()->paginate($this->paginate);
        return $newsUpdates;
    }

    public function clearSearch(){
        $this->searchTerm = "";
    }

    public function setNews($slug)
    {
        $this->selNews = News::where('slug', $slug)->first();

        if (!$this->selNews) {
            abort(404, 'News not found.');
        }
    }

    public function deleteNews(){
        $newsUpdate = News::find($this->actionId);
        if($newsUpdate){
            unlink('admin/assets/images/news/'.$newsUpdate->photo);
        }
        $newsUpdate->delete();
        $this->dispatch('feedback',feedback:'News Successfully Deleted');
    }

    public function setActionId($actionId){
        $this->actionId = $actionId;
    }

    public function render()
    {
        $newsUpdates = $this->getNews();
        return view('livewire.admin.news.admin-news-component',compact('newsUpdates'))->layout('livewire.admin.layouts.app');
    }
}
