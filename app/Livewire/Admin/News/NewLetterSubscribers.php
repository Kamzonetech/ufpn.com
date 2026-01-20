<?php

namespace App\Livewire\Admin\News;

use Livewire\Component;
use App\Models\Subscriber;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class NewLetterSubscribers extends Component
{
    protected $listeners = ['delete-confirmed'=>'deleteSubscriber'];
    use WithPagination;
    public $paginate;
    public $actionId;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm = null;

    public $subject;
    public $message;
    public $emailSent = false;

    public function mount(){
        $this->paginate = 10;
    }

    public function getSubscribers(){
        $subscribers = Subscriber::query()
            ->where(function($query) {
            if($this->searchTerm) {
                $query->where('email', 'like', '%'.$this->searchTerm.'%' )
                ->orWhere('created_at', 'like', '%'.$this->searchTerm.'%' );
            }
        })
        ->latest()->paginate($this->paginate);
        return $subscribers;
    }

    public function clearSearch(){
        $this->searchTerm = "";
    }

    public function setActionId($actionId){
        $this->actionId = $actionId;
    }

    public function deleteSubscriber(){
        $subscriber = Subscriber::find($this->actionId);
        $subscriber->delete();
        $this->dispatch('feedback',feedback:'Subscriber Successfully Deleted');
    }

    public function render()
    {
        $subscribers = $this->getSubscribers();
        return view('livewire.admin.news.new-letter-subscribers',compact('subscribers'))->layout('livewire.admin.layouts.app');
    }
}
