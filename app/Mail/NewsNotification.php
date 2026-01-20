<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\News;
use App\Models\Subscriber;


class NewsNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $newsUpate;

    public $subscriber;

    public function __construct(News $newsUpate, Subscriber $subscriber)
    {
        $this->newsUpate = $newsUpate;
        $this->subscriber = $subscriber;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Daimun Technologies LTD: " . $this->newsUpate->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.news-notification',
            with: [
                'title' => $this->newsUpate->title,
                'description' => $this->newsUpate->description,
                'image' => asset('admin/assets/images/news/' . $this->newsUpate->photo),
                'url' => route('news.show', $this->newsUpate->slug),
                'subscriber' => $this->subscriber,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
