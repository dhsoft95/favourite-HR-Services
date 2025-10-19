@extends('layouts.main')

@section('navigation')
    @include('patrials.heander')
@endsection

@section('content')
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
                               width: 1476px;
                               max-width: 100%;">
                            Find the job that<br>
                            suits your skills
                        </h1>
                        <p class="text-lg lg:text-xl text-white/95 leading-relaxed max-w-lg drop-shadow-md">
                            Empower your project with our comprehensive wireframe kits designed to meet the needs of any platform
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Search Section -->
            <div class="mb-8">
                <div class="flex gap-4 mb-8">
                    <!-- Job Search Input -->
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text"
                               placeholder="Search by: Job title, Position, Keyword..."
                               class="w-full pl-12 pr-4 py-4 border-2 border-blue-500 rounded-lg focus:outline-none focus:border-blue-600 text-gray-900 placeholder-gray-400 text-sm">
                    </div>

                    <!-- Location Input -->
                    <div class="w-80 relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                        </div>
                        <input type="text"
                               placeholder="City, state or zip code"
                               class="w-full pl-12 pr-12 py-4 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-gray-900 placeholder-gray-400 text-sm">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <i class="fas fa-crosshairs text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Find Job Button -->
                    <button class="px-8 py-4 bg-[#2A2D5A] text-white font-semibold rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm">
                        Find Job
                    </button>
                </div>
            </div>

            <div class="flex gap-8">

                <!-- Sidebar Filters - Fixed -->
                <div class="w-72 flex-shrink-0">
                    <div class="sticky top-6 space-y-6">
                        <!-- Job Type Filter -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-gray-900 mb-4 text-base">Job Type</h3>
                            <div class="space-y-3">
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Full Time Jobs</span>
                                    </div>
                                    <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">189</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Part Time Jobs</span>
                                    </div>
                                    <span class="text-sm text-blue-600 font-medium bg-blue-50 px-2 py-1 rounded">38</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Remote Jobs</span>
                                    </div>
                                    <span class="text-sm text-blue-600 font-medium bg-blue-50 px-2 py-1 rounded">50</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Internship Jobs</span>
                                    </div>
                                    <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">76</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Training Jobs</span>
                                    </div>
                                    <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">15</span>
                                </label>
                            </div>
                        </div>

                        <!-- Job Category Filter -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-gray-900 mb-4 text-base">Job Category</h3>
                            <div class="space-y-3">
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Accounts</span>
                                    </div>
                                    <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">189</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Administrator</span>
                                    </div>
                                    <span class="text-sm text-blue-600 font-medium bg-blue-50 px-2 py-1 rounded">38</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Agriculture</span>
                                    </div>
                                    <span class="text-sm text-blue-600 font-medium bg-blue-50 px-2 py-1 rounded">50</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Banker</span>
                                    </div>
                                    <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">76</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Business Development</span>
                                    </div>
                                    <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">15</span>
                                </label>
                            </div>
                        </div>

                        <!-- Date Posted Filter -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-gray-900 mb-4 text-base">Date Posted</h3>
                            <div class="space-y-3">
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Last 24 hours</span>
                                    </div>
                                    <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">189</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Last 3 days</span>
                                    </div>
                                    <span class="text-sm text-blue-600 font-medium bg-blue-50 px-2 py-1 rounded">38</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Last 7 days</span>
                                    </div>
                                    <span class="text-sm text-blue-600 font-medium bg-blue-50 px-2 py-1 rounded">50</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Last 14 days</span>
                                    </div>
                                    <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">76</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-2 accent-blue-600">
                                        <span class="ml-3 text-gray-700 text-sm">Anytime</span>
                                    </div>
                                    <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">15</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Listings -->
                <div class="flex-1">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                        <!-- Job Card 1 -->
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Receptionist</h3>
                                <p class="text-sm text-gray-500">Full Time</p>
                            </div>

                            <div class="space-y-1 mb-6 text-sm text-gray-600">
                                <p>• 1-3 years of experience in a similar receptionist or front-office role.</p>
                                <p>• Proficiency in Microsoft Office (Word, Excel, Outlook, PowerPoint).</p>
                                <p>• Excellent verbal and written communication skills.</p>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                    <span class="text-gray-600">Dar Es Salaam</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-1 text-gray-400"></i>
                                    <span class="text-gray-600">Posted 1 day ago</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm font-medium flex items-center justify-center">
                                    View Job Details
                                    <i class="fas fa-chevron-right ml-1"></i>
                                </button>
                                <button class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                            </div>
                        </div>


                        <!-- Job Card 2 -->
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Receptionist</h3>
                                <p class="text-sm text-gray-500">Full Time</p>
                            </div>

                            <div class="space-y-1 mb-6 text-sm text-gray-600">
                                <p>• 1-3 years of experience in a similar receptionist or front-office role.</p>
                                <p>• Proficiency in Microsoft Office (Word, Excel, Outlook, PowerPoint).</p>
                                <p>• Excellent verbal and written communication skills.</p>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                    <span class="text-gray-600">Dar Es Salaam</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-1 text-gray-400"></i>
                                    <span class="text-gray-600">Posted 1 day ago</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm font-medium flex items-center justify-center">
                                    View Job Details
                                    <i class="fas fa-chevron-right ml-1"></i>
                                </button>
                                <button class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Job Card 3 -->
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Receptionist</h3>
                                <p class="text-sm text-gray-500">Full Time</p>
                            </div>

                            <div class="space-y-1 mb-6 text-sm text-gray-600">
                                <p>• 1-3 years of experience in a similar receptionist or front-office role.</p>
                                <p>• Proficiency in Microsoft Office (Word, Excel, Outlook, PowerPoint).</p>
                                <p>• Excellent verbal and written communication skills.</p>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                    <span class="text-gray-600">Dar Es Salaam</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-1 text-gray-400"></i>
                                    <span class="text-gray-600">Posted 1 day ago</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm font-medium flex items-center justify-center">
                                    View Job Details
                                    <i class="fas fa-chevron-right ml-1"></i>
                                </button>
                                <button class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                            </div>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Receptionist</h3>
                                <p class="text-sm text-gray-500">Full Time</p>
                            </div>

                            <div class="space-y-1 mb-6 text-sm text-gray-600">
                                <p>• 1-3 years of experience in a similar receptionist or front-office role.</p>
                                <p>• Proficiency in Microsoft Office (Word, Excel, Outlook, PowerPoint).</p>
                                <p>• Excellent verbal and written communication skills.</p>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                    <span class="text-gray-600">Dar Es Salaam</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-1 text-gray-400"></i>
                                    <span class="text-gray-600">Posted 1 day ago</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm font-medium flex items-center justify-center">
                                    View Job Details
                                    <i class="fas fa-chevron-right ml-1"></i>
                                </button>
                                <button class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                            </div>
                        </div>


                        <!-- Job Card 2 -->
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Receptionist</h3>
                                <p class="text-sm text-gray-500">Full Time</p>
                            </div>

                            <div class="space-y-1 mb-6 text-sm text-gray-600">
                                <p>• 1-3 years of experience in a similar receptionist or front-office role.</p>
                                <p>• Proficiency in Microsoft Office (Word, Excel, Outlook, PowerPoint).</p>
                                <p>• Excellent verbal and written communication skills.</p>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                    <span class="text-gray-600">Dar Es Salaam</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-1 text-gray-400"></i>
                                    <span class="text-gray-600">Posted 1 day ago</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm font-medium flex items-center justify-center">
                                    View Job Details
                                    <i class="fas fa-chevron-right ml-1"></i>
                                </button>
                                <button class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Job Card 3 -->
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Receptionist</h3>
                                <p class="text-sm text-gray-500">Full Time</p>
                            </div>

                            <div class="space-y-1 mb-6 text-sm text-gray-600">
                                <p>• 1-3 years of experience in a similar receptionist or front-office role.</p>
                                <p>• Proficiency in Microsoft Office (Word, Excel, Outlook, PowerPoint).</p>
                                <p>• Excellent verbal and written communication skills.</p>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                    <span class="text-gray-600">Dar Es Salaam</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-1 text-gray-400"></i>
                                    <span class="text-gray-600">Posted 1 day ago</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm font-medium flex items-center justify-center">
                                    View Job Details
                                    <i class="fas fa-chevron-right ml-1"></i>
                                </button>
                                <button class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                            </div>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Receptionist</h3>
                                <p class="text-sm text-gray-500">Full Time</p>
                            </div>

                            <div class="space-y-1 mb-6 text-sm text-gray-600">
                                <p>• 1-3 years of experience in a similar receptionist or front-office role.</p>
                                <p>• Proficiency in Microsoft Office (Word, Excel, Outlook, PowerPoint).</p>
                                <p>• Excellent verbal and written communication skills.</p>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                    <span class="text-gray-600">Dar Es Salaam</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-1 text-gray-400"></i>
                                    <span class="text-gray-600">Posted 1 day ago</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm font-medium flex items-center justify-center">
                                    View Job Details
                                    <i class="fas fa-chevron-right ml-1"></i>
                                </button>
                                <button class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                            </div>
                        </div>


                        <!-- Job Card 2 -->
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Receptionist</h3>
                                <p class="text-sm text-gray-500">Full Time</p>
                            </div>

                            <div class="space-y-1 mb-6 text-sm text-gray-600">
                                <p>• 1-3 years of experience in a similar receptionist or front-office role.</p>
                                <p>• Proficiency in Microsoft Office (Word, Excel, Outlook, PowerPoint).</p>
                                <p>• Excellent verbal and written communication skills.</p>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                    <span class="text-gray-600">Dar Es Salaam</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-1 text-gray-400"></i>
                                    <span class="text-gray-600">Posted 1 day ago</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm font-medium flex items-center justify-center">
                                    View Job Details
                                    <i class="fas fa-chevron-right ml-1"></i>
                                </button>
                                <button class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Job Card 3 -->
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Receptionist</h3>
                                <p class="text-sm text-gray-500">Full Time</p>
                            </div>

                            <div class="space-y-1 mb-6 text-sm text-gray-600">
                                <p>• 1-3 years of experience in a similar receptionist or front-office role.</p>
                                <p>• Proficiency in Microsoft Office (Word, Excel, Outlook, PowerPoint).</p>
                                <p>• Excellent verbal and written communication skills.</p>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                    <span class="text-gray-600">Dar Es Salaam</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-1 text-gray-400"></i>
                                    <span class="text-gray-600">Posted 1 day ago</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm font-medium flex items-center justify-center">
                                    View Job Details
                                    <i class="fas fa-chevron-right ml-1"></i>
                                </button>
                                <button class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                            </div>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Receptionist</h3>
                                <p class="text-sm text-gray-500">Full Time</p>
                            </div>

                            <div class="space-y-1 mb-6 text-sm text-gray-600">
                                <p>• 1-3 years of experience in a similar receptionist or front-office role.</p>
                                <p>• Proficiency in Microsoft Office (Word, Excel, Outlook, PowerPoint).</p>
                                <p>• Excellent verbal and written communication skills.</p>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                    <span class="text-gray-600">Dar Es Salaam</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-1 text-gray-400"></i>
                                    <span class="text-gray-600">Posted 1 day ago</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm font-medium flex items-center justify-center">
                                    View Job Details
                                    <i class="fas fa-chevron-right ml-1"></i>
                                </button>
                                <button class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                            </div>
                        </div>


                        <!-- Job Card 2 -->
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Receptionist</h3>
                                <p class="text-sm text-gray-500">Full Time</p>
                            </div>

                            <div class="space-y-1 mb-6 text-sm text-gray-600">
                                <p>• 1-3 years of experience in a similar receptionist or front-office role.</p>
                                <p>• Proficiency in Microsoft Office (Word, Excel, Outlook, PowerPoint).</p>
                                <p>• Excellent verbal and written communication skills.</p>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                    <span class="text-gray-600">Dar Es Salaam</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-1 text-gray-400"></i>
                                    <span class="text-gray-600">Posted 1 day ago</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm font-medium flex items-center justify-center">
                                    View Job Details
                                    <i class="fas fa-chevron-right ml-1"></i>
                                </button>
                                <button class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Job Card 3 -->
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Receptionist</h3>
                                <p class="text-sm text-gray-500">Full Time</p>
                            </div>

                            <div class="space-y-1 mb-6 text-sm text-gray-600">
                                <p>• 1-3 years of experience in a similar receptionist or front-office role.</p>
                                <p>• Proficiency in Microsoft Office (Word, Excel, Outlook, PowerPoint).</p>
                                <p>• Excellent verbal and written communication skills.</p>
                            </div>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                    <span class="text-gray-600">Dar Es Salaam</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-1 text-gray-400"></i>
                                    <span class="text-gray-600">Posted 1 day ago</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button class="flex-1 bg-[#2A2D5A] text-white py-2 px-3 rounded-lg hover:bg-[#1f2347] transition-colors duration-300 text-sm font-medium flex items-center justify-center">
                                    View Job Details
                                    <i class="fas fa-chevron-right ml-1"></i>
                                </button>
                                <button class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                            </div>
                        </div>




                    </div>

                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center">
                        <nav class="flex items-center space-x-1">
                            <button class="px-3 py-2 text-gray-400 hover:text-gray-600 disabled:opacity-50">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-4 py-2 bg-[#2A2D5A] text-white rounded-lg font-medium text-sm">1</button>
                            <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg font-medium text-sm">2</button>
                            <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg font-medium text-sm">3</button>
                            <span class="px-2 py-2 text-gray-400">...</span>
                            <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg font-medium text-sm">7</button>
                            <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg font-medium text-sm">8</button>
                            <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg font-medium text-sm">9</button>
                            <button class="px-3 py-2 text-gray-600 hover:text-gray-800">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </nav>
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
