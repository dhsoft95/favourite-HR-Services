<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationSubmittedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Application Submitted Successfully - ' . $this->application->job->title)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Thank you for applying to the position of **' . $this->application->job->title . '** at ' . $this->application->job->company_name . '.')
            ->line('We have received your application and it is currently under review.')
            ->line('**Application Details:**')
            ->line('Position: ' . $this->application->job->title)
            ->line('Company: ' . $this->application->job->company_name)
            ->line('Applied on: ' . $this->application->created_at->format('F d, Y'))
            ->line('You will be notified via email as your application progresses through our recruitment process.')
            ->action('View Application Status', url('/dashboard/applications'))
            ->line('Thank you for your interest in joining our team!');
    }

    public function toArray($notifiable): array
    {
        return [
            'application_id' => $this->application->id,
            'job_id' => $this->application->job_id,
            'job_title' => $this->application->job->title,
            'company_name' => $this->application->job->company_name,
            'status' => $this->application->status,
            'message' => 'Your application for ' . $this->application->job->title . ' has been submitted successfully.',
        ];
    }
}
