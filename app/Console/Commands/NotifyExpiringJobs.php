<?php

namespace App\Console\Commands;

use App\Models\Job;
use App\Models\User;
use App\Notifications\JobExpiringNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NotifyExpiringJobs extends Command
{
    protected $signature = 'jobs:notify-expiring';

    protected $description = 'Notify admins about job postings that are expiring soon';

    public function handle()
    {
        // Get published jobs expiring in 7 days or less
        $expiringJobs = Job::where('status', 'published')
            ->where('is_active', true)
            ->whereBetween('deadline', [Carbon::now(), Carbon::now()->addDays(7)])
            ->get();

        if ($expiringJobs->isEmpty()) {
            $this->info('No expiring jobs found.');
            return 0;
        }

        // Get all admin users
        $admins = User::where('role', 'admin')->get();

        if ($admins->isEmpty()) {
            $this->warn('No admin users found to notify.');
            return 0;
        }

        $notificationsSent = 0;

        foreach ($expiringJobs as $job) {
            $daysUntilExpiry = Carbon::now()->diffInDays(Carbon::parse($job->deadline), false);

            // Only send notifications at specific intervals (7, 3, 1 days before)
            if (!in_array($daysUntilExpiry, [7, 3, 1])) {
                continue;
            }

            foreach ($admins as $admin) {
                $admin->notify(new JobExpiringNotification($job, $daysUntilExpiry));
                $notificationsSent++;
            }

            $this->info("Notified about: {$job->title} (expires in {$daysUntilExpiry} days)");
        }

        $this->info("Total notifications sent: {$notificationsSent}");
        return 0;
    }
}
