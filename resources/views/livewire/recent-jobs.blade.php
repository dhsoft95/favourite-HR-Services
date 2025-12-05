<!-- Recent Jobs Slider Component -->
<div>
    <section class="py-16 lg:py-20" style="background: #F3F5F2;">
        <div class="container-fluid px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 lg:mb-16">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6" style="color: #151457; font-family: Inter,sans-serif" >
                    Explore Recent Job Openings
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Discover the latest career opportunities from top companies
                </p>
            </div>

            @if($jobs->count() > 0)
                <!-- Job Cards Carousel -->
                <div class="relative">
                    <!-- Previous Button -->
                    <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-10 w-12 h-12 bg-white border-2 border-gray-300 rounded-full flex items-center justify-center transition-all duration-200 shadow-sm" style="hover:border-color: #151457; hover:color: #151457;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>

                    <!-- Cards Container -->
                    <div class="overflow-hidden">
                        <div id="jobsSlider" class="flex transition-transform duration-300 ease-in-out">
                            @foreach($jobs as $job)
                                <!-- Job Card -->
                                <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 flex-shrink-0 px-3">
                                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
                                        <!-- Job Image -->
                                        <div class="h-48 bg-gray-200 overflow-hidden">
                                            @if($job->image)
                                                <img src="{{ asset('storage/' . $job->image) }}"
                                                     alt="{{ $job->title }}"
                                                     class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100">
                                                    <i class="fas fa-briefcase text-4xl text-gray-400"></i>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Card Content -->
                                        <div class="p-6">
                                            <!-- Job Title & Type -->
                                            <div class="mb-3">
                                                <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-1">
                                                    {{ $job->title }}
                                                </h3>
                                                <span class="inline-block px-2 py-1 text-xs font-medium rounded {{ $job->job_type === 'Full Time' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                                    {{ $job->job_type }}
                                                </span>
                                            </div>

                                            <!-- Job Description -->
                                            <p class="text-gray-600 mb-4 text-sm leading-relaxed line-clamp-2">
                                                {{ Str::limit(strip_tags($job->description), 100) }}
                                            </p>

                                            <!-- Location and Date -->
                                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                                <div class="flex items-center">
                                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                                    <span>{{ Str::limit($job->location, 20) }}</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <i class="far fa-clock mr-1"></i>
                                                    <span>{{ $job->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>

                                            <!-- Action Button -->
                                            <a href="{{ route('jobs-details', $job->id) }}" class="inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-lg transition-colors duration-200" style="background-color: #151457; hover:background-color: #0f1142;">
                                                View Details
                                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Next Button -->
                    <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 z-10 w-12 h-12 bg-white border-2 border-gray-300 rounded-full flex items-center justify-center transition-all duration-200 shadow-sm" style="hover:border-color: #151457; hover:color: #151457;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

                <!-- Dots Indicator -->
                @if($jobs->count() > 4)
                    <div class="flex justify-center mt-8 space-x-2" id="dotsContainer">
                        <!-- Dots will be generated by JavaScript based on job count -->
                    </div>
                @endif

                <!-- View All Jobs Button -->
                <div class="text-center mt-8">
                    <a href="{{ route('jobs') }}"
                       class="inline-flex items-center px-8 py-3 text-white font-semibold rounded-lg transition-colors duration-300" style="background-color: #151457; hover:background-color: #0f1142;">
                        View All Jobs
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            @else
                <!-- No Jobs Found -->
                <div class="text-center py-12">
                    <i class="fas fa-briefcase text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No recent jobs available</h3>
                    <p class="text-gray-500">Check back soon for new opportunities</p>
                </div>
            @endif
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('jobsSlider');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const dotsContainer = document.getElementById('dotsContainer');

        if (!slider) return;

        let currentSlide = 0;
        let itemsPerView = 4; // Default for xl screens
        const totalCards = {{ $jobs->count() }};

        // Create dots based on job count
        function createDots() {
            if (!dotsContainer || totalCards <= itemsPerView) return;

            const maxSlides = Math.max(0, totalCards - itemsPerView);
            dotsContainer.innerHTML = '';

            for (let i = 0; i <= maxSlides; i++) {
                const dot = document.createElement('button');
                dot.className = `w-3 h-3 rounded-full dot-indicator transition-colors duration-200 ${i === 0 ? 'bg-indigo-900' : 'bg-gray-300'}`;
                dot.setAttribute('data-slide', i);
                dot.addEventListener('click', () => {
                    currentSlide = i;
                    updateSlider();
                });
                dotsContainer.appendChild(dot);
            }
        }

        // Update items per view based on screen size
        function updateItemsPerView() {
            if (window.innerWidth < 768) {
                itemsPerView = 1;
            } else if (window.innerWidth < 1024) {
                itemsPerView = 2;
            } else if (window.innerWidth < 1280) {
                itemsPerView = 3;
            } else {
                itemsPerView = 4;
            }
        }

        // Update slider position
        function updateSlider() {
            const slideWidth = 100 / itemsPerView;
            const translateX = -currentSlide * slideWidth;
            slider.style.transform = `translateX(${translateX}%)`;

            // Update dots
            const dots = document.querySelectorAll('.dot-indicator');
            dots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.style.backgroundColor = '#151457';
                } else {
                    dot.style.backgroundColor = '#d1d5db';
                }
            });
        }

        // Next slide
        function nextSlide() {
            const maxSlides = Math.max(0, totalCards - itemsPerView);
            if (currentSlide < maxSlides) {
                currentSlide++;
            } else {
                currentSlide = 0;
            }
            updateSlider();
        }

        // Previous slide
        function prevSlide() {
            const maxSlides = Math.max(0, totalCards - itemsPerView);
            if (currentSlide > 0) {
                currentSlide--;
            } else {
                currentSlide = maxSlides;
            }
            updateSlider();
        }

        // Event listeners
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);

        // Auto-play
        setInterval(nextSlide, 5000);

        // Handle resize
        window.addEventListener('resize', () => {
            updateItemsPerView();
            currentSlide = 0;
            createDots();
            updateSlider();
        });

        // Initialize
        updateItemsPerView();
        createDots();
        updateSlider();
    });
</script>
