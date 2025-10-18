<section class="relative w-full h-[799px] overflow-hidden hero-bg" style="top: 1px;">
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
    <div class="relative z-10 flex items-center h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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

    /* Mobile optimized image */
    @media (max-width: 768px) {
        .hero-bg {
            background-image: url('/images/Hero/hero-mobile.jpg');
        }

        section {
            height: 600px !important;
        }
    }

    @media (max-width: 640px) {
        section {
            height: 500px !important;
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
</style>
