<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\News;

class NewsDetailsComponent extends Component
{
    public $news;
    public $relatedNews;

    public function mount($slug)
    {
        $this->news = News::where('slug', $slug)->firstOrFail();
        $this->relatedNews = News::where('id', '!=', $this->news->id)->limit(5)->get();
    }

    public function render()
    {
        return view('livewire.guest.news-details-component')->layout('livewire.guest.layouts.guest');
    }
}
