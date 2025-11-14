<?php

namespace App\Filament\Portal\Widgets;

use App\Models\Job;
use Filament\Widgets\ChartWidget;

class JobStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Job Postings by Status';

    protected static ?int $sort =2;

    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $published = Job::where('status', 'published')->count();
        $draft = Job::where('status', 'draft')->count();
        $closed = Job::where('status', 'closed')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Job Status',
                    'data' => [$published, $draft, $closed],
                    'backgroundColor' => [
                        'rgb(34, 197, 94)',  // Green for published
                        'rgb(156, 163, 175)', // Gray for draft
                        'rgb(239, 68, 68)',   // Red for closed
                    ],
                ],
            ],
            'labels' => ['Published', 'Draft', 'Closed'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
