@extends('layouts.main')

@section('navigation')
    @include('patrials.heander')

@endsection

@section('content')
    <section class="relative h-[500px] lg:h-[500px] overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('/images/about/about.png');">
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
                               width: 1476px;
                               max-width: 100%;">
                            About Favorite<br>
                            HR Services
                        </h1>
                        <p class="text-lg lg:text-xl text-white/95 leading-relaxed max-w-lg drop-shadow-md">
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

            <div class="relative bg-black rounded-2xl overflow-hidden"
                 style="width: 1288px; height: 445px; max-width: 100%; margin: 0 auto;">
                <div class="grid grid-cols-1 lg:grid-cols-2 h-full">
                    <!-- Left Side - Image -->
                    <div class="relative h-full">
                        <img src="/images/about/leader.webp"
                             alt="Theobald Sabi"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Right Side - Content -->
                    <div class="flex items-center p-8 lg:p-12">
                        <div class="text-white">

                            <!-- Quote Icon -->
                            <div class="mb-6">
                                <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                                </svg>
                            </div>

                            <!-- Testimonial Text with exact specifications -->
                            <blockquote class="text-white mb-8"
                                        style="font-family: Inter;
                                           font-weight: 800;
                                           font-size: 20px;
                                           line-height: 30px;
                                           letter-spacing: 0px;">
                                In these tough economic times, organizations cannot afford to pour funds or any resources into
                                (or partner with) ordinary-trial-and-error companies that do not value excellence, professionalism, cost efficiency, time, and most important, the green concept.
                            </blockquote>

                            <!-- Attribution -->
                            <div class="text-gray-300">
                                <p class="font-semibold text-white mb-1 text-lg">Anna Meela,</p>
                                <p class="text-sm opacity-80">HR Director at Favorite HR Service</p>
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
                                <div class="space-y-6">
                                    <div class="flex items-start gap-3">
                                        <div class="w-2 h-2 bg-[#3730a3] rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="leading-relaxed">Act with highest level of honesty and integrity while performing every project</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-2 h-2 bg-[#3730a3] rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="leading-relaxed">Highly worship clients as they are the purpose of whatever we do, and our success depends on our clients' satisfaction entirely</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-2 h-2 bg-[#3730a3] rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="leading-relaxed">Value and embrace talents, leadership, and initiatives of each associate</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-2 h-2 bg-[#3730a3] rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="leading-relaxed">Worth doing things right first and actively learning from others</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-2 h-2 bg-[#3730a3] rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="leading-relaxed">Extremely value and respect communities in which we live and work</p>
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
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image/Video Cover -->
        <div class="absolute inset-0 z-0">
            <!-- Image Background -->
            <img src="images/about/story.jpg"
                 alt="FHS Team Collaboration"
                 class="w-full h-full object-cover object-center"
                 loading="eager">

            <!-- Overlay for better text readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-gray-900/80 to-gray-900/90"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-gray-900/40"></div>
        </div>

        <!-- Content Container -->
        <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Play Button Container -->
            <div class="mb-12 lg:mb-16">
                <button id="playButton"
                        class="group relative w-20 h-20 sm:w-24 sm:h-24 lg:w-28 lg:h-28 bg-white/20 backdrop-blur-sm rounded-full border-2 border-white/30 hover:border-white/50 transition-all duration-500 hover:scale-110 focus:outline-none focus:ring-4 focus:ring-white/30">

                    <!-- Animated Ripple Effect -->
                    <div class="absolute inset-0 rounded-full animate-ping bg-white/20 group-hover:bg-white/30"></div>

                    <!-- Play Icon -->
                    <div class="relative flex items-center justify-center w-full h-full">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 text-white ml-1"
                             fill="currentColor"
                             viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>

                    <!-- Tooltip Text -->
                    <span class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 text-white text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                    Watch Our Story
                </span>
                </button>
            </div>

            <!-- Main Text Content -->
            <div class="space-y-6">
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight"
                    style="font-family: 'Inter', sans-serif;">
                    Discover the Heart of FHS
                </h1>

                <p class="text-xl sm:text-2xl lg:text-3xl text-gray-200 max-w-3xl mx-auto leading-relaxed"
                   style="font-family: 'Inter', sans-serif; font-weight: 300;">
                    Transforming human potential into sustainable business growth.
                </p>
            </div>


        </div>

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

        <!-- Video Modal (Hidden by default) -->
        <div id="videoModal"
             class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4">
            <div class="relative w-full max-w-4xl">
                <!-- Close Button -->
                <button id="closeModal"
                        class="absolute -top-12 right-0 text-white hover:text-amber-400 transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Video Container -->
                <div class="relative aspect-video bg-black rounded-lg overflow-hidden">
                    <iframe id="videoPlayer"
                            class="absolute inset-0 w-full h-full"
                            src=""
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

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
@endsection

@section('footer')
    @include('patrials.footer')
@endsection
