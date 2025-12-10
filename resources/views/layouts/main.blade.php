<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        inter: ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'shimmer': 'shimmer 2s infinite linear',
                    },
                    keyframes: {
                        shimmer: {
                            '0%': { 'background-position': '-468px 0' },
                            '100%': { 'background-position': '468px 0' }
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Shimmer Loading Styles -->
    <style>
        /* Global Inter Font */
        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
        }

        /* Shimmer Loading Overlay */
        #shimmer-loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
            padding: 20px;
        }

        .shimmer-container {
            width: 100%;
            max-width: 1200px;
            padding: 40px;
        }

        /* Shimmer Effect */
        .shimmer {
            background: linear-gradient(
                90deg,
                #f0f0f0 0%,
                #e0e0e0 20%,
                #f0f0f0 40%,
                #f0f0f0 100%
            );
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius: 8px;
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }

        /* Shimmer Elements */
        .shimmer-title {
            height: 32px;
            margin-bottom: 12px;
        }

        .shimmer-line {
            height: 16px;
            margin-bottom: 8px;
        }

        .shimmer-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
        }

        .shimmer-button {
            height: 44px;
            border-radius: 8px;
        }

        .shimmer-image {
            height: 200px;
            margin-bottom: 16px;
        }

        .shimmer-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .shimmer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        /* Red Accent Shimmer (for logo/brand elements) */
        .shimmer-accent {
            background: linear-gradient(
                90deg,
                rgba(220, 38, 38, 0.1) 0%,
                rgba(220, 38, 38, 0.2) 20%,
                rgba(220, 38, 38, 0.1) 40%,
                rgba(220, 38, 38, 0.1) 100%
            );
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }

        /* Layout fixes for hero section */
        .main-content-wrapper {
            display: block;
            min-height: 100vh;
        }

        .hero-title {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
            font-weight: 700;
            font-size: 60px;
            line-height: 62px;
            letter-spacing: -0.02em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-slide {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: opacity 1000ms ease-in-out;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .slider-dot.active {
            background-color: white;
        }

        select {
            background-image: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            font-family: 'Inter', sans-serif !important;
        }

        input, textarea, button {
            font-family: 'Inter', sans-serif !important;
        }

        input:focus, select:focus, button:focus {
            outline: none;
        }

        h1, h2, h3, h4, h5, h6, p, span, div, a {
            font-family: 'Inter', sans-serif !important;
        }

        @media (max-width: 768px) {
            .hero-slide {
                background-position: center right;
            }

            .hero-title {
                font-size: 40px;
                line-height: 44px;
            }
        }

        @media (max-width: 640px) {
            .hero-title {
                font-size: 32px;
                line-height: 36px;
            }
        }
    </style>

    <!-- Additional Head Content -->
    @stack('styles')

</head>

<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>
<livewire:apply-job-modal />

<body class="font-inter antialiased bg-gray-50">

<!-- Shimmer Loading Overlay -->
<div id="shimmer-loading">
    <div class="shimmer-container">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div class="shimmer-accent shimmer-title w-48"></div>
            <div class="flex items-center space-x-4">
                <div class="shimmer shimmer-line w-20"></div>
                <div class="shimmer shimmer-line w-20"></div>
                <div class="shimmer shimmer-avatar"></div>
            </div>
        </div>

        <!-- Hero Section -->
        <div class="mb-8">
            <div class="shimmer-accent shimmer-title w-3/4 mb-4" style="height: 48px;"></div>
            <div class="shimmer shimmer-line w-full mb-2"></div>
            <div class="shimmer shimmer-line w-5/6 mb-2"></div>
            <div class="shimmer shimmer-line w-4/6 mb-6"></div>
            <div class="shimmer-accent shimmer-button w-40"></div>
        </div>

        <!-- Content Grid -->
        <div class="shimmer-grid">
            <!-- Card 1 -->
            <div class="shimmer-card p-6">
                <div class="shimmer shimmer-image w-full"></div>
                <div class="shimmer shimmer-title w-3/4 mb-3"></div>
                <div class="shimmer shimmer-line w-full mb-2"></div>
                <div class="shimmer shimmer-line w-5/6 mb-2"></div>
                <div class="shimmer shimmer-line w-4/6"></div>
            </div>

            <!-- Card 2 -->
            <div class="shimmer-card p-6">
                <div class="shimmer shimmer-image w-full"></div>
                <div class="shimmer shimmer-title w-3/4 mb-3"></div>
                <div class="shimmer shimmer-line w-full mb-2"></div>
                <div class="shimmer shimmer-line w-5/6 mb-2"></div>
                <div class="shimmer shimmer-line w-4/6"></div>
            </div>

            <!-- Card 3 -->
            <div class="shimmer-card p-6">
                <div class="shimmer shimmer-image w-full"></div>
                <div class="shimmer shimmer-title w-3/4 mb-3"></div>
                <div class="shimmer shimmer-line w-full mb-2"></div>
                <div class="shimmer shimmer-line w-5/6 mb-2"></div>
                <div class="shimmer shimmer-line w-4/6"></div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-8">
            <div class="shimmer-card p-6 text-center">
                <div class="shimmer-accent w-16 h-16 mx-auto mb-3 rounded-full"></div>
                <div class="shimmer shimmer-line w-20 mx-auto"></div>
            </div>
            <div class="shimmer-card p-6 text-center">
                <div class="shimmer-accent w-16 h-16 mx-auto mb-3 rounded-full"></div>
                <div class="shimmer shimmer-line w-20 mx-auto"></div>
            </div>
            <div class="shimmer-card p-6 text-center">
                <div class="shimmer-accent w-16 h-16 mx-auto mb-3 rounded-full"></div>
                <div class="shimmer shimmer-line w-20 mx-auto"></div>
            </div>
            <div class="shimmer-card p-6 text-center">
                <div class="shimmer-accent w-16 h-16 mx-auto mb-3 rounded-full"></div>
                <div class="shimmer shimmer-line w-20 mx-auto"></div>
            </div>
        </div>
    </div>
</div>

<div class="main-content-wrapper" id="main-content" style="display: none;">
    @yield('navigation')

    <!-- Page Content -->
    <main class="flex-grow">
        <!-- Main Content Area -->
        @yield('content')
    </main>

    @yield('footer')
</div>

<!-- Additional Scripts -->
@stack('scripts')

<script>
    // Enhanced loading management
    document.addEventListener('DOMContentLoaded', function() {
        const shimmerLoading = document.getElementById('shimmer-loading');
        const mainContent = document.getElementById('main-content');

        // Show shimmer immediately
        if (shimmerLoading) {
            shimmerLoading.style.display = 'flex';
        }

        // Hide shimmer and show content when everything is loaded
        window.addEventListener('load', function() {
            setTimeout(function() {
                if (shimmerLoading && mainContent) {
                    // Start fade out
                    shimmerLoading.style.opacity = '0';

                    // Show main content
                    mainContent.style.display = 'block';

                    // Remove shimmer from DOM after transition
                    setTimeout(function() {
                        shimmerLoading.remove();
                    }, 500);
                }
            }, 1000); // Minimum display time for better UX
        });

        // Fallback: hide shimmer after max 3 seconds
        setTimeout(function() {
            if (shimmerLoading && mainContent && shimmerLoading.style.opacity !== '0') {
                shimmerLoading.style.opacity = '0';
                mainContent.style.display = 'block';
                setTimeout(() => shimmerLoading.remove(), 500);
            }
        }, 3000);
    });

    // Slider functionality
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.slider-dot');
        const prevBtn = document.getElementById('prevSlide');
        const nextBtn = document.getElementById('nextSlide');
        let currentSlide = 0;
        const totalSlides = slides.length;

        if (slides.length > 0) {
            function showSlide(index) {
                slides.forEach(slide => {
                    slide.classList.remove('active');
                    slide.style.opacity = '0';
                });

                dots.forEach(dot => dot.classList.remove('active'));

                slides[index].classList.add('active');
                slides[index].style.opacity = '1';
                dots[index].classList.add('active');
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(currentSlide);
            }

            setInterval(nextSlide, 5000);

            if (nextBtn) nextBtn.addEventListener('click', nextSlide);
            if (prevBtn) prevBtn.addEventListener('click', prevSlide);

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentSlide = index;
                    showSlide(currentSlide);
                });
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') prevSlide();
                if (e.key === 'ArrowRight') nextSlide();
            });

            let touchStartX = 0;
            let touchEndX = 0;
            const slider = document.querySelector('.hero-slider');

            if (slider) {
                slider.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                });

                slider.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    const swipeThreshold = 50;
                    const swipeDistance = touchStartX - touchEndX;

                    if (Math.abs(swipeDistance) > swipeThreshold) {
                        if (swipeDistance > 0) {
                            nextSlide();
                        } else {
                            prevSlide();
                        }
                    }
                });
            }
        }
    });

    // Theme toggle functionality
    const themeToggleBtn = document.getElementById('theme-toggle');
    if (themeToggleBtn) {
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Set initial theme
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon?.classList.remove('hidden');
            document.documentElement.classList.add('dark');
        } else {
            themeToggleDarkIcon?.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function() {
            themeToggleDarkIcon?.classList.toggle('hidden');
            themeToggleLightIcon?.classList.toggle('hidden');

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    }

    // Auto-hide flash messages
    setTimeout(function() {
        const alerts = document.querySelectorAll('[role="alert"]');
        alerts.forEach(alert => {
            alert.style.transition = 'opacity 0.3s ease-out';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 300);
        });
    }, 5000);
</script>

@stack('scripts')

<script>
    function showTab(tabName) {
        // Hide all content
        document.getElementById('mission-content').classList.add('hidden');
        document.getElementById('vision-content').classList.add('hidden');
        document.getElementById('values-content').classList.add('hidden');

        // Reset all tab buttons
        document.getElementById('mission-tab').className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 text-gray-500 hover:text-gray-700 text-sm';
        document.getElementById('vision-tab').className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 text-gray-500 hover:text-gray-700 text-sm';
        document.getElementById('values-tab').className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 text-gray-500 hover:text-gray-700 text-sm';

        // Show selected content and activate tab
        document.getElementById(tabName + '-content').classList.remove('hidden');
        document.getElementById(tabName + '-tab').className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 bg-[#2A2D5A] text-white text-sm';
    }
</script>

<x-toast-notification />
</body>
</html>
