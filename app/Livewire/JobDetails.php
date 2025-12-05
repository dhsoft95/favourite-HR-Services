<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.main')]
class JobDetails extends Component
{
    public Job $job;
    public $hasApplied = false;
    public $jobId;

    public function mount($jobId)
    {
        $this->jobId = $jobId;

        $this->job = Job::where('status', 'published')
            ->where('is_active', true)
            ->withCount('applications')
            ->findOrFail($jobId);

        // Check if user has already applied
        if (auth()->check()) {
            $this->hasApplied = $this->job->applications()
                ->where('user_id', auth()->id())
                ->exists();
        }
    }

    #[Title('Job Details')]
    public function render()
    {
        return view('livewire.job-details');
    }
}
