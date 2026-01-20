<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class FaqsComponent extends Component
{
    public function render()
    {
        return view('livewire.guest.faqs-component')->layout('livewire.guest.layouts.guest');
    }
}
