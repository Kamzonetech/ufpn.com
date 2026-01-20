<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\Service;
use Livewire\WithPagination;

class ServiceComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $services = Service::latest()->paginate(6);
        return view('livewire.guest.service-component',compact('services'))->layout('livewire.guest.layouts.guest');
    }
}
