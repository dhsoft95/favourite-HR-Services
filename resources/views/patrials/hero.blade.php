<section class="relative w-full h-[700px] overflow-hidden hero-bg" style="top: 1px;">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
         style="background-image: url('/images/Hero/hero.jpg');">
        <!-- Dark Overlay for better text readability -->
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    </div>

    <!-- Decorative Orange Gradient -->
    <div class="absolute top-0 right-0 w-1/3 h-full">
        <div class="w-full h-full bg-gradient-to-l from-orange-400 via-orange-300 to-transparent opacity-20"></div>
    </div>

    <!-- Content Container -->
    <div class="relative z-10 flex flex-col justify-between h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Content -->
        <div class="flex items-center flex-1">
            <div class="w-full lg:w-1/2 text-center lg:text-left">
                <!-- Main Heading -->
                <h1 class="hero-title text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-white leading-tight mb-4 lg:mb-6">
                    <span class="hero-text">Elevate Your Team</span>
                    <br>
                    <span class="hero-text">Expert Staffing For</span>
                    <br>
                    <span class="hero-text">Solutions Success</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-base sm:text-lg lg:text-xl text-gray-200 mb-6 lg:mb-8 max-w-md lg:max-w-lg mx-auto lg:mx-0 leading-relaxed">
                    With a relentless dedication to excellence specialize connecting
                    top-tier talent with leading companies, creating synergies drive.
                </p>

                <!-- CTA Button -->
                <div class="flex justify-center lg:justify-start">
                    <a href="/about"
                       class="inline-flex items-center px-6 lg:px-8 py-3 lg:py-4 border-2 border-white text-white font-medium text-base lg:text-lg hover:bg-white hover:text-gray-900 transition duration-300 ease-in-out group">
                        Learn more
                        <svg class="ml-2 lg:ml-3 w-4 lg:w-5 h-4 lg:h-5 transform group-hover:translate-x-1 transition-transform duration-200"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right side space for background image -->
            <div class="hidden lg:block lg:w-1/2">
                <!-- This space is reserved for the woman image in the background -->
            </div>
        </div>

        <!-- Job Search Form -->
        <div class="pb-8">
            <div class="bg-white bg-opacity-95 backdrop-blur-sm rounded-lg shadow-lg p-6 max-w-5xl mx-auto">
                <form class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    <!-- Job Title Search -->
                    <div class="space-y-2">
                        <label for="job-title" class="block text-sm font-medium text-gray-700 uppercase tracking-wide">
                            Job Title
                        </label>
                        <div class="relative">
                            <input type="text"
                                   id="job-title"
                                   name="job_title"
                                   placeholder="Search here"
                                   class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200 placeholder-gray-400">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="space-y-2">
                        <label for="location" class="block text-sm font-medium text-gray-700 uppercase tracking-wide">
                            Location
                        </label>
                        <div class="relative">
                            <select id="location"
                                    name="location"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200 appearance-none bg-white">
                                <option value="">Dodoma</option>
                                <option value="dar-es-salaam">Dar es Salaam</option>
                                <option value="arusha">Arusha</option>
                                <option value="mwanza">Mwanza</option>
                                <option value="mbeya">Mbeya</option>
                                <option value="morogoro">Morogoro</option>
                                <option value="tanga">Tanga</option>
                                <option value="remote">Remote</option>
                            </select>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400 pointer-events-none"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="space-y-2">
                        <label for="categories" class="block text-sm font-medium text-gray-700 uppercase tracking-wide">
                            Categories
                        </label>
                        <div class="relative">
                            <select id="categories"
                                    name="categories"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200 appearance-none bg-white">
                                <option value="">Banker</option>
                                <option value="technology">Technology</option>
                                <option value="finance">Finance & Banking</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="marketing">Marketing</option>
                                <option value="sales">Sales</option>
                                <option value="hr">Human Resources</option>
                                <option value="operations">Operations</option>
                                <option value="consulting">Consulting</option>
                                <option value="education">Education</option>
                                <option value="legal">Legal</option>
                            </select>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400 pointer-events-none"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Search Button -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-transparent uppercase tracking-wide">
                            Action
                        </label>
                        <button type="submit"
                                class="w-full bg-indigo-900 hover:bg-indigo-800 text-white font-semibold py-3 px-6 rounded-md transition duration-200 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 uppercase tracking-wide">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    /* Extra Bold Hero Title */
    .hero-title {
        font-weight: 900 !important;
        font-family: 'Figtree', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-text {
        font-weight: 900 !important;
        color: white !important;
        display: inline-block;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    /* Responsive background images for better performance */
    .hero-bg {
        background-image: url('/images/Hero/hero.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    /* Custom select dropdown styling */
    select {
        background-image: none;
    }

    /* Mobile optimized image */
    @media (max-width: 768px) {
        .hero-bg {
            background-image: url('/images/Hero/hero-mobile.jpg');
        }

        section {
            height: auto !important;
            min-height: 600px !important;
        }

        /* Stack form vertically on mobile */
        .grid-cols-1.md\:grid-cols-4 {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        section {
            min-height: 500px !important;
        }
    }

    /* WebP support for modern browsers */
    @supports (background-image: url('image.webp')) {
        .hero-bg {
            background-image: url('/images/Hero/hero.webp');
        }

        @media (max-width: 768px) {
            .hero-bg {
                background-image: url('/images/Hero/hero-mobile.webp');
            }
        }
    }

    /* Preload critical images */
    .hero-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('/images/Hero/hero.jpg');
        background-size: cover;
        background-position: center;
        opacity: 0;
        z-index: -1;
    }

    /* Focus states for accessibility */
    input:focus, select:focus, button:focus {
        outline: none;
    }

    /* Custom scrollbar for select dropdowns */
    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }
</style>
