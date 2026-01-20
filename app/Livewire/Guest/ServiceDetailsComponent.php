<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\Service;

class ServiceDetailsComponent extends Component
{
    public $service;
    public $relatedServices;

    public function mount($slug)
    {
        $this->service = Service::where('slug', $slug)->firstOrFail();
        $this->relatedServices = Service::where('id', '!=', $this->service->id)->limit(5)->get();
    }

    public function render()
    {

        return view('livewire.guest.service-details-component')->layout('livewire.guest.layouts.guest');
    }
}
