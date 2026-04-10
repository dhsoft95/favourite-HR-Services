@extends('layouts.main')

@section('navigation')
    @include('patrials.heander')

@endsection

@section('content')
    <section class="relative h-[300px] sm:h-[400px] lg:h-[500px] overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('/images/about/about.png');">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/30"></div>
        </div>

        <!-- Content -->
        <div class="relative h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
                <div class="flex items-center h-full">
                    <div class="max-w-xl lg:max-w-4xl">
                        <h1 class="text-white font-semibold leading-tight mb-4 lg:mb-6 drop-shadow-lg
                               text-4xl sm:text-5xl lg:text-6xl tracking-tight">
                            About Favorite<br>
                            HR Services
                        </h1>
                        <p class="text-base sm:text-lg lg:text-xl text-white/95 leading-relaxed max-w-lg drop-shadow-md">
                            Your trusted partner in modern, results-driven HR solutions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 lg:py-10 bg-white">
        <h2 class="text-[#3730a3] mb-6"
            style="font-family: Inter;
                           font-weight: 700;
                           font-size: 48px;
                           line-height: 60px;
                           letter-spacing: -0.02em;
                           text-align: center;">
            Who We Are
        </h2>
        <div class="flex justify-center px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <p class="text-gray-700 leading-relaxed mb-6 text-lg"
                   style="font-family: Inter, sans-serif;
                  line-height: 1.75;
                  text-align: justify;
                  text-align-last: center;
                  hyphens: auto;">
                    Favorite HR Services (FHS) was founded to bridge the gap in truly professional human capital solutions. After recognizing a clear lack of excellence and consistency in the HR industry, we set out with a purposeful mission: to serve organizations that value human capital as the driving force behind real transformation. Whether profit or non-profit, we support businesses in moving from ordinary operations to world-class performance and industry-leading standards.
                </p>

                <p class="text-gray-700 leading-relaxed text-lg"
                   style="font-family: Inter, sans-serif;
                  line-height: 1.75;
                  text-align: justify;
                  text-align-last: center;
                  hyphens: auto;">
                    At FHS, we believe in relationship selling, not transactional interactions. Our focus is on building long-lasting partnerships with both existing and prospective clients by delivering genuine, value-adding HR solutions tailored to their needs. Our team is equipped with up-to-date expertise in the field of human capital and is committed to providing state-of-the-art solutions that support organizational growth, professionalism, and excellence.
                </p>
            </div>
        </div>
    </section>

    <section class="py-10 lg:py-10 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-2xl overflow-hidden min-h-[300px] sm:min-h-[380px] lg:h-[445px]">
                <!-- Background Image -->
                <div class="absolute inset-0 bg-cover bg-center"
                     style="background-image: url('/images/about/about-two.png');"></div>

                <!-- Dark overlay -->
                <div class="absolute inset-0 bg-black/60"></div>

                <div class="grid grid-cols-1 lg:grid-cols-2 h-full relative z-10">
                    <!-- Left Side - Hidden on mobile -->
                    <div class="hidden lg:block relative h-full"></div>

                    <!-- Right Side -->
                    <div class="flex items-center p-6 sm:p-8 lg:p-12">
                        <div class="text-white">
                            <blockquote class="text-white mb-6 font-extrabold text-base sm:text-lg lg:text-xl leading-relaxed">
                                " In these tough economic times, organizations cannot afford to pour funds or any resources into (or partner with) ordinary trial-and-error companies that do not value excellence, professionalism, cost efficiency, time, and most important, the green concept."
                            </blockquote>
                            <div class="text-gray-300">
                                <p class="text-sm opacity-80">CEO</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 lg:py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Tab Navigation -->
            <div class="flex justify-center mb-12 lg:mb-16">
                <div class="inline-flex flex-wrap sm:flex-nowrap bg-gray-100 rounded-full p-1 justify-center gap-1 sm:gap-0">
                    <button onclick="showTab('mission')"
                            id="mission-tab"
                            class="px-4 sm:px-6 py-2 rounded-full font-medium transition-all duration-300 bg-[#3730a3] text-white text-sm whitespace-nowrap">
                        Mission
                    </button>
                    <button onclick="showTab('vision')"
                            id="vision-tab"
                            class="px-4 sm:px-6 py-2 rounded-full font-medium transition-all duration-300 text-gray-500 hover:text-gray-700 text-sm whitespace-nowrap">
                        Vision
                    </button>
                    <button onclick="showTab('values')"
                            id="values-tab"
                            class="px-4 sm:px-6 py-2 rounded-full font-medium transition-all duration-300 text-gray-500 hover:text-gray-700 text-sm whitespace-nowrap">
                        Core Values
                    </button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="text-center">

                <!-- Mission Tab Content -->
                <div id="mission-content" class="block">
                    <h2 class="text-[#3730a3] mb-4 lg:mb-6 text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight"
                        style="font-family: Inter; letter-spacing: -0.02em;">
                        Mission
                    </h2>
                    <div class="flex justify-center">
                        <p class="text-gray-600 text-base sm:text-lg leading-relaxed max-w-3xl lg:max-w-4xl px-4"
                           style="font-family: Inter;">
                            Our core duty is to provide our clients with most effective organization-tailored human capital solutions.
                            We are committed to consistently providing superior human capital services presented in a professional,
                            timely, and cost-effective manner. We strive to leave the client with the finest lasting impression.
                        </p>
                    </div>
                </div>

                <!-- Vision Tab Content -->
                <div id="vision-content" class="hidden">
                    <h2 class="text-[#3730a3] mb-4 lg:mb-6 text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight"
                        style="font-family: Inter; letter-spacing: -0.02em;">
                        Vision
                    </h2>
                    <div class="flex justify-center">
                        <p class="text-gray-600 text-base sm:text-lg leading-relaxed max-w-3xl lg:max-w-4xl px-4"
                           style="font-family: Inter;">
                            FHS' vision is to become the most esteemed brand and number one choice when it comes to serving human capital needs.
                            To achieve this vision, we are determined to deploying effective strategies, creating/maintaining competent team,
                            and constantly upgrading our ways of doing business; while we focus on lowering our (along with clients') expenses,
                            increasing efficiency, and continuously improving quality.
                        </p>
                    </div>
                </div>

                <!-- Core Values Tab Content -->
                <div id="values-content" class="hidden">
                    <h2 class="text-[#3730a3] mb-4 lg:mb-6 text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight"
                        style="font-family: Inter; letter-spacing: -0.02em;">
                        Core Values
                    </h2>
                    <div class="flex justify-center">
                        <div class="text-gray-600 text-base sm:text-lg leading-relaxed max-w-4xl lg:max-w-5xl px-4"
                             style="font-family: Inter;">
                            <p class="mb-8 text-center">FHS is governed by its core values when performing daily activities. These values guide each decision and behaviour, shape culture, and define the character of the company.</p>
                            <div class="text-left max-w-4xl mx-auto">
                                <p class="mb-4 font-semibold">At FHS, we:</p>
                                <div class="space-y-6">
                                    <div class="flex items-start gap-3">
                                        <span class="flex-shrink-0">•</span>
                                        <p class="leading-relaxed">Act with highest level of honesty and integrity while performing every project</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <span class="flex-shrink-0">•</span>
                                        <p class="leading-relaxed">Highly worship clients as they are the purpose of whatever we do, and our success depends on our clients' satisfaction entirely</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <span class="flex-shrink-0">•</span>
                                        <p class="leading-relaxed">Value and embrace talents, leadership, and initiatives of each associate</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <span class="flex-shrink-0">•</span>
                                        <p class="leading-relaxed">Worth doing things right first and actively learning from others, and</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <span class="flex-shrink-0">•</span>
                                        <p class="leading-relaxed">Extremely value and respect communities in which we live and work.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Hero Section with Cover Image & Play Button -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden" style="margin-bottom:0px;">

        <!-- Slider Background -->
        <div class="absolute inset-0 z-0">
            <div id="heroSlider" class="relative w-full h-full">

                <div class="slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100">
                    <img src="images/slider/slider01.webp" alt="Slide 1" class="w-full h-full object-cover object-center">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-gray-900/40 to-gray-900/50"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-gray-900/20"></div>
                </div>

{{--                <div class="slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0">--}}
{{--                    <img src="images/slider/slider03.webp" alt="Slide 2" class="w-full h-full object-cover object-center">--}}
{{--                    <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-gray-900/40 to-gray-900/50"></div>--}}
{{--                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-gray-900/20"></div>--}}
{{--                </div>--}}

                <div class="slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0">
                    <img src="images/slider/slider02.webp" alt="Slide 3" class="w-full h-full object-cover object-center">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-gray-900/40 to-gray-900/50"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-gray-900/20"></div>
                </div>
                <div class="slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0">
                    <img src="images/slider/slider04.webp" alt="Slide 3" class="w-full h-full object-cover object-center">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-gray-900/40 to-gray-900/50"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-gray-900/20"></div>
                </div>
                <div class="slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0">
                    <img src="images/slider/slider05.webp" alt="Slide 3" class="w-full h-full object-cover object-center">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-gray-900/40 to-gray-900/50"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-gray-900/20"></div>
                </div>
            </div>
        </div>

        <!-- Prev / Next Arrows -->
        <button id="prevSlide"
                class="absolute left-4 top-1/2 -translate-y-1/2 z-10 w-12 h-12 flex items-center justify-center rounded-full bg-white/20 backdrop-blur-sm border border-white/30 text-white hover:bg-white/40 transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <button id="nextSlide"
                class="absolute right-4 top-1/2 -translate-y-1/2 z-10 w-12 h-12 flex items-center justify-center rounded-full bg-white/20 backdrop-blur-sm border border-white/30 text-white hover:bg-white/40 transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10">
            <a href="#content"
               class="animate-bounce flex flex-col items-center text-white/70 hover:text-white transition-colors duration-300">
                <span class="text-sm mb-2">Scroll</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </a>
        </div>
    </section>

    <script>
        const slides = document.querySelectorAll('.slide');
        let current  = 0;
        let timer    = null;

        function goTo(index) {
            slides[current].classList.remove('opacity-100');
            slides[current].classList.add('opacity-0');

            current = (index + slides.length) % slides.length;

            slides[current].classList.remove('opacity-0');
            slides[current].classList.add('opacity-100');
        }

        function next() { goTo(current + 1); }
        function prev() { goTo(current - 1); }

        function startTimer() {
            timer = setInterval(next, 5000);
        }

        function resetTimer() {
            clearInterval(timer);
            startTimer();
        }

        document.getElementById('nextSlide').addEventListener('click', () => { next(); resetTimer(); });
        document.getElementById('prevSlide').addEventListener('click', () => { prev(); resetTimer(); });

        startTimer();
    </script>
    <script>
        // Video Modal Functionality
        const playButton = document.getElementById('playButton');
        const videoModal = document.getElementById('videoModal');
        const closeModal = document.getElementById('closeModal');
        const videoPlayer = document.getElementById('videoPlayer');

        // YouTube video ID - replace with your actual video ID
        const videoId = 'YOUR_VIDEO_ID_HERE';

        playButton.addEventListener('click', () => {
            // Set the video source
            videoPlayer.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1`;

            // Show the modal
            videoModal.classList.remove('hidden');
            videoModal.classList.add('flex');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        });

        closeModal.addEventListener('click', () => {
            // Hide the modal
            videoModal.classList.remove('flex');
            videoModal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Re-enable scrolling

            // Stop the video
            videoPlayer.src = '';
        });

        // Close modal when clicking outside
        videoModal.addEventListener('click', (e) => {
            if (e.target === videoModal) {
                videoModal.classList.remove('flex');
                videoModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
                videoPlayer.src = '';
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && videoModal.classList.contains('flex')) {
                videoModal.classList.remove('flex');
                videoModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
                videoPlayer.src = '';
            }
        });
    </script>


    @include('patrials.clients')
    @include('patrials.trusted_brands')
@endsection

@section('footer')
    @include('patrials.footer')
@endsection
