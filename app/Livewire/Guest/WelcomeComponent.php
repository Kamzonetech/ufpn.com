<?php

namespace App\Livewire\Guest;

use App\Models\News;
use App\Models\Project;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class WelcomeComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $services = Service::limit(3)->get();
        $news = News::limit(3)->latest()->get();
        $projects = Project::limit(3)->latest()->get();

        return view('livewire.guest.welcome-component', compact('services', 'projects', 'news'))->layout('livewire.guest.layouts.guest');
    }
}
