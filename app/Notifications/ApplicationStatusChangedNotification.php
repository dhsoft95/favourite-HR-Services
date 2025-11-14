<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationStatusChangedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $application;
    public $oldStatus;
    public $newStatus;

    public function __construct(Application $application, $oldStatus, $newStatus)
    {
        $this->application = $application;
        $this->oldStatus = $oldStatus;
        $this->newStatus = $newStatus;
    }

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        $mail = (new MailMessage)
            ->subject($this->getSubject())
            ->greeting('Hello ' . $notifiable->name . '!');

        return $this->buildMailContent($mail);
    }

    protected function getSubject(): string
    {
        return match($this->newStatus) {
            'reviewing' => 'Application Under Review - ' . $this->application->job->title,
            'shortlisted' => 'Great News! You\'ve Been Shortlisted - ' . $this->application->job->title,
            'interview' => 'Interview Scheduled - ' . $this->application->job->title,
            'accepted' => 'Congratulations! Application Accepted - ' . $this->application->job->title,
            'rejected' => 'Application Update - ' . $this->application->job->title,
            default => 'Application Status Update - ' . $this->application->job->title,
        };
    }

    protected function buildMailContent(MailMessage $mail): MailMessage
    {
        switch($this->newStatus) {
            case 'reviewing':
                return $mail
                    ->line('Your application for **' . $this->application->job->title . '** at ' . $this->application->job->company_name . ' is now under review.')
                    ->line('Our hiring team is currently evaluating your application and qualifications.')
                    ->line('We will notify you of any updates regarding your application status.')
                    ->action('View Application', url('/dashboard/applications'))
                    ->line('Thank you for your patience!');

            case 'shortlisted':
                return $mail
                    ->line('Congratulations! We are pleased to inform you that you have been **shortlisted** for the position of **' . $this->application->job->title . '** at ' . $this->application->job->company_name . '.')
                    ->line('Your qualifications and experience have caught our attention, and we would like to move forward with your application.')
                    ->line('**Next Steps:**')
                    ->line('• Our HR team will contact you soon with further details')
                    ->line('• Please keep your phone and email accessible')
                    ->line('• Prepare any additional documents that may be requested')
                    ->action('View Application', url('/dashboard/applications'))
                    ->line('We look forward to learning more about you!');

            case 'interview':
                return $mail
                    ->line('Great news! We would like to invite you for an interview for the position of **' . $this->application->job->title . '** at ' . $this->application->job->company_name . '.')
                    ->line('**Interview Details:**')
                    ->line('• Our HR team will contact you shortly with the interview schedule')
                    ->line('• Please ensure you have the necessary documents ready')
                    ->line('• Review the job description and prepare relevant questions')
                    ->line('**What to Prepare:**')
                    ->line('• Updated CV/Resume')
                    ->line('• Valid identification')
                    ->line('• Any certificates or credentials mentioned in your application')
                    ->action('View Application', url('/dashboard/applications'))
                    ->line('We look forward to meeting you!');

            case 'accepted':
                return $mail
                    ->line('🎉 **Congratulations!** 🎉')
                    ->line('We are delighted to inform you that your application for **' . $this->application->job->title . '** at ' . $this->application->job->company_name . ' has been **accepted**!')
                    ->line('We were impressed with your qualifications and believe you will be a valuable addition to our team.')
                    ->line('**Next Steps:**')
                    ->line('• Our HR team will contact you within the next 2-3 business days')
                    ->line('• You will receive detailed information about the onboarding process')
                    ->line('• Please prepare the required documentation for employment')
                    ->line('**Required Documents (typically):**')
                    ->line('• Valid ID or Passport')
                    ->line('• Educational certificates')
                    ->line('• Professional certificates (if applicable)')
                    ->line('• References')
                    ->action('View Application', url('/dashboard/applications'))
                    ->line('Welcome to the team! We are excited to have you on board.');

            case 'rejected':
                return $mail
                    ->line('Thank you for your interest in the position of **' . $this->application->job->title . '** at ' . $this->application->job->company_name . '.')
                    ->line('After careful consideration, we regret to inform you that we have decided to move forward with other candidates whose qualifications more closely match our current needs.')
                    ->line('**This decision does not reflect on your abilities or potential.** The selection process was highly competitive, and we received many qualified applications.')
                    ->line('We encourage you to:')
                    ->line('• Apply for other positions that match your skills')
                    ->line('• Keep an eye on our future job openings')
                    ->line('• Continue developing your professional skills')
                    ->action('Browse Open Positions', url('/jobs'))
                    ->line('We wish you all the best in your job search and future endeavors.')
                    ->line('Thank you again for considering us as a potential employer.');

            default:
                return $mail
                    ->line('Your application status for **' . $this->application->job->title . '** has been updated.')
                    ->line('New Status: **' . ucfirst($this->newStatus) . '**')
                    ->action('View Application', url('/dashboard/applications'))
                    ->line('Thank you!');
        }
    }

    public function toArray($notifiable): array
    {
        return [
            'application_id' => $this->application->id,
            'job_id' => $this->application->job_id,
            'job_title' => $this->application->job->title,
            'company_name' => $this->application->job->company_name,
            'old_status' => $this->oldStatus,
            'new_status' => $this->newStatus,
            'message' => $this->getNotificationMessage(),
        ];
    }

    protected function getNotificationMessage(): string
    {
        return match($this->newStatus) {
            'reviewing' => 'Your application is now under review.',
            'shortlisted' => 'Congratulations! You have been shortlisted.',
            'interview' => 'You have been invited for an interview.',
            'accepted' => 'Congratulations! Your application has been accepted.',
            'rejected' => 'Your application status has been updated.',
            default => 'Your application status has been updated to ' . $this->newStatus,
        };
    }
}
