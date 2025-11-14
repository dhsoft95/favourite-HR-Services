<?php

namespace App\Notifications;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DraftJobReminderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $job;
    public $daysInDraft;

    public function __construct(Job $job, int $daysInDraft)
    {
        $this->job = $job;
        $this->daysInDraft = $daysInDraft;
    }

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Reminder: Draft Job Posting - ' . $this->job->title)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('This is a friendly reminder about your draft job posting.')
            ->line('**Job Details:**')
            ->line('• Position: **' . $this->job->title . '**')
            ->line('• Company: ' . $this->job->company_name)
            ->line('• Created: ' . $this->job->created_at->format('F d, Y'))
            ->line('• Days in draft: **' . $this->daysInDraft . ' days**')
            ->line('This job posting has been in draft status for ' . $this->daysInDraft . ' days. Consider publishing it to start receiving applications from qualified candidates.')
            ->action('Review & Publish Job', url('/admin/jobs/' . $this->job->id . '/edit'))
            ->line('If you no longer need this posting, you can delete it to keep your dashboard organized.')
            ->line('Thank you!');
    }

    public function toArray($notifiable): array
    {
        return [
            'job_id' => $this->job->id,
            'job_title' => $this->job->title,
            'company_name' => $this->job->company_name,
            'days_in_draft' => $this->daysInDraft,
            'message' => 'Draft job "' . $this->job->title . '" has been in draft for ' . $this->daysInDraft . ' days.',
        ];
    }
}
