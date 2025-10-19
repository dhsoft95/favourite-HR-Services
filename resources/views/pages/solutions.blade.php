@extends('layouts.main')

@section('navigation')
    @include('patrials.heander')

@endsection

@section('content')
    <section class="relative h-[400px] lg:h-[450px] overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('/images/solutions/solutions-bg.png');">
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
                            Our<br>
                            Solutions
                        </h1>
                        <p class="text-lg lg:text-xl text-white/95 leading-relaxed max-w-lg drop-shadow-md">
                            Empower your project with our comprehensive wireframe kits designed to meet the needs of any platform
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 lg:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 lg:mb-16">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-indigo-900 mb-4">
                    Our Strategic HR Solutions
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Transforming human potential into sustainable business growth.
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mb-12">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="h-48 bg-gray-200">
                        <img src="/images/services/corporate-training-1.jpg"
                             alt="Corporate Training"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Corporate Training
                        </h3>
                        <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                            Explore cost-effective marketing strategies to promote your product business.
                        </p>
                        <button class="inline-flex items-center px-4 py-2 bg-indigo-900 text-white text-sm font-medium rounded-lg hover:bg-indigo-800 transition-colors duration-200">
                            Learn more
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="h-48 bg-gray-200">
                        <img src="/images/services/corporate-training-1.jpg"
                             alt="Corporate Training"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Corporate Training
                        </h3>
                        <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                            Explore cost-effective marketing strategies to promote your product business.
                        </p>
                        <button class="inline-flex items-center px-4 py-2 bg-indigo-900 text-white text-sm font-medium rounded-lg hover:bg-indigo-800 transition-colors duration-200">
                            Learn more
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="h-48 bg-gray-200">
                        <img src="/images/services/corporate-training-1.jpg"
                             alt="Corporate Training"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Corporate Training
                        </h3>
                        <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                            Explore cost-effective marketing strategies to promote your product business.
                        </p>
                        <button class="inline-flex items-center px-4 py-2 bg-indigo-900 text-white text-sm font-medium rounded-lg hover:bg-indigo-800 transition-colors duration-200">
                            Learn more
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="h-48 bg-gray-200">
                        <img src="/images/services/corporate-training-1.jpg"
                             alt="Corporate Training"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Corporate Training
                        </h3>
                        <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                            Explore cost-effective marketing strategies to promote your product business.
                        </p>
                        <button class="inline-flex items-center px-4 py-2 bg-indigo-900 text-white text-sm font-medium rounded-lg hover:bg-indigo-800 transition-colors duration-200">
                            Learn more
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="h-48 bg-gray-200">
                        <img src="/images/services/corporate-training-1.jpg"
                             alt="Corporate Training"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Corporate Training
                        </h3>
                        <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                            Explore cost-effective marketing strategies to promote your product business.
                        </p>
                        <button class="inline-flex items-center px-4 py-2 bg-indigo-900 text-white text-sm font-medium rounded-lg hover:bg-indigo-800 transition-colors duration-200">
                            Learn more
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="h-48 bg-gray-200">
                        <img src="/images/services/corporate-training-1.jpg"
                             alt="Corporate Training"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Corporate Training
                        </h3>
                        <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                            Explore cost-effective marketing strategies to promote your product business.
                        </p>
                        <button class="inline-flex items-center px-4 py-2 bg-indigo-900 text-white text-sm font-medium rounded-lg hover:bg-indigo-800 transition-colors duration-200">
                            Learn more
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- View All Services Button -->
            <div class="text-center">
                <button class="inline-flex items-center px-8 py-3 border-2 border-indigo-900 text-indigo-900 font-semibold text-base rounded-lg hover:bg-indigo-900 hover:text-white transition-all duration-300">
                    View All Services
                    <svg class="ml-3 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>

@endsection

@section('footer')
    @include('patrials.footer')
@endsection
