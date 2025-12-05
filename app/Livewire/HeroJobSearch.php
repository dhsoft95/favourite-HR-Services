<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class HeroJobSearch extends Component
{
    public $search = '';
    public $location = '';
    public $category = '';

    public function searchJobs()
    {
        $query = Job::where('status', 'published')
            ->where('is_active', true)
            ->where('deadline', '>=', now());

        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('company_name', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->location) {
            $locationMap = [
                'dodoma' => 'Dodoma',
                'dar-es-salaam' => 'Dar es Salaam',
                'arusha' => 'Arusha',
                'mwanza' => 'Mwanza',
                'remote' => 'Remote'
            ];

            $locationValue = $locationMap[$this->location] ?? $this->location;
            $query->where('location', 'like', '%' . $locationValue . '%');
        }

        if ($this->category) {
            $categoryMap = [
                'technology' => 'IT & Software',
                'finance' => 'Finance',
                'healthcare' => 'Healthcare',
                'marketing' => 'Marketing'
            ];

            $categoryValue = $categoryMap[$this->category] ?? $this->category;
            $query->where('category', $categoryValue);
        }

        $params = array_filter([
            'search' => $this->search,
            'location' => $this->location ? ($locationMap[$this->location] ?? $this->location) : null,
            'selectedCategories' => $this->category ? [($categoryMap[$this->category] ?? $this->category)] : null,
        ]);

        return redirect()->route('jobs', $params);
    }

    public function render()
    {
        return view('livewire.hero-job-search');
    }
}
