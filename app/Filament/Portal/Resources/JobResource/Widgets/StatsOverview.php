<?php

namespace App\Filament\Portal\Resources\JobResource\Widgets;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalJobs = Job::count();
        $publishedJobs = Job::where('status', 'published')->count();
        $draftJobs = Job::where('status', 'draft')->count();
        $closedJobs = Job::where('status', 'closed')->count();

        $totalApplications = Application::count();
        $pendingApplications = Application::where('status', 'pending')->count();
        $acceptedApplications = Application::where('status', 'accepted')->count();

        $totalUsers = User::where('role', 'user')->count();
        $newUsersThisMonth = User::where('role', 'user')
            ->whereMonth('created_at', now()->month)
            ->count();

        $expiringSoon = Job::where('status', 'published')
            ->whereBetween('deadline', [now(), now()->addDays(7)])
            ->count();

        return [
            Stat::make('Total Job Postings', $totalJobs)
                ->description($publishedJobs . ' published, ' . $draftJobs . ' draft')
                ->descriptionIcon('heroicon-o-briefcase')
                ->color('primary')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),

            Stat::make('Total Applications', $totalApplications)
                ->description($pendingApplications . ' pending review')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('success')
                ->chart([3, 5, 7, 4, 6, 8, 9, 10])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),

            Stat::make('Registered Candidates', $totalUsers)
                ->description($newUsersThisMonth . ' new this month')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('warning')
                ->chart([2, 3, 4, 5, 3, 4, 5, 6]),

            Stat::make('Active Job Postings', $publishedJobs)
                ->description($expiringSoon . ' expiring within 7 days')
                ->descriptionIcon('heroicon-o-clock')
                ->color('info')
                ->chart([4, 5, 3, 6, 7, 5, 8, 9]),

            Stat::make('Pending Applications', $pendingApplications)
                ->description('Awaiting review')
                ->descriptionIcon('heroicon-o-clock')
                ->color($pendingApplications > 10 ? 'danger' : 'warning'),

            Stat::make('Accepted Applications', $acceptedApplications)
                ->description('Successfully hired')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}
