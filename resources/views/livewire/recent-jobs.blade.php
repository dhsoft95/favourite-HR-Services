<section class="py-16 lg:py-20" style="background: #F3F5F2;">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 lg:mb-16">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4" style="color: #151457; font-family: Inter, sans-serif;">
                Explore Recent Job Openings
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Discover the latest career opportunities from top companies
            </p>
        </div>

        @if($jobs->count() > 0)
            <div class="relative px-10">
                <button id="prevBtn" class="job-nav-btn absolute left-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white border border-gray-300 rounded-full flex items-center justify-center shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <div class="overflow-hidden">
                    <div id="jobsTrack" class="flex transition-transform duration-300 ease-in-out">
                        @foreach($jobs as $job)
                            <div class="job-slide flex-shrink-0 px-3">
                                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden h-full flex flex-col">
                                    <div class="h-40 bg-gray-100 overflow-hidden flex-shrink-0">
                                        @if($job->image)
                                            <img src="{{ asset('storage/' . $job->image) }}"
                                                 alt="{{ $job->title }}"
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center" style="background: #e8ecf7;">
                                                <i class="fas fa-briefcase text-3xl" style="color: #151457; opacity: 0.3;"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="p-5 flex flex-col flex-1">
                                        <h3 class="text-base font-semibold text-gray-900 mb-2 truncate">
                                            {{ $job->title }}
                                        </h3>

                                        <span class="inline-block px-2 py-1 text-xs font-medium rounded mb-3 w-fit {{ $job->job_type === 'Full Time' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                            {{ $job->job_type }}
                                        </span>

                                        <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-2 flex-1">
                                            {{ Str::limit(strip_tags($job->description), 100) }}
                                        </p>

                                        <div class="flex items-center justify-between text-xs text-gray-400 mb-4">
                                            <div class="flex items-center gap-1">
                                                <i class="fas fa-map-marker-alt text-red-400"></i>
                                                <span>{{ Str::limit($job->location, 20) }}</span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <i class="far fa-clock"></i>
                                                <span>{{ $job->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>

                                        <a href="{{ route('jobs-details', $job->id) }}" class="job-view-btn inline-flex items-center justify-center gap-2 px-4 py-2 text-white text-sm font-medium rounded-lg w-full">
                                            View Details
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button id="nextBtn" class="job-nav-btn absolute right-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white border border-gray-300 rounded-full flex items-center justify-center shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <div class="flex justify-center mt-8 gap-2" id="dotsContainer"></div>

            <div class="text-center mt-8">
                <a href="{{ route('jobs') }}" class="job-view-btn inline-flex items-center gap-2 px-8 py-3 text-white font-semibold rounded-lg">
                    View All Jobs
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-briefcase text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">No recent jobs available</h3>
                <p class="text-gray-500">Check back soon for new opportunities</p>
            </div>
        @endif
    </div>

    <style>
        .job-nav-btn {
            transition: border-color 0.2s, color 0.2s;
        }
        .job-nav-btn:hover {
            border-color: #151457;
            color: #151457;
        }
        .job-view-btn {
            background-color: #151457;
            transition: background-color 0.2s;
        }
        .job-view-btn:hover {
            background-color: #0f1142;
        }
        .job-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #d1d5db;
            border: none;
            cursor: pointer;
            padding: 0;
            transition: background-color 0.2s;
        }
        .job-dot.active {
            background-color: #151457;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const track = document.getElementById('jobsTrack');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const dotsContainer = document.getElementById('dotsContainer');

            if (!track) return;

            const slides = track.querySelectorAll('.job-slide');
            const total = slides.length;
            let current = 0;
            let perView = 4;
            let autoTimer;

            function getPerView() {
                const w = window.innerWidth;
                if (w < 768) return 1;
                if (w < 1024) return 2;
                if (w < 1280) return 3;
                return 4;
            }

            function setSlideWidths() {
                slides.forEach(slide => {
                    slide.style.width = (100 / perView) + '%';
                });
            }

            function maxSlide() {
                return Math.max(0, total - perView);
            }

            function renderDots() {
                dotsContainer.innerHTML = '';
                const count = maxSlide() + 1;
                if (count <= 1) return;
                for (let i = 0; i < count; i++) {
                    const btn = document.createElement('button');
                    btn.className = 'job-dot' + (i === current ? ' active' : '');
                    btn.addEventListener('click', () => {
                        current = i;
                        update();
                        restartAuto();
                    });
                    dotsContainer.appendChild(btn);
                }
            }

            function update() {
                const pct = (100 / perView) * current;
                track.style.transform = `translateX(-${pct}%)`;
                document.querySelectorAll('.job-dot').forEach((dot, i) => {
                    dot.classList.toggle('active', i === current);
                });
            }

            function go(dir) {
                if (dir === 1) {
                    current = current >= maxSlide() ? 0 : current + 1;
                } else {
                    current = current <= 0 ? maxSlide() : current - 1;
                }
                update();
            }

            function restartAuto() {
                clearInterval(autoTimer);
                autoTimer = setInterval(() => go(1), 5000);
            }

            prevBtn.addEventListener('click', () => { go(-1); restartAuto(); });
            nextBtn.addEventListener('click', () => { go(1); restartAuto(); });

            window.addEventListener('resize', () => {
                perView = getPerView();
                current = 0;
                setSlideWidths();
                renderDots();
                update();
            });

            perView = getPerView();
            setSlideWidths();
            renderDots();
            update();
            restartAuto();
        });
    </script>
</section>
