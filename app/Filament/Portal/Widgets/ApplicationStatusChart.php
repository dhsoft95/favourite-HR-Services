<?php

namespace App\Filament\Portal\Widgets;

use App\Models\Application;
use Filament\Widgets\ChartWidget;

class ApplicationStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Applications by Status';

    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $pending = Application::where('status', 'pending')->count();
        $reviewing = Application::where('status', 'reviewing')->count();
        $shortlisted = Application::where('status', 'shortlisted')->count();
        $interview = Application::where('status', 'interview')->count();
        $accepted = Application::where('status', 'accepted')->count();
        $rejected = Application::where('status', 'rejected')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Applications',
                    'data' => [$pending, $reviewing, $shortlisted, $interview, $accepted, $rejected],
                    'backgroundColor' => [
                        'rgb(156, 163, 175)', // Gray for pending
                        'rgb(251, 191, 36)',  // Yellow for reviewing
                        'rgb(59, 130, 246)',  // Blue for shortlisted
                        'rgb(168, 85, 247)',  // Purple for interview
                        'rgb(34, 197, 94)',   // Green for accepted
                        'rgb(239, 68, 68)',   // Red for rejected
                    ],
                ],
            ],
            'labels' => ['Pending', 'Reviewing', 'Shortlisted', 'Interview', 'Accepted', 'Rejected'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
