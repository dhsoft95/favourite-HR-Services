<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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
                        sans: ['Figtree', 'sans-serif'],
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

    <!-- Additional Head Content -->
    @stack('styles')

    <style>
        /* Modern Shimmer Effect */
        .shimmer {
            background: #f6f7f8;
            background-image: linear-gradient(to right, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%, #f6f7f8 100%);
            background-repeat: no-repeat;
            background-size: 800px 104px;
            display: inline-block;
            position: relative;
            animation-duration: 1s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            animation-name: shimmer;
            animation-timing-function: linear;
        }

        .dark .shimmer {
            background: #374151;
            background-image: linear-gradient(to right, #374151 0%, #4b5563 20%, #374151 40%, #374151 100%);
        }

        .shimmer-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .dark .shimmer-card {
            background: #1f2937;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.2);
        }

        .shimmer-line {
            height: 16px;
            margin-bottom: 12px;
            border-radius: 8px;
        }

        .shimmer-title {
            height: 24px;
            margin-bottom: 16px;
            border-radius: 8px;
        }

        .shimmer-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
        }

        .shimmer-image {
            height: 200px;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .shimmer-button {
            height: 40px;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        #shimmer-loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            transition: opacity 0.5s ease-out;
        }

        .dark #shimmer-loading {
            background: #111827;
        }

        .shimmer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px;
            width: 100%;
        }

        .shimmer-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }

        @media (min-width: 768px) {
            .shimmer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .shimmer-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
<!-- Modern Shimmer Loading Overlay -->
<div id="shimmer-loading">
    <div class="shimmer-container">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div class="shimmer shimmer-title w-48"></div>
            <div class="flex items-center space-x-4">
                <div class="shimmer shimmer-line w-20"></div>
                <div class="shimmer shimmer-line w-20"></div>
                <div class="shimmer shimmer-avatar"></div>
            </div>
        </div>

        <!-- Hero Section -->
        <div class="mb-8">
            <div class="shimmer shimmer-title w-3/4 mb-4"></div>
            <div class="shimmer shimmer-line w-full mb-2"></div>
            <div class="shimmer shimmer-line w-5/6 mb-2"></div>
            <div class="shimmer shimmer-line w-4/6 mb-6"></div>
            <div class="shimmer shimmer-button w-40"></div>
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
                <div class="shimmer shimmer-title w-16 h-16 mx-auto mb-3 rounded-full"></div>
                <div class="shimmer shimmer-line w-20 mx-auto"></div>
            </div>
            <div class="shimmer-card p-6 text-center">
                <div class="shimmer shimmer-title w-16 h-16 mx-auto mb-3 rounded-full"></div>
                <div class="shimmer shimmer-line w-20 mx-auto"></div>
            </div>
            <div class="shimmer-card p-6 text-center">
                <div class="shimmer shimmer-title w-16 h-16 mx-auto mb-3 rounded-full"></div>
                <div class="shimmer shimmer-line w-20 mx-auto"></div>
            </div>
            <div class="shimmer-card p-6 text-center">
                <div class="shimmer shimmer-title w-16 h-16 mx-auto mb-3 rounded-full"></div>
                <div class="shimmer shimmer-line w-20 mx-auto"></div>
            </div>
        </div>
    </div>
</div>

<div class="min-h-screen flex flex-col" id="main-content" style="display: none;">
    @yield('navigation')

    <!-- Page Content -->
    <main class="flex-grow">
        <!-- Flash Messages -->
        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded relative mb-4 mx-4 mt-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded relative mb-4 mx-4 mt-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded relative mb-4 mx-4 mt-4" role="alert">
                <strong class="font-bold">Please fix the following errors:</strong>
                <ul class="list-disc list-inside mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                    mainContent.style.display = 'flex';

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
                mainContent.style.display = 'flex';
                setTimeout(() => shimmerLoading.remove(), 500);
            }
        }, 3000);
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
</body>
</html>
