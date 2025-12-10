<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\Builder;

#[Layout('layouts.main')]
class JobListing extends Component
{
    use WithPagination;

    public $search = '';
    public $location = '';
    public $selectedJobTypes = [];
    public $selectedCategories = [];
    public $datePosted = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'location' => ['except' => ''],
        'selectedCategories' => ['except' => []],
        'selectedJobTypes' => ['except' => []],
        'datePosted' => ['except' => ''],
    ];

    public function mount()
    {
        $this->search = request('search', '');
        $this->location = request('location', '');
        $this->selectedCategories = $this->parseCategories(request('selectedCategories', []));
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['search', 'location', 'selectedJobTypes', 'selectedCategories', 'datePosted'])) {
            $this->resetPage();
        }
    }

    public function clearFilters()
    {
        $this->reset(['search', 'location', 'selectedJobTypes', 'selectedCategories', 'datePosted']);
        $this->resetPage();
    }

    public function render()
    {
        $jobs = $this->getFilteredJobs();
        $filterCounts = $this->getFilterCounts();

        return view('livewire.job-listing', [
            'jobs' => $jobs,
            'jobTypeCounts' => $filterCounts['jobTypes'],
            'categoryCounts' => $filterCounts['categories'],
        ]);
    }

    private function getBaseQuery(): Builder
    {
        return Job::select([
            'id', 'title', 'company_name', 'image', 'description',
            'job_type', 'category_id', 'location', 'experience_level',
            'deadline', 'is_featured', 'created_at'
        ])
            ->where('status', 'published')
            ->where('is_active', true)
            ->where('deadline', '>=', now());
    }

    private function getFilteredJobs()
    {
        $query = $this->getBaseQuery();

        $this->applySearchFilter($query)
            ->applyLocationFilter($query)
            ->applyJobTypeFilter($query)
            ->applyCategoryFilter($query)
            ->applyDateFilter($query);

        return $query->withCount('applications')
            ->latest('created_at')
            ->paginate(12);
    }

    private function applySearchFilter(Builder $query): self
    {
        if (!$this->search) return $this;

        $query->where(function($q) {
            $searchTerm = '%' . $this->search . '%';
            $q->where('title', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm)
                ->orWhere('company_name', 'like', $searchTerm)
                ->orWhere('requirements', 'like', $searchTerm);
        });

        return $this;
    }

    private function applyLocationFilter(Builder $query): self
    {
        if ($this->location) {
            $query->where('location', 'like', '%' . $this->location . '%');
        }
        return $this;
    }

    private function applyJobTypeFilter(Builder $query): self
    {
        if (!empty($this->selectedJobTypes)) {
            $query->whereIn('job_type', $this->selectedJobTypes);
        }
        return $this;
    }

    private function applyCategoryFilter(Builder $query): self
    {
        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
        }
        return $this;
    }

    private function applyDateFilter(Builder $query): self
    {
        if (!$this->datePosted) return $this;

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

        return $this;
    }

    private function getFilterCounts(): array
    {
        $baseQuery = $this->getBaseQuery();

        return [
            'jobTypes' => $baseQuery->clone()
                ->selectRaw('job_type, count(*) as count')
                ->groupBy('job_type')
                ->pluck('count', 'job_type'),
            'categories' => $baseQuery->clone()
                ->selectRaw('category_id, count(*) as count')
                ->groupBy('category_id')
                ->pluck('count', 'category_id')
        ];
    }

    private function parseCategories($categories): array
    {
        if (empty($categories)) return [];
        return is_array($categories) ? $categories : [$categories];
    }
}
