<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationSubmitted extends Notification implements ShouldQueue
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
            ->subject('Application Submitted Successfully')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Thank you for applying for the position of **' . $this->application->job->title . '** at ' . $this->application->job->company_name . '.')
            ->line('Your application has been received and is currently under review.')
            ->line('**Application Details:**')
            ->line('- **Position:** ' . $this->application->job->title)
            ->line('- **Company:** ' . $this->application->job->company_name)
            ->line('- **Location:** ' . $this->application->job->location)
            ->line('- **Applied On:** ' . $this->application->created_at->format('F d, Y'))
            ->action('View Application Status', url('/dashboard'))
            ->line('We will review your application and get back to you soon.')
            ->line('Thank you for your interest in joining our team!');
    }
}
