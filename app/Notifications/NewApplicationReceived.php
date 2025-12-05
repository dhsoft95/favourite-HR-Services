<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplicationReceived extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Application $application
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Application Received')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('A new application has been submitted for review.')
            ->line('**Applicant Details:**')
            ->line('- **Name:** ' . $this->application->user->name)
            ->line('- **Email:** ' . $this->application->user->email)
            ->line('- **Phone:** ' . ($this->application->user->phone ?? 'Not provided'))
            ->line('**Job Details:**')
            ->line('- **Position:** ' . $this->application->job->title)
            ->line('- **Company:** ' . $this->application->job->company_name)
            ->line('- **Applied On:** ' . $this->application->created_at->format('F d, Y h:i A'))
            ->action('Review Application', url('/portal/applications/' . $this->application->id))
            ->line('Please review and process this application promptly.');
    }
}
