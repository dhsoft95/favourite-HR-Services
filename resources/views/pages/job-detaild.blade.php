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
                                    <i class="fab fa-shopify text-white text-xl"></i>
                                </div>

                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Senior UX Designer</h1>
                                    <div class="flex flex-wrap items-center gap-3">
                                        <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full uppercase font-bold">FULL-TIME</span>
                                        <span class="text-red-500 text-xs uppercase font-medium">Featured</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center gap-3">
                                <button class="p-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                    <i class="far fa-bookmark text-gray-600"></i>
                                </button>
                                <button class="bg-[#2A2D5A] text-white px-6 py-3 rounded-lg hover:bg-[#1f2347] transition-colors font-semibold flex items-center">
                                    Apply Now
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Job Description -->
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Job Description</h2>
                            <div class="text-gray-600 leading-relaxed space-y-4">
                                <p>Velstar is a Shopify Plus agency, and we partner with brands to help them grow, we also do the same with our people!</p>

                                <p>Here at Velstar, we don't just make websites, we create exceptional digital experiences that consumers love. Our team of designers, developers, strategists, and creators work together to push brands to the next level. From Platform Migration, User Experience & User Interface Design, to Digital Marketing, we have a proven track record in delivering outstanding eCommerce solutions and driving sales for our clients.</p>

                                <p>The role will involve translating project specifications into clean, test-driven, easily maintainable code. You will work with the Project and Development teams as well as with the Technical Director, adhering closely to project plans and delivering work that meets functional & non-functional requirements. You will have the opportunity to create new, innovative, secure and scalable features for our clients on the Shopify platform.</p>

                                <p>Want to work with us? You're in good company!</p>
                            </div>
                        </div>

                        <!-- Requirements -->
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Requirements</h2>
                            <ul class="text-gray-600 leading-relaxed space-y-3">
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Great troubleshooting and analytical skills combined with the desire to tackle challenges head-on</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>3+ years of experience in back-end development working either with multiple smaller projects simultaneously or large-scale applications</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Experience with HTML, JavaScript, CSS, PHP, Symphony and/or Laravel</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Working regularly with APIs and Web Services (REST, GraphQL, SOAP, etc)</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Have experience/awareness in Agile application development, commercial off-the-shelf software, middleware, servers and storage, and database management.</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Familiarity with version control and project management systems (e.g., Github, Jira)</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Great troubleshooting and analytical skills combined with the desire to tackle challenges head-on</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Ambitious and hungry to grow your career in a fast-growing agency</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Desirable -->
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Desirable:</h2>
                            <ul class="text-gray-600 leading-relaxed space-y-3">
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Working knowledge of eCommerce platforms, ideally Shopify but also others e.g. Magento, WooCommerce, Visualsoft to enable seamless migrations.</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Working knowledge of payment gateways</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>API platform experience / Building restful APIs</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Benefits -->
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Benefits</h2>
                            <ul class="text-gray-600 leading-relaxed space-y-3">
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Early finish on Fridays for our end of week catch up (4:30 finish, and drink of your choice from the bar)</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>28 days holiday (including bank holidays) rising by 1 day per year PLUS an additional day off on your birthday</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Generous annual bonus.</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Healthcare package</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Paid community days to volunteer for a charity of your choice</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>£100 contribution for your own personal learning and development</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Free Breakfast on Mondays and free snacks in the office</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Access to Perkbox with numerous discounts plus free points from the company to spend as you wish.</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Cycle 2 Work Scheme</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Brand new MacBook Pro</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-gray-500 mr-2 mt-1">•</span>
                                    <span>Joining an agency on the cusp of exponential growth and being part of this exciting story.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <!-- Sidebar - Minimal Version -->
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
                                    <span class="font-semibold text-red-600">14th Aug 2025</span>
                                </div>
                            </div>

                            <!-- Location Card -->
                            <div class="bg-blue-50 border border-blue-100 rounded-lg p-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>
                                    <span class="text-sm font-medium text-gray-700 mr-2">Location:</span>
                                    <span class="font-semibold text-blue-700">Dhaka, Bangladesh</span>
                                </div>
                            </div>
                        </div>

                        <!-- Job Details -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-900 mb-3">Job Details</h3>
                            <div class="grid grid-cols-2 gap-3 text-sm">
                                <div>
                                    <p class="text-gray-500 mb-1">Posted</p>
                                    <p class="font-medium">14 Jun, 2021</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 mb-1">Experience</p>
                                    <p class="font-medium">1-3 Years</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 mb-1">Level</p>
                                    <p class="font-medium">Entry Level</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 mb-1">Education</p>
                                    <p class="font-medium">Certificate</p>
                                </div>
                            </div>
                        </div>

                        <!-- Share Section -->
                        <div class="pt-4 border-t border-gray-200">
                            <h3 class="font-semibold text-gray-900 mb-3">Share this job</h3>
                            <div class="flex flex-col gap-3">
                                <button class="flex items-center justify-center gap-2 bg-gray-800 text-white py-2 px-4 rounded hover:bg-gray-900 transition-colors text-sm font-medium">
                                    <i class="fas fa-copy"></i>
                                    Copy Job Link
                                </button>
                                <div class="flex justify-center gap-2">
                                    <button class="p-2 text-gray-600 hover:text-blue-600 transition-colors">
                                        <i class="fab fa-linkedin text-lg"></i>
                                    </button>
                                    <button class="p-2 text-gray-600 hover:text-blue-500 transition-colors">
                                        <i class="fab fa-facebook text-lg"></i>
                                    </button>
                                    <button class="p-2 text-gray-600 hover:text-blue-400 transition-colors">
                                        <i class="fab fa-twitter text-lg"></i>
                                    </button>
                                </div>
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
