<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\Mail\ContactAcknowledgment;

class ContactComponent extends Component
{
    public $name, $email, $subject, $message;

    public function sendMessage()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $contact = Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        // Queue emails
        Mail::to(config('mail.from.address'))->queue(new ContactMessage($contact));
        Mail::to($this->email)->queue(new ContactAcknowledgment($contact));

        session()->flash('success', 'Your message has been sent successfully!');

        $this->reset(['name', 'email', 'subject', 'message']);

        $this->resetValidation();

        $this->dispatch('clearForm');

    }

    public function render()
    {
        return view('livewire.guest.contact-component')->layout('livewire.guest.layouts.guest');
    }
}
