<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationStatusChanged extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Application $application,
        public array $data = []
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $statusMessages = [
            'reviewing' => [
                'subject' => 'Your Application is Under Review',
                'message' => 'Great news! Your application is now being reviewed by our hiring team.',
                'color' => 'blue',
                'include_interview_details' => false,
            ],
            'shortlisted' => [
                'subject' => 'Congratulations! You\'ve Been Shortlisted',
                'message' => 'Excellent news! You have been shortlisted for the position. Our team will contact you soon regarding the next steps.',
                'color' => 'success',
                'include_interview_details' => false,
            ],
            'interview' => [
                'subject' => 'Interview Scheduled - ' . ($this->application->interview_type === 'internal' ? 'Internal Interview' : 'Client Interview'),
                'message' => 'Congratulations! An interview has been scheduled for your application.',
                'color' => 'primary',
                'include_interview_details' => true,
            ],
            'accepted' => [
                'subject' => 'Congratulations! Your Application Has Been Accepted',
                'message' => 'We are pleased to inform you that your application has been accepted! Welcome to the team. Our HR department will reach out to you with the next steps.',
                'color' => 'success',
                'include_interview_details' => false,
            ],
            'rejected' => [
                'subject' => 'Application Status Update',
                'message' => 'Thank you for your interest in the position. After careful consideration, we have decided to move forward with other candidates. We encourage you to apply for future opportunities.',
                'color' => 'warning',
                'include_interview_details' => false,
            ],
        ];

        $config = $statusMessages[$this->application->status] ?? [
            'subject' => 'Application Status Updated',
            'message' => 'Your application status has been updated.',
            'color' => 'info',
            'include_interview_details' => false,
        ];

        $mail = (new MailMessage)
            ->subject($config['subject'])
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line($config['message']);

        // Add interview-specific details if status is 'interview'
        if ($config['include_interview_details'] && $this->application->interview_date) {
            $mail->line('## Interview Details')
                ->line('---')
                ->line('### Interview Type: ' . ($this->application->interview_type === 'internal' ? 'Internal Interview (Favorite HR Services)' : 'External Interview (Client Interview)'))
                ->line('### Scheduled Date & Time: ' . $this->application->interview_date->format('F d, Y \a\t h:i A'))
                ->line('---')
                ->line('### Interview Instructions:')
                ->line($this->application->interview_instructions);
        }

        $mail->line('---')
            ->line('**Application Details:**')
            ->line('- **Position:** ' . $this->application->job->title)
            ->line('- **Company:** ' . $this->application->job->company_name)
            ->line('- **Application Status:** ' . ucfirst($this->application->status));

        // Add next steps based on status
        if ($this->application->status === 'interview') {
            $mail->line('---')
                ->line('**Next Steps:**')
                ->line('- Please review the interview details above')
                ->line('- Contact us if you need to reschedule')
                ->line('- Prepare any required documents or materials')
                ->line('- Arrive 10 minutes early for the interview');
        }

        return $mail->action('View Application Details', url('/dashboard/applications/' . $this->application->id))
            ->line('Thank you for your continued interest!');
    }
}
