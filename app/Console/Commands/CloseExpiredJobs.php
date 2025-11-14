<?php

namespace App\Console\Commands;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CloseExpiredJobs extends Command
{
    protected $signature = 'jobs:close-expired';

    protected $description = 'Automatically close job postings that have passed their deadline';

    public function handle()
    {
        // Get published jobs past their deadline
        $expiredJobs = Job::where('status', 'published')
            ->where('deadline', '<', Carbon::now())
            ->get();

        if ($expiredJobs->isEmpty()) {
            $this->info('No expired jobs found.');
            return 0;
        }

        $closedCount = 0;

        foreach ($expiredJobs as $job) {
            $job->update([
                'status' => 'closed',
                'is_active' => false,
            ]);

            $closedCount++;
            $this->info("Closed job: {$job->title} (expired on {$job->deadline->format('Y-m-d')})");
        }

        $this->info("Total jobs closed: {$closedCount}");
        return 0;
    }
}
