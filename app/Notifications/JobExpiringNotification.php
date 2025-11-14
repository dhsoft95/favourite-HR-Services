<?php

namespace App\Notifications;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobExpiringNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $job;
    public $daysUntilExpiry;

    public function __construct(Job $job, int $daysUntilExpiry)
    {
        $this->job = $job;
        $this->daysUntilExpiry = $daysUntilExpiry;
    }

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        $urgency = $this->daysUntilExpiry <= 3 ? 'URGENT: ' : '';

        return (new MailMessage)
            ->subject($urgency . 'Job Posting Expiring Soon - ' . $this->job->title)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('This is a reminder that one of your job postings is expiring soon.')
            ->line('**Job Details:**')
            ->line('• Position: **' . $this->job->title . '**')
            ->line('• Company: ' . $this->job->company_name)
            ->line('• Deadline: **' . $this->job->deadline->format('F d, Y') . '**')
            ->line('• Days remaining: **' . $this->daysUntilExpiry . ' days**')
            ->line('• Applications received: ' . $this->job->applications()->count())
            ->line('Consider extending the deadline if you need more time to find the right candidate, or close the posting if you have found a suitable applicant.')
            ->action('Manage Job Posting', url('/admin/jobs/' . $this->job->id . '/edit'))
            ->line('Thank you!');
    }

    public function toArray($notifiable): array
    {
        return [
            'job_id' => $this->job->id,
            'job_title' => $this->job->title,
            'company_name' => $this->job->company_name,
            'deadline' => $this->job->deadline->format('Y-m-d'),
            'days_until_expiry' => $this->daysUntilExpiry,
            'applications_count' => $this->job->applications()->count(),
            'message' => 'Job posting "' . $this->job->title . '" expires in ' . $this->daysUntilExpiry . ' days.',
        ];
    }
}
