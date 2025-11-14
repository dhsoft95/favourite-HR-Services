<?php

namespace App\Console\Commands;

use App\Models\Job;
use App\Models\User;
use App\Notifications\DraftJobReminderNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NotifyOldDraftJobs extends Command
{
    protected $signature = 'jobs:notify-old-drafts';

    protected $description = 'Notify admins about job postings that have been in draft status for too long';

    public function handle()
    {
        // Configuration: How many days before sending notification
        $daysThreshold = 3; // Send notification after 3 days

        // Get draft jobs older than threshold
        $oldDraftJobs = Job::where('status', 'draft')
            ->where('created_at', '<=', Carbon::now()->subDays($daysThreshold))
            ->get();

        if ($oldDraftJobs->isEmpty()) {
            $this->info('No old draft jobs found.');
            return 0;
        }

        // Get all admin users
        $admins = User::where('role', 'admin')->get();

        if ($admins->isEmpty()) {
            $this->warn('No admin users found to notify.');
            return 0;
        }

        $notificationsSent = 0;

        foreach ($oldDraftJobs as $job) {
            $daysInDraft = Carbon::parse($job->created_at)->diffInDays(Carbon::now());

            // Only send notification at specific intervals (3, 7, 14, 30 days)
            if (!in_array($daysInDraft, [3, 7, 14, 30])) {
                continue;
            }

            foreach ($admins as $admin) {
                $admin->notify(new DraftJobReminderNotification($job, $daysInDraft));
                $notificationsSent++;
            }

            $this->info("Notified about: {$job->title} ({$daysInDraft} days in draft)");
        }

        $this->info("Total notifications sent: {$notificationsSent}");
        return 0;
    }
}
