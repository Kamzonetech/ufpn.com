<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;

class FooterNewsLetter extends Component
{
    public $email;
    public $message;
    public $success;

    public function subscribe()
    {
        // dd($this);
        $validated = Validator::make(
            ['email' => $this->email],
            ['email' => 'required|email|unique:subscribers,email'],
            ['email.unique' => 'You are already subscribed!']
        )->validate();

        Subscriber::create($validated);

        $this->email = '';
        $this->success = "Thank you for subscribing!";
        $this->reset('email');

        $this->dispatch('hide-success-message');

    }

    public function render()
    {
        return view('livewire.guest.footer-news-letter');
    }
}
