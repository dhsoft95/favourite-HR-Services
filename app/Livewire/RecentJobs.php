<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class RecentJobs extends Component
{
    public $limit = 6;

    public function render()
    {
        $recentJobs = Job::where('status', 'published')
            ->where('is_active', true)
            ->where('deadline', '>=', now())
            ->latest('created_at')
            ->limit($this->limit)
            ->get();

        return view('livewire.recent-jobs', [
            'jobs' => $recentJobs
        ]);
    }
}
