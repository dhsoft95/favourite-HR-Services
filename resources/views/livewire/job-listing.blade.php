<div>
    <section class="relative h-[300px] sm:h-[350px] lg:h-[450px] overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('/images/about/jobs-bg.webp');">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/30"></div>
        </div>

        <div class="relative h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
                <div class="flex items-center h-full">
                    <div class="max-w-4xl">
                        <h1 class="text-white leading-tight mb-4 drop-shadow-lg"
                            style="font-family: Inter, serif;
                               font-weight: 600;
                               font-size: clamp(32px, 5vw, 60px);
                               line-height: 1.2;
                               letter-spacing: -0.02em;">
                            Find the job that<br>
                            suits your skills
                        </h1>
                        <p class="text-sm sm:text-base lg:text-xl text-white/95 leading-relaxed max-w-lg drop-shadow-md">
                            Empower your project with our comprehensive wireframe kits designed to meet the needs of any platform
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-6 lg:py-8 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Search Section -->
            <div class="mb-6 lg:mb-8">
                <div class="flex flex-col sm:flex-row gap-3 mb-6 lg:mb-8">
                    <!-- Job Search Input -->
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text"
                               wire:model.live.debounce.300ms="search"
                               placeholder="Job title, Position, Keyword..."
                               class="w-full pl-12 pr-4 py-3 sm:py-4 border-2 border-blue-500 rounded-lg focus:outline-none focus:border-blue-600 text-gray-900 placeholder-gray-400 text-sm">
                    </div>

                    <!-- Location Input -->
                    <div class="w-full sm:w-52 lg:w-80 relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                        </div>
                        <input type="text"
                               wire:model.live.debounce.300ms="location"
                               placeholder="City"
                               class="w-full pl-12 pr-4 py-3 sm:py-4 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-gray-900 placeholder-gray-400 text-sm">
                    </div>

                    <!-- Clear Filters Button -->
                    @if($search || $location || count($selectedJobTypes) > 0 || count($selectedCategories) > 0 || $datePosted)
                        <button wire:click="clearFilters"
                                class="w-full sm:w-auto px-5 py-3 sm:py-4 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-colors duration-300 text-sm whitespace-nowrap">
                            Clear Filters
                        </button>
                    @endif
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">

                <!-- Mobile Filter Toggle -->
                <div class="lg:hidden">
                    <button
                        x-data
                        x-on:click="$dispatch('toggle-filters')"
                        class="w-full flex items-center justify-between px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-sm font-semibold text-gray-700">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-sliders-h text-blue-600"></i>
                            Filter Jobs
                        </span>
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </button>
                </div>

                <!-- Sidebar Filters -->
                <div
                    x-data="{ open: false }"
                    x-on:toggle-filters.window="open = !open"
                    class="w-full lg:w-72 flex-shrink-0"
                    :class="{ 'block': open, 'hidden lg:block': !open }">
                    <div class="lg:sticky lg:top-6 space-y-4 lg:space-y-6">

                        <!-- Job Type Filter -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 lg:p-6">
                            <h3 class="font-semibold text-gray-900 mb-3 lg:mb-4 text-sm lg:text-base">Job Type</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-1 gap-2 lg:gap-3">
                                @foreach(['Full Time', 'Part Time', 'Remote', 'Internship', 'Contract'] as $type)
                                    <label class="flex items-center justify-between cursor-pointer">
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                   wire:model.live="selectedJobTypes"
                                                   value="{{ $type }}"
                                                   class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                            <span class="ml-2 lg:ml-3 text-gray-700 text-xs lg:text-sm">{{ $type }}</span>
                                        </div>
                                        <span class="text-xs {{ in_array($type, $selectedJobTypes) ? 'text-blue-600 font-medium bg-blue-50' : 'text-gray-500 bg-gray-100' }} px-1.5 py-0.5 rounded">
                                            {{ $jobTypeCounts[$type] ?? 0 }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Job Category Filter -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 lg:p-6">
                            <h3 class="font-semibold text-gray-900 mb-3 lg:mb-4 text-sm lg:text-base">Job Category</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-1 gap-2 lg:gap-3">
                                @foreach(['IT & Software', 'Finance', 'Healthcare', 'Education', 'Marketing', 'Sales', 'Engineering'] as $category)
                                    <label class="flex items-center justify-between cursor-pointer">
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                   wire:model.live="selectedCategories"
                                                   value="{{ $category }}"
                                                   class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                            <span class="ml-2 lg:ml-3 text-gray-700 text-xs lg:text-sm">{{ $category }}</span>
                                        </div>
                                        <span class="text-xs {{ in_array($category, $selectedCategories) ? 'text-blue-600 font-medium bg-blue-50' : 'text-gray-500 bg-gray-100' }} px-1.5 py-0.5 rounded">
                                            {{ $categoryCounts[$category] ?? 0 }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Date Posted Filter -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 lg:p-6">
                            <h3 class="font-semibold text-gray-900 mb-3 lg:mb-4 text-sm lg:text-base">Date Posted</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-1 gap-2 lg:gap-3">
                                @foreach([
                                    'last_24_hours' => 'Last 24 hours',
                                    'last_3_days' => 'Last 3 days',
                                    'last_7_days' => 'Last 7 days',
                                    'last_14_days' => 'Last 14 days',
                                    '' => 'Anytime'
                                ] as $value => $label)
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio"
                                               wire:model.live="datePosted"
                                               value="{{ $value }}"
                                               class="w-4 h-4 text-blue-600 focus:ring-blue-500 focus:ring-2">
                                        <span class="ml-2 lg:ml-3 text-gray-700 text-xs lg:text-sm">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Listings -->
                <div class="flex-1 min-w-0">
                    <!-- Loading Indicator -->
                    <div wire:loading class="text-center py-8">
                        <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                        <p class="mt-2 text-gray-600 text-sm">Loading jobs...</p>
                    </div>

                    <div wire:loading.remove class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 lg:gap-6">
                        @forelse($jobs as $job)
                            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-all duration-300">
                                <!-- Job Image -->
                                <div class="h-36 lg:h-40 bg-gray-100 overflow-hidden">
                                    @if($job->image)
                                        <img src="{{ asset('storage/' . $job->image) }}"
                                             alt="{{ $job->title }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100">
                                            <i class="fas fa-briefcase text-3xl text-gray-400"></i>
                                        </div>
                                    @endif
                                </div>

                                <!-- Card Content -->
                                <div class="p-3 lg:p-4">
                                    <div class="mb-2 lg:mb-3">
                                        <h3 class="text-base lg:text-lg font-semibold text-gray-900 mb-1 line-clamp-1">{{ $job->title }}</h3>
                                        <span class="inline-block px-2 py-0.5 text-xs font-medium rounded {{ $job->job_type === 'Full Time' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                            {{ $job->job_type }}
                                        </span>
                                    </div>

                                    <div class="mb-2 lg:mb-3">
                                        <p class="text-xs lg:text-sm text-gray-600 line-clamp-2">
                                            {{ Str::limit(strip_tags($job->description), 100) }}
                                        </p>
                                    </div>

                                    <div class="mb-2 lg:mb-3">
                                        @if($job->requirements)
                                            @php
                                                $requirements = explode("\n", $job->requirements);
                                                $firstRequirement = trim($requirements[0] ?? '');
                                            @endphp
                                            @if($firstRequirement)
                                                <div class="flex items-start text-xs lg:text-sm text-gray-600">
                                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-1.5 mr-2 flex-shrink-0"></span>
                                                    <span class="line-clamp-1">{{ $firstRequirement }}</span>
                                                </div>
                                            @endif
                                        @endif
                                    </div>

                                    <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                                        <div class="flex items-center gap-1">
                                            <i class="fas fa-map-marker-alt text-red-500"></i>
                                            <span>{{ Str::limit($job->location, 15) }}</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <i class="far fa-clock"></i>
                                            <span>{{ $job->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <a href="{{ route('jobs-details', $job->id) }}"
                                           class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded text-xs lg:text-sm font-medium hover:bg-[#1f2347] transition-colors duration-300 text-center">
                                            View Details
                                        </a>
                                        <button class="p-2 border border-gray-300 rounded hover:bg-gray-50 transition-colors duration-300">
                                            <i class="far fa-bookmark text-gray-600 text-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="col-span-full text-center py-12">
                                <i class="fas fa-briefcase text-5xl lg:text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-lg lg:text-xl font-semibold text-gray-700 mb-2">No jobs found</h3>
                                <p class="text-gray-500 text-sm">Try adjusting your filters or search terms</p>
                            </div>
                        @endforelse
                    </div>

                    @if($jobs->hasPages())
                        <div class="mt-8 lg:mt-12">
                            {{ $jobs->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
