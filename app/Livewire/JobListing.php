<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.main')]

class JobListing extends Component
{
    use WithPagination;

    // Filter properties
    public $search = '';
    public $location = '';
    public $selectedJobTypes = [];
    public $selectedCategories = [];
    public $datePosted = '';

    public function mount()
    {
        $this->search = request()->query('search', '');
        $this->location = request()->query('location', '');

        $categories = request()->query('selectedCategories', []);
        if (!empty($categories)) {
            $this->selectedCategories = is_array($categories) ? $categories : [$categories];
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingLocation()
    {
        $this->resetPage();
    }

    public function updatingSelectedJobTypes()
    {
        $this->resetPage();
    }

    public function updatingSelectedCategories()
    {
        $this->resetPage();
    }

    public function updatingDatePosted()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset(['search', 'location', 'selectedJobTypes', 'selectedCategories', 'datePosted']);
        $this->resetPage();
    }

    public function render()
    {
        // Base query
        $query = Job::select([
            'id',
            'title',
            'company_name',
            'image',
            'description',
            'job_type',
            'category',
            'location',
            'experience_level',
            'deadline',
            'is_featured',
            'created_at'
        ])
            ->where('status', 'published')
            ->where('is_active', true)
            ->where('deadline', '>=', now());

        // Apply search filter
        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('company_name', 'like', '%' . $this->search . '%')
                    ->orWhere('requirements', 'like', '%' . $this->search . '%');
            });
        }

        // Apply location filter
        if ($this->location) {
            $query->where('location', 'like', '%' . $this->location . '%');
        }

        // Apply job type filter
        if (!empty($this->selectedJobTypes)) {
            $query->whereIn('job_type', $this->selectedJobTypes);
        }

        // Apply category filter
        if (!empty($this->selectedCategories)) {
            $query->whereIn('category', $this->selectedCategories);
        }

        // Apply date posted filter
        if ($this->datePosted) {
            $days = match($this->datePosted) {
                'last_24_hours' => 1,
                'last_3_days' => 3,
                'last_7_days' => 7,
                'last_14_days' => 14,
                default => null
            };

            if ($days) {
                $query->where('created_at', '>=', now()->subDays($days));
            }
        }

        // Get jobs with pagination
        $jobs = $query->withCount('applications')
            ->latest('created_at')
            ->paginate(12);

        // Get filter counts
        $jobTypeCounts = Job::where('status', 'published')
            ->where('is_active', true)
            ->where('deadline', '>=', now())
            ->selectRaw('job_type, count(*) as count')
            ->groupBy('job_type')
            ->pluck('count', 'job_type');

        $categoryCounts = Job::where('status', 'published')
            ->where('is_active', true)
            ->where('deadline', '>=', now())
            ->selectRaw('category, count(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category');

        return view('livewire.job-listing', [
            'jobs' => $jobs,
            'jobTypeCounts' => $jobTypeCounts,
            'categoryCounts' => $categoryCounts,
        ]);
    }
}
