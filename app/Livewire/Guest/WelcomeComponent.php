<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\Service;
use App\Models\Project;
use App\Models\News;
use Livewire\WithPagination;

class WelcomeComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $services = Service::limit(3)->get();
        $projects = Project::limit(1)->get();
        $news = News::limit(3)->get();
        return view('livewire.guest.welcome-component',compact('services','projects','news'))->layout('livewire.guest.layouts.guest');
    }
}
