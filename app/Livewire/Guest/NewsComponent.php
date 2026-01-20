<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\News;
use Livewire\WithPagination;


class NewsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $news = News::latest()->paginate(6);
        return view('livewire.guest.news-component',compact('news'))->layout('livewire.guest.layouts.guest');
    }
}
