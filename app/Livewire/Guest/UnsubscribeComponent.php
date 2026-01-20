<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\Subscriber;

class UnsubscribeComponent extends Component
{
    public $email;
    public $token;

    public function mount($email, $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    public function unsubscribe()
    {
        $subscriber = Subscriber::where('email', $this->email)
            ->where('unsubscribe_token', $this->token)
            ->first();

        if ($subscriber) {
            $subscriber->delete();

            session()->flash('message', 'You have successfully unsubscribed from our newsletter.');
        } else {
            session()->flash('error', 'Invalid unsubscribe link.');
        }
    }

    public function render()
    {
        return view('livewire.guest.unsubscribe-component')->layout('livewire.guest.layouts.guest');
    }
}
