<?php

namespace App\Livewire\Guest;

use App\Models\News;
use Livewire\Component;

class NewsDetailsComponent extends Component
{
    public $news;

    public $relatedNews;

    public function mount($slug)
    {
        $this->news = News::where('slug', $slug)->firstOrFail();
        // $this->relatedNews = News::where('id', '!=', $this->news->id)->limit(5)->get();

        $this->relatedNews = News::query()
            ->where('slug', '!=', $slug)
            ->select(['title', 'slug', 'photo', 'created_at'])
            ->latest('created_at')
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.guest.news-details-component')->layout('livewire.guest.layouts.guest');
    }
}
