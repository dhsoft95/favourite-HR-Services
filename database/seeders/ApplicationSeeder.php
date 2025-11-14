<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        // Get all regular users (not admins)
        $users = User::where('role', 'user')->get();

        // Get all published jobs
        $publishedJobs = Job::where('status', 'published')->get();

        if ($users->isEmpty() || $publishedJobs->isEmpty()) {
            $this->command->warn('No users or published jobs found. Run UserSeeder and JobSeeder first.');
            return;
        }

        // Create dummy CV file if storage doesn't exist
        Storage::disk('public')->makeDirectory('cvs');
        $dummyCvContent = "CURRICULUM VITAE\n\nThis is a dummy CV file for testing purposes.\n\nName: Test Applicant\nEmail: test@example.com\nPhone: +255123456789";
        Storage::disk('public')->put('cvs/dummy-cv.pdf', $dummyCvContent);

        $statuses = ['pending', 'reviewing', 'shortlisted', 'interview', 'accepted', 'rejected'];

        // Create applications for different scenarios
        $applications = [
            // John applies to Senior Laravel Developer - Accepted
            [
                'user_id' => $users->where('email', 'john@example.com')->first()?->id,
                'job_id' => $publishedJobs->where('title', 'Senior Laravel Developer')->first()?->id,
                'status' => 'accepted',
                'created_at' => now()->subDays(15),
            ],
            // Jane applies to Digital Marketing Manager - Interview
            [
                'user_id' => $users->where('email', 'jane@example.com')->first()?->id,
                'job_id' => $publishedJobs->where('title', 'Digital Marketing Manager')->first()?->id,
                'status' => 'interview',
                'created_at' => now()->subDays(10),
            ],
            // Michael applies to Financial Analyst - Shortlisted
            [
                'user_id' => $users->where('email', 'michael@example.com')->first()?->id,
                'job_id' => $publishedJobs->where('title', 'Financial Analyst')->first()?->id,
                'status' => 'shortlisted',
                'created_at' => now()->subDays(8),
            ],
            // Sarah applies to Registered Nurse - Reviewing
            [
                'user_id' => $users->where('email', 'sarah@example.com')->first()?->id,
                'job_id' => $publishedJobs->where('title', 'Registered Nurse')->first()?->id,
                'status' => 'reviewing',
                'created_at' => now()->subDays(5),
            ],
            // David applies to Senior Laravel Developer - Rejected
            [
                'user_id' => $users->where('email', 'david@example.com')->first()?->id,
                'job_id' => $publishedJobs->where('title', 'Senior Laravel Developer')->first()?->id,
                'status' => 'rejected',
                'created_at' => now()->subDays(12),
            ],
            // Emily applies to HR Administrator - Pending
            [
                'user_id' => $users->where('email', 'emily@example.com')->first()?->id,
                'job_id' => $publishedJobs->where('title', 'HR Administrator')->first()?->id,
                'status' => 'pending',
                'created_at' => now()->subDays(2),
            ],
            // James applies to Remote Customer Support - Pending
            [
                'user_id' => $users->where('email', 'james@example.com')->first()?->id,
                'job_id' => $publishedJobs->where('title', 'Remote Customer Support Specialist')->first()?->id,
                'status' => 'pending',
                'created_at' => now()->subDays(1),
            ],
            // Lisa applies to Digital Marketing Manager - Pending
            [
                'user_id' => $users->where('email', 'lisa@example.com')->first()?->id,
                'job_id' => $publishedJobs->where('title', 'Digital Marketing Manager')->first()?->id,
                'status' => 'pending',
                'created_at' => now()->subHours(12),
            ],
            // Robert applies to Remote Customer Support - Reviewing
            [
                'user_id' => $users->where('email', 'robert@example.com')->first()?->id,
                'job_id' => $publishedJobs->where('title', 'Remote Customer Support Specialist')->first()?->id,
                'status' => 'reviewing',
                'created_at' => now()->subDays(6),
            ],
            // Maria applies to Administrative Assistant - Shortlisted
            [
                'user_id' => $users->where('email', 'maria@example.com')->first()?->id,
                'job_id' => $publishedJobs->where('title', 'Administrative Assistant')->first()?->id,
                'status' => 'shortlisted',
                'created_at' => now()->subDays(7),
            ],
            // More applications for testing
            [
                'user_id' => $users->where('email', 'john@example.com')->first()?->id,
                'job_id' => $publishedJobs->where('title', 'Financial Analyst')->first()?->id,
                'status' => 'rejected',
                'created_at' => now()->subDays(20),
            ],
            [
                'user_id' => $users->where('email', 'jane@example.com')->first()?->id,
                'job_id' => $publishedJobs->where('title', 'HR Administrator')->first()?->id,
                'status' => 'interview',
                'created_at' => now()->subDays(9),
            ],
        ];

        foreach ($applications as $appData) {
            if ($appData['user_id'] && $appData['job_id']) {
                Application::create([
                    'user_id' => $appData['user_id'],
                    'job_id' => $appData['job_id'],
                    'cv_path' => 'cvs/dummy-cv.pdf',
                    'status' => $appData['status'],
                    'created_at' => $appData['created_at'],
                    'updated_at' => $appData['created_at'],
                ]);
            }
        }

        $this->command->info('Applications seeded successfully!');
    }
}
