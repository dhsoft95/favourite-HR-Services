<div>
    <section class="relative h-[400px] lg:h-[450px] overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('/images/about/job-list.jpg');">
            <!-- Enhanced overlay for better text readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/30"></div>
        </div>

        <!-- Content -->
        <div class="relative h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
                <div class="flex items-center h-full">
                    <div class="max-w-4xl">
                        <h1 class="text-white leading-tight mb-6 drop-shadow-lg"
                            style="font-family: Inter;
                               font-weight: 600;
                               font-size: 60px;
                               line-height: 72px;
                               letter-spacing: -0.02em;
                               max-width: 100%;">
                            {{ $job->title }}
                        </h1>
                        <p class="text-lg lg:text-xl text-white/95 leading-relaxed max-w-lg drop-shadow-md">
                            {{ $job->company_name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-sm p-8">

                        <!-- Job Header -->
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between mb-8">
                            <div class="flex items-start mb-4 sm:mb-0">
                                <!-- Company Logo -->
                                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                    <span class="text-white text-xl font-bold">{{ substr($job->company_name, 0, 1) }}</span>
                                </div>

                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $job->title }}</h1>
                                    <div class="flex flex-wrap items-center gap-3">
                                        <span class="bg-{{ $job->job_type === 'Full Time' ? 'green' : 'blue' }}-500 text-white text-xs px-3 py-1 rounded-full uppercase font-bold">
                                            {{ $job->job_type }}
                                        </span>
                                        @if($job->is_featured)
                                            <span class="text-red-500 text-xs uppercase font-medium">Featured</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center gap-3">
                                <button class="p-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>

                                @auth
                                    @if($hasApplied)
                                        <button disabled class="bg-gray-400 text-white px-6 py-3 rounded-lg cursor-not-allowed font-semibold flex items-center">
                                            <i class="fas fa-check mr-2"></i>
                                            Already Applied
                                        </button>
                                    @else
                                        <button wire:click="$dispatch('openApplyModal', { jobId: {{ $job->id }} })"
                                                class="bg-[#2A2D5A] text-white px-6 py-3 rounded-lg hover:bg-[#1f2347] transition-colors font-semibold flex items-center">
                                            Apply Now
                                            <i class="fas fa-arrow-right ml-2"></i>
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                       class="bg-[#2A2D5A] text-white px-6 py-3 rounded-lg hover:bg-[#1f2347] transition-colors font-semibold flex items-center">
                                        Login to Apply
                                        <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                @endauth
                            </div>
                        </div>

                        <!-- Job Description -->
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Job Description</h2>
                            <div class="text-gray-600 leading-relaxed prose max-w-none">
                                {!! $job->description !!}
                            </div>
                        </div>

                        <!-- Requirements -->
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Requirements</h2>
                            <div class="text-gray-600 leading-relaxed space-y-3">
                                @foreach(explode("\n", $job->requirements) as $requirement)
                                    @if(trim($requirement))
                                        <div class="flex items-start">
                                            <span class="text-blue-500 mr-2 mt-1">•</span>
                                            <span>{{ trim($requirement) }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Benefits -->
                        @if($job->benefits)
                            <div class="mb-8">
                                <h2 class="text-xl font-bold text-gray-900 mb-4">Benefits</h2>
                                <div class="text-gray-600 leading-relaxed space-y-3">
                                    @foreach(explode("\n", $job->benefits) as $benefit)
                                        @if(trim($benefit))
                                            <div class="flex items-start">
                                                <span class="text-green-500 mr-2 mt-1">✓</span>
                                                <span>{{ trim($benefit) }}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Company Info -->
                        <div class="border-t border-gray-200 pt-6 mt-8">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">About {{ $job->company_name }}</h2>
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-20 h-20 bg-blue-600 rounded-lg flex items-center justify-center">
                                    <span class="text-white text-2xl font-bold">{{ substr($job->company_name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $job->company_name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $job->location }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-sm p-6 sticky top-6">

                        <!-- Key Information Cards -->
                        <div class="space-y-4 mb-6">
                            <!-- Deadline Card -->
                            <div class="bg-red-50 border border-red-100 rounded-lg p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i class="far fa-clock text-red-500 mr-2"></i>
                                        <span class="text-sm font-medium text-gray-700">Deadline</span>
                                    </div>
                                    <span class="font-semibold text-red-600">{{ $job->deadline->format('d M Y') }}</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">{{ $job->deadline->diffForHumans() }}</p>
                            </div>

                            <!-- Location Card -->
                            <div class="bg-blue-50 border border-blue-100 rounded-lg p-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>
                                    <span class="text-sm font-medium text-gray-700 mr-2">Location:</span>
                                    <span class="font-semibold text-blue-700">{{ $job->location }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Job Details -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-900 mb-3">Job Details</h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Posted:</span>
                                    <span class="font-medium text-gray-900">{{ $job->created_at->format('d M, Y') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Experience:</span>
                                    <span class="font-medium text-gray-900">{{ $job->experience_level }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Job Type:</span>
                                    <span class="font-medium text-gray-900">{{ $job->job_type }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Category:</span>
                                    <span class="font-medium text-gray-900">{{ $job->category }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Applications:</span>
                                    <span class="font-medium text-blue-600">{{ $job->applications_count ?? 0 }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Share Section -->
                        <div class="pt-4 border-t border-gray-200">
                            <h3 class="font-semibold text-gray-900 mb-3">Share this job</h3>
                            <div class="flex flex-col gap-3">
                                <button onclick="copyToClipboard('{{ route('jobs-details', $job->id) }}')"
                                        class="flex items-center justify-center gap-2 bg-gray-800 text-white py-2 px-4 rounded hover:bg-gray-900 transition-colors text-sm font-medium">
                                    <i class="fas fa-copy"></i>
                                    Copy Job Link
                                </button>
                                <div class="flex justify-center gap-2">
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('jobs-details', $job->id) }}"
                                       target="_blank"
                                       class="p-2 text-gray-600 hover:text-blue-600 transition-colors">
                                        <i class="fab fa-linkedin text-lg"></i>
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('jobs-details', $job->id) }}"
                                       target="_blank"
                                       class="p-2 text-gray-600 hover:text-blue-500 transition-colors">
                                        <i class="fab fa-facebook text-lg"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ route('jobs-details', $job->id) }}&text={{ $job->title }}"
                                       target="_blank"
                                       class="p-2 text-gray-600 hover:text-blue-400 transition-colors">
                                        <i class="fab fa-twitter text-lg"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ $job->title }} - {{ route('jobs-details', $job->id) }}"
                                       target="_blank"
                                       class="p-2 text-gray-600 hover:text-green-500 transition-colors">
                                        <i class="fab fa-whatsapp text-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Back to Jobs Button -->
                        <div class="mt-6">
                            <a href="{{ route('jobs') }}"
                               wire:navigate
                               class="block w-full text-center bg-gray-100 text-gray-700 py-3 rounded-lg hover:bg-gray-200 transition-colors font-medium">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Back to Job Listings
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function copyToClipboard(text) {
                navigator.clipboard.writeText(text).then(function() {
                    alert('Job link copied to clipboard!');
                }, function(err) {
                    console.error('Could not copy text: ', err);
                });
            }
        </script>
    @endpush
</div>
