<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-[#2A2D5A] to-[#1f2347] overflow-hidden shadow-lg rounded-lg mb-8">
                <div class="p-8 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold mb-2">Welcome back, {{ Auth::user()->name }}! 👋</h3>
                            <p class="text-blue-100">Find your dream job today. Your next opportunity awaits.</p>
                        </div>
                        <div class="hidden md:block">
                            <svg class="h-20 w-20 text-white/20" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                @php
                    $applicationsCount = Auth::user()->applications()->count();
                    $pendingCount = Auth::user()->applications()->where('status', 'pending')->count();
                    $interviewsCount = Auth::user()->applications()->where('status', 'interview')->count();
                    $acceptedCount = Auth::user()->applications()->where('status', 'accepted')->count();
                @endphp

                    <!-- Total Applications -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-100 rounded-lg p-3">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Applications</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $applicationsCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Review -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-100 rounded-lg p-3">
                                <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Pending Review</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $pendingCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Interviews Scheduled -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-100 rounded-lg p-3">
                                <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Interviews</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $interviewsCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Accepted Offers -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-100 rounded-lg p-3">
                                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Accepted</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $acceptedCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Available Jobs Table -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg mb-8">
                <div class="p-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-gray-900">Available Jobs</h3>
                        <a href="{{ route('jobs') }}" class="text-xs text-[#2A2D5A] hover:text-[#1f2347] font-medium">View all jobs</a>
                    </div>
                </div>
                <div class="p-4">
                    @php
                        // Get IDs of jobs user has already applied to
                        $appliedJobIds = Auth::user()->applications()->pluck('job_id')->toArray();

                        // Get available jobs excluding already applied ones
                        $availableJobs = \App\Models\Job::where('status', 'published')
                            ->where('is_active', true)
                            ->where('deadline', '>=', now())
                            ->whereNotIn('id', $appliedJobIds)
                            ->latest()
                            ->take(10)
                            ->get();
                    @endphp

                    @if($availableJobs->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job Title</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Company</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Experience</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deadline</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($availableJobs as $job)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-3 py-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-8 w-8 flex-shrink-0 bg-blue-100 rounded-lg flex items-center justify-center mr-2">
                                        <span class="text-[#2A2D5A] font-bold text-xs">
                                            {{ strtoupper(substr($job->company_name, 0, 2)) }}
                                        </span>
                                                </div>
                                                <div>
                                                    <div class="text-xs font-medium text-gray-900">{{ $job->title }}</div>
                                                    <div class="text-xs text-gray-500">{{ $job->category }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 py-2 whitespace-nowrap">
                                            <div class="text-xs text-gray-900">{{ $job->company_name }}</div>
                                        </td>
                                        <td class="px-3 py-2 whitespace-nowrap">
                                            @php
                                                $typeColors = [
                                                    'Full Time' => 'bg-green-100 text-green-800',
                                                    'Part Time' => 'bg-yellow-100 text-yellow-800',
                                                    'Remote' => 'bg-blue-100 text-blue-800',
                                                    'Contract' => 'bg-purple-100 text-purple-800',
                                                    'Internship' => 'bg-pink-100 text-pink-800',
                                                ];
                                                $typeColor = $typeColors[$job->job_type] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $typeColor }}">
                                    {{ $job->job_type }}
                                </span>
                                        </td>
                                        <td class="px-3 py-2 whitespace-nowrap text-xs text-gray-900">
                                            {{ $job->location }}
                                        </td>
                                        <td class="px-3 py-2 whitespace-nowrap text-xs text-gray-900">
                                            {{ $job->experience_level }}
                                        </td>
                                        <td class="px-3 py-2 whitespace-nowrap text-xs text-gray-500">
                                            {{ $job->deadline->format('M d, Y') }}
                                        </td>
                                        <td class="px-3 py-2 whitespace-nowrap text-xs font-medium">
                                            <button
                                                type="button"
                                                onclick="Livewire.dispatch('openApplyModal', { jobId: {{ $job->id }} })"
                                                class="bg-[#2A2D5A] hover:bg-[#1f2347] text-white px-3 py-1.5 rounded-md text-xs font-medium transition-colors"
                                            >
                                                Apply Now
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">You're all caught up!</h3>
                            <p class="mt-1 text-xs text-gray-500">You've applied to all available jobs. Check back later for new opportunities.</p>
                            <div class="mt-4">
                                <a href="{{ route('jobs') }}" class="inline-flex items-center px-3 py-1.5 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-[#2A2D5A] hover:bg-[#1f2347]">
                                    <svg class="-ml-1 mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    Browse All Jobs
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- My Applications Table -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">My Applications</h3>
                        <span class="text-sm text-gray-500">{{ $applicationsCount }} total applications</span>
                    </div>
                </div>
                <div class="p-6">
                    @php
                        $userApplications = Auth::user()->applications()
                            ->with('job')
                            ->latest()
                            ->take(10)
                            ->get();
                    @endphp

                    @if($userApplications->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Company</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applied Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($userApplications as $application)
                                    @php
                                        $statusConfig = [
                                            'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => 'clock'],
                                            'reviewing' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'icon' => 'eye'],
                                            'shortlisted' => ['bg' => 'bg-indigo-100', 'text' => 'text-indigo-800', 'icon' => 'star'],
                                            'interview' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-800', 'icon' => 'calendar'],
                                            'accepted' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => 'check-circle'],
                                            'rejected' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'icon' => 'x-circle'],
                                        ];
                                        $config = $statusConfig[$application->status] ?? $statusConfig['pending'];
                                    @endphp
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $application->job->title }}</div>
                                            <div class="text-sm text-gray-500">{{ $application->job->job_type }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $application->job->company_name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $application->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $config['bg'] }} {{ $config['text'] }}">
                                                    {{ ucfirst($application->status) }}
                                                </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('jobs-details', $application->job_id) }}" class="text-[#2A2D5A] hover:text-[#1f2347] font-medium">
                                                View Job
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No applications yet</h3>
                            <p class="mt-1 text-sm text-gray-500">Start browsing jobs and apply to positions that interest you!</p>
                            <div class="mt-6">
                                <a href="{{ route('jobs') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#2A2D5A] hover:bg-[#1f2347]">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    Browse Jobs
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg mt-6">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="{{ route('jobs') }}" class="flex flex-col items-center justify-center p-6 border-2 border-gray-200 rounded-lg hover:border-[#2A2D5A] hover:bg-blue-50 transition-all group">
                            <svg class="h-8 w-8 text-gray-400 group-hover:text-[#2A2D5A] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-[#2A2D5A]">Browse Jobs</span>
                        </a>
                        <a href="{{ route('profile') }}" class="flex flex-col items-center justify-center p-6 border-2 border-gray-200 rounded-lg hover:border-[#2A2D5A] hover:bg-blue-50 transition-all group">
                            <svg class="h-8 w-8 text-gray-400 group-hover:text-[#2A2D5A] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-[#2A2D5A]">Edit Profile</span>
                        </a>
                        <a href="{{ route('profile') }}" class="flex flex-col items-center justify-center p-6 border-2 border-gray-200 rounded-lg hover:border-[#2A2D5A] hover:bg-blue-50 transition-all group">
                            <svg class="h-8 w-8 text-gray-400 group-hover:text-[#2A2D5A] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-[#2A2D5A]">My Resume</span>
                        </a>
                        <a href="#" class="flex flex-col items-center justify-center p-6 border-2 border-gray-200 rounded-lg hover:border-[#2A2D5A] hover:bg-blue-50 transition-all group">
                            <svg class="h-8 w-8 text-gray-400 group-hover:text-[#2A2D5A] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-[#2A2D5A]">Preferences</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Toast Notifications -->
    <x-toast-notification />
    <!-- Apply Job Modal -->
    @livewire('apply-job-modal')
</x-app-layout>
