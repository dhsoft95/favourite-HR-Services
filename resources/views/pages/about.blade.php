@extends('layouts.main')

@section('navigation')
    @include('patrials.heander')

@endsection

@section('content')
    <section class="relative h-[400px] lg:h-[450px] overflow-hidden">
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
                            Empower your project with our comprehensive wireframe kits designed to meet the needs of any platform
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 lg:py-10 bg-white">
        <h2 class="text-[#2A2D5A] mb-6"
            style="font-family: Inter;
                           font-weight: 700;
                           font-size: 48px;
                           line-height: 60px;
                           letter-spacing: -0.02em;
                           text-align: center;">
            Our History
        </h2>
        <div class="flex justify-center">
            <p class="text-gray-600"
               style="font-family: Inter;
                              font-weight: 500;
                              font-size: 17px;
                              line-height: 25px;
                              letter-spacing: 0px;
                              text-align: center;
                              max-width: 900px;">
                NBC Bank, Tanzania’s longest-serving financial services provider, traces its origins to 1967 following the nationalisation of financial institutions. For over 58 years, it has been central to Tanzania’s economic growth and banking evolution. The 1990s financial liberalisation led to NBC’s restructuring in 1997, forming NBC Holding Corporation, National Microfinance Bank (NMB), and NBC (1997) Limited. In 2000, Barclays Africa Group (now Absa Group Limited) acquired a majority stake in NBC (1997) Limited, while the Tanzanian government retained 30% and IFC 15%, giving rise to the National Bank of Commerce (Tanzania) Limited.
                Today, NBC Bank is a leading, full-service financial institution with assets of TZS 4.3 trillion, a network of 47 branches, 204 ATMs, over 20,000 NBC Wakala agents, and advanced digital platforms like NBC Kiganjani and NBC Connect. Serving individuals, SMEs, and corporates, NBC remains dedicated to fostering economic growth and community development, proudly serving as the title sponsor of the NBC Premier League, Tanzania’s premier soccer competition
            </p>
        </div>
    </section>

    <section class="py-10 lg:py-10 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Testimonial Card -->
            <div class="relative bg-black rounded-2xl overflow-hidden"
                 style="width: 1288px; height: 445px; max-width: 100%; margin: 0 auto;">
                <div class="grid grid-cols-1 lg:grid-cols-2 h-full">
                    <!-- Left Side - Image -->
                    <div class="relative h-full">
                        <img src="/images/about/New_Project.jpg"
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
                                           font-size: 35px;
                                           line-height: 40px;
                                           letter-spacing: 0px;">
                                Exceptional materials. The most durable glass ever in a smartphone. A beautiful new gold finish, achieved with an atomic-level.
                            </blockquote>

                            <!-- Attribution -->
                            <div class="text-gray-300">
                                <p class="font-semibold text-white mb-1 text-lg">Theobald Sabi, FCCA,</p>
                                <p class="text-sm opacity-80">Managing Director at NBC Bank</p>
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
            <div class="flex justify-center mb-16">
                <div class="inline-flex bg-gray-100 rounded-full p-1">
                    <button onclick="showTab('mission')"
                            id="mission-tab"
                            class="px-6 py-2 rounded-full font-medium transition-all duration-300 bg-[#2A2D5A] text-white text-sm">
                        Mission
                    </button>
                    <button onclick="showTab('vision')"
                            id="vision-tab"
                            class="px-6 py-2 rounded-full font-medium transition-all duration-300 text-gray-500 hover:text-gray-700 text-sm">
                        Vision
                    </button>
                    <button onclick="showTab('values')"
                            id="values-tab"
                            class="px-6 py-2 rounded-full font-medium transition-all duration-300 text-gray-500 hover:text-gray-700 text-sm">
                        Values
                    </button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="text-center">

                <!-- Mission Tab Content -->
                <div id="mission-content" class="block">
                    <h2 class="text-[#2A2D5A] mb-6"
                        style="font-family: Inter;
                           font-weight: 700;
                           font-size: 48px;
                           line-height: 60px;
                           letter-spacing: -0.02em;
                           text-align: center;">
                        Mission
                    </h2>
                    <div class="flex justify-center">
                        <p class="text-gray-600"
                           style="font-family: Inter;
                              font-weight: 500;
                              font-size: 17px;
                              line-height: 25px;
                              letter-spacing: 0px;
                              text-align: center;
                              max-width: 900px;">
                            Our core duty is to provide our clients with most effective organization-tailored human capital solutions.
                            We are committed to consistently providing superior human capital services presented in a professional,
                            timely, and cost-effective manner. We strive to leave the client with the finest lasting impression
                        </p>
                    </div>
                </div>

                <!-- Vision Tab Content -->
                <div id="vision-content" class="hidden">
                    <h2 class="text-[#2A2D5A] mb-6"
                        style="font-family: Inter;
                           font-weight: 700;
                           font-size: 48px;
                           line-height: 60px;
                           letter-spacing: -0.02em;
                           text-align: center;">
                        Vision
                    </h2>
                    <div class="flex justify-center">
                        <p class="text-gray-600"
                           style="font-family: Inter;
                              font-weight: 500;
                              font-size: 17px;
                              line-height: 25px;
                              letter-spacing: 0px;
                              text-align: center;
                              max-width: 900px;">
                            To be the leading human resources consulting firm in East Africa, recognized for our innovative solutions,
                            exceptional service delivery, and commitment to transforming organizations through strategic human capital management.
                            We envision a future where every organization has access to world-class HR services that drive sustainable growth and success.
                        </p>
                    </div>
                </div>

                <!-- Values Tab Content -->
                <div id="values-content" class="hidden">
                    <h2 class="text-[#2A2D5A] mb-6"
                        style="font-family: Inter;
                           font-weight: 700;
                           font-size: 48px;
                           line-height: 60px;
                           letter-spacing: -0.02em;
                           text-align: center;">
                        Values
                    </h2>
                    <div class="flex justify-center">
                        <p class="text-gray-600"
                           style="font-family: Inter;
                              font-weight: 500;
                              font-size: 17px;
                              line-height: 25px;
                              letter-spacing: 0px;
                              text-align: center;
                              max-width: 900px;">
                            <span class="font-semibold">Integrity:</span> We conduct our business with the highest ethical standards and transparency.<br><br>
                            <span class="font-semibold">Excellence:</span> We strive for excellence in every service we deliver, exceeding client expectations.<br><br>
                            <span class="font-semibold">Innovation:</span> We embrace innovative approaches to solve complex human capital challenges.<br><br>
                            <span class="font-semibold">Partnership:</span> We build lasting relationships based on trust, collaboration, and mutual success.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-16 lg:py-10 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header with decorative elements -->
            <div class="text-center mb-20 relative">
                <!-- Decorative line -->
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-32 h-px bg-gradient-to-r from-transparent via-[#2A2D5A]/30 to-transparent"></div>

                <h2 class="text-[#2A2D5A] mb-6 relative bg-white px-8 inline-block"
                    style="font-family: Inter;
                   font-weight: 700;
                   font-size: 48px;
                   line-height: 60px;
                   letter-spacing: -0.02em;
                   text-align: center;
                   width: 544px;
                   max-width: 100%;
                   margin: 0 auto 1.5rem auto;">
                    Meet The Team
                </h2>
                <p class="text-lg lg:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Transforming human potential into sustainable business growth through expertise, innovation, and dedication.
                </p>
            </div>

            <!-- Team Grid with enhanced cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">

                <!-- Team Member 1 -->
                <div class="group cursor-pointer">
                    <div class="relative bg-gradient-to-br from-gray-300 to-gray-500 rounded-3xl overflow-hidden aspect-[3/4] shadow-xl group-hover:shadow-2xl transition-all duration-700">
                        <!-- Image with zoom effect -->
                        <img src="/images/team/team.jpg"
                             alt="John Doe"
                             class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">

                        <!-- Gradient overlay with smooth fade -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

                        <!-- Text content with staggered animations -->
                        <div class="absolute inset-x-0 bottom-0 p-8 text-white">
                            <!-- Name -->
                            <h3 class="text-2xl font-bold mb-2 transform translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out">
                                John Doe
                            </h3>

                            <!-- Position -->
                            <p class="text-gray-200 mb-1 font-medium transform translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out delay-75">
                                Managing Director
                            </p>

                            <!-- Experience -->
                            <p class="text-sm text-gray-300 mb-4 transform translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out delay-100">
                                15+ years experience in HR consulting
                            </p>

                            <!-- Tags -->
                            <div class="flex flex-wrap gap-2 transform translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out delay-150">
                                <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs rounded-full font-medium hover:bg-white/30 transition-colors">Leadership</span>
                                <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs rounded-full font-medium hover:bg-white/30 transition-colors">Strategy</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="group cursor-pointer">
                    <div class="relative bg-gradient-to-br from-gray-300 to-gray-500 rounded-3xl overflow-hidden aspect-[3/4] shadow-xl group-hover:shadow-2xl transition-all duration-700">
                        <img src="/images/team/team.jpg"
                             alt="Jane Smith"
                             class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

                        <div class="absolute inset-x-0 bottom-0 p-8 text-white">
                            <h3 class="text-2xl font-bold mb-2 transform translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out">
                                Jane Smith
                            </h3>

                            <p class="text-gray-200 mb-1 font-medium transform translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out delay-75">
                                HR Director
                            </p>

                            <p class="text-sm text-gray-300 mb-4 transform translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out delay-100">
                                12+ years in talent management
                            </p>

                            <div class="flex flex-wrap gap-2 transform translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out delay-150">
                                <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs rounded-full font-medium hover:bg-white/30 transition-colors">Recruitment</span>
                                <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs rounded-full font-medium hover:bg-white/30 transition-colors">Training</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="group cursor-pointer">
                    <div class="relative bg-gradient-to-br from-gray-300 to-gray-500 rounded-3xl overflow-hidden aspect-[3/4] shadow-xl group-hover:shadow-2xl transition-all duration-700">
                        <img src="/images/team/team.jpg"
                             alt="Michael Johnson"
                             class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

                        <div class="absolute inset-x-0 bottom-0 p-8 text-white">
                            <h3 class="text-2xl font-bold mb-2 transform translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out">
                                Michael Johnson
                            </h3>

                            <p class="text-gray-200 mb-1 font-medium transform translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out delay-75">
                                Senior Consultant
                            </p>

                            <p class="text-sm text-gray-300 mb-4 transform translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out delay-100">
                                10+ years in organizational development
                            </p>

                            <div class="flex flex-wrap gap-2 transform translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out delay-150">
                                <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs rounded-full font-medium hover:bg-white/30 transition-colors">Development</span>
                                <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs rounded-full font-medium hover:bg-white/30 transition-colors">Analytics</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('patrials.clients')
@endsection

@section('footer')
    @include('patrials.footer')
@endsection
