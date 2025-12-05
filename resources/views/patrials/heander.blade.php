@php
    $currentRoute = request()->route()->getName();
    $activeClasses = 'text-red-600 border-b-2 border-red-600';
    $inactiveClasses = 'text-gray-600 hover:text-red-600 hover:border-b-2 hover:border-red-600 border-b-2 border-transparent';

    // Define which route corresponds to which navigation item
    $routes = [
        'home' => '/',
        'about' => 'about',
        'solutions' => 'solutions',
        'jobs' => 'jobs',
        'contact' => 'contact'
    ];
@endphp

<nav class="bg-white shadow-sm">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center">
                    <div class="flex items-center space-x-3">
                        <img src="/images/logo/logo.png" alt="Favourite Web Services" class="h-10 w-auto">
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:block">
                <div class="flex items-center space-x-8">
                    <a href="/" class="px-3 py-2 text-sm font-medium transition duration-150 ease-in-out {{ request()->is('/') ? $activeClasses : $inactiveClasses }}">
                        Home
                    </a>
                    <a href="/about" class="px-3 py-2 text-sm font-medium transition duration-150 ease-in-out {{ request()->is('about') ? $activeClasses : $inactiveClasses }}">
                        About Us
                    </a>
                    <a href="/solutions" class="px-3 py-2 text-sm font-medium transition duration-150 ease-in-out {{ request()->is('solutions') ? $activeClasses : $inactiveClasses }}">
                        Our Solutions
                    </a>
                    <a href="/jobs" class="px-3 py-2 text-sm font-medium transition duration-150 ease-in-out {{ request()->is('jobs') ? $activeClasses : $inactiveClasses }}">
                        Jobs
                    </a>
                    <a href="/contact" class="px-3 py-2 text-sm font-medium transition duration-150 ease-in-out {{ request()->is('contact') ? $activeClasses : $inactiveClasses }}">
                        Contact Us
                    </a>
                </div>
            </div>

            <!-- Desktop Right Side -->
            <div class="hidden lg:flex items-center space-x-4">
                <!-- Language Selector -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">
                        <div class="w-5 h-5 rounded-full overflow-hidden">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="none">
                                <rect width="20" height="20" fill="#012169"/>
                                <path d="M0 0L20 20M20 0L0 20" stroke="white" stroke-width="2"/>
                                <path d="M0 0L20 20M20 0L0 20" stroke="#C8102E" stroke-width="1"/>
                                <path d="M10 0V20M0 10H20" stroke="white" stroke-width="3"/>
                                <path d="M10 0V20M0 10H20" stroke="#C8102E" stroke-width="2"/>
                            </svg>
                        </div>
                        <span>ENG</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{'rotate-180': open}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open" x-transition @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-36 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                        <div class="py-1">
                            <a href="#" class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <div class="w-4 h-4 rounded-full overflow-hidden">
                                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="none">
                                        <rect width="20" height="20" fill="#012169"/>
                                        <path d="M0 0L20 20M20 0L0 20" stroke="white" stroke-width="2"/>
                                        <path d="M0 0L20 20M20 0L0 20" stroke="#C8102E" stroke-width="1"/>
                                        <path d="M10 0V20M0 10H20" stroke="white" stroke-width="3"/>
                                        <path d="M10 0V20M0 10H20" stroke="#C8102E" stroke-width="2"/>
                                    </svg>
                                </div>
                                <span>English</span>
                            </a>
                            <a href="#" class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <div class="w-4 h-4 rounded-full bg-blue-500"></div>
                                <span>Español</span>
                            </a>
                            <a href="#" class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <div class="w-4 h-4 rounded-full bg-green-500"></div>
                                <span>Français</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Search -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" placeholder="Search" class="block w-48 pl-10 pr-4 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 text-sm">
                </div>

                @auth
                    <!-- User Dropdown (Logged In) -->
                    <div class="relative" x-data="{ userMenuOpen: false }">
                        <button @click="userMenuOpen = !userMenuOpen" class="flex items-center space-x-2 text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">
                            <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="hidden md:block">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{'rotate-180': userMenuOpen}" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div x-show="userMenuOpen" x-transition @click.away="userMenuOpen = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                            <div class="py-1">
                                <!-- User Info -->
                                <div class="px-4 py-3 border-b border-gray-200">
                                    <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                                </div>

                                @if(Auth::user()->isAdmin())
                                    <!-- Admin Panel Link -->
                                    <a href="/portal" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Admin Panel
                                    </a>
                                @endif

                                <!-- Dashboard -->
                                <a href="/dashboard" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    Dashboard
                                </a>

                                <!-- My Applications -->
                                <a href="/dashboard" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    My Applications
                                </a>

                                <!-- Profile -->
                                <a href="/profile" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Profile
                                </a>
                                <div class="border-t border-gray-200"></div>
                                <!-- Logout -->
                                    <button wire:click="logout" type="submit" class="flex items-center w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                        <svg class="mr-3 h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Logout
                                    </button>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Login/Register Buttons (Guest) -->
                    <a href="/login" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        Login
                    </a>
                    <a href="/register" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-800 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out shadow-sm">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile/Tablet menu button -->
            <div class="lg:hidden" x-data="{ open: false }">
                <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-red-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500">
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Mobile menu -->
                <div x-show="open" x-transition class="origin-top-right absolute right-4 top-16 mt-2 w-80 max-w-sm rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" @click.away="open = false">
                    <div class="px-4 py-6 space-y-4">
                        @auth
                            <!-- User Info Mobile -->
                            <div class="flex items-center space-x-3 pb-4 border-b border-gray-200">
                                <div class="w-12 h-12 rounded-full bg-indigo-600 flex items-center justify-center text-white font-semibold text-lg">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        @endauth

                        <!-- Navigation Links -->
                        <div class="space-y-2">
                            <a href="/" class="block px-4 py-3 text-base font-medium rounded-lg transition duration-150 {{ request()->is('/') ? 'text-red-600 bg-red-50' : 'text-gray-600 hover:text-red-600 hover:bg-red-50' }}" @click="open = false">
                                Home
                            </a>
                            <a href="/about" class="block px-4 py-3 text-base font-medium rounded-lg transition duration-150 {{ request()->is('about') ? 'text-red-600 bg-red-50' : 'text-gray-600 hover:text-red-600 hover:bg-red-50' }}" @click="open = false">
                                About Us
                            </a>
                            <a href="/solutions" class="block px-4 py-3 text-base font-medium rounded-lg transition duration-150 {{ request()->is('solutions') ? 'text-red-600 bg-red-50' : 'text-gray-600 hover:text-red-600 hover:bg-red-50' }}" @click="open = false">
                                Our Solutions
                            </a>
                            <a href="/jobs" class="block px-4 py-3 text-base font-medium rounded-lg transition duration-150 {{ request()->is('jobs') ? 'text-red-600 bg-red-50' : 'text-gray-600 hover:text-red-600 hover:bg-red-50' }}" @click="open = false">
                                Jobs
                            </a>
                            <a href="/contact" class="block px-4 py-3 text-base font-medium rounded-lg transition duration-150 {{ request()->is('contact') ? 'text-red-600 bg-red-50' : 'text-gray-600 hover:text-red-600 hover:bg-red-50' }}" @click="open = false">
                                Contact Us
                            </a>

                            @auth
                                @if(Auth::user()->isAdmin())
                                    <a href="/portal" class="block px-4 py-3 text-base font-medium rounded-lg transition duration-150 text-indigo-600 hover:bg-indigo-50" @click="open = false">
                                        Admin Panel
                                    </a>
                                @endif
                                <a href="/dashboard" class="block px-4 py-3 text-base font-medium rounded-lg transition duration-150 text-gray-600 hover:text-red-600 hover:bg-red-50" @click="open = false">
                                    Dashboard
                                </a>
                                <a href="/profile" class="block px-4 py-3 text-base font-medium rounded-lg transition duration-150 text-gray-600 hover:text-red-600 hover:bg-red-50" @click="open = false">
                                    Profile
                                </a>
                            @endauth
                        </div>

                        <hr class="border-gray-200">

                        <!-- Language Selector Mobile -->
                        <div x-data="{ langOpen: false }">
                            <button @click="langOpen = !langOpen" class="flex items-center justify-between w-full px-4 py-3 text-left text-base font-medium text-gray-600 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-5 h-5 rounded-full overflow-hidden">
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="none">
                                            <rect width="20" height="20" fill="#012169"/>
                                            <path d="M0 0L20 20M20 0L0 20" stroke="white" stroke-width="2"/>
                                            <path d="M0 0L20 20M20 0L0 20" stroke="#C8102E" stroke-width="1"/>
                                            <path d="M10 0V20M0 10H20" stroke="white" stroke-width="3"/>
                                            <path d="M10 0V20M0 10H20" stroke="#C8102E" stroke-width="2"/>
                                        </svg>
                                    </div>
                                    <span>English</span>
                                </div>
                                <svg class="w-5 h-5 transition-transform duration-200" :class="{'rotate-180': langOpen}" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>

                            <div x-show="langOpen" x-transition class="mt-2 space-y-1">
                                <a href="#" class="flex items-center space-x-3 px-4 py-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-md hover:bg-gray-50">
                                    <div class="w-4 h-4 rounded-full overflow-hidden">
                                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="none">
                                            <rect width="20" height="20" fill="#012169"/>
                                            <path d="M0 0L20 20M20 0L0 20" stroke="white" stroke-width="2"/>
                                            <path d="M0 0L20 20M20 0L0 20" stroke="#C8102E" stroke-width="1"/>
                                            <path d="M10 0V20M0 10H20" stroke="white" stroke-width="3"/>
                                            <path d="M10 0V20M0 10H20" stroke="#C8102E" stroke-width="2"/>
                                        </svg>
                                    </div>
                                    <span>English</span>
                                </a>
                                <a href="#" class="flex items-center space-x-3 px-4 py-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-md hover:bg-gray-50">
                                    <div class="w-4 h-4 rounded-full bg-blue-500"></div>
                                    <span>Español</span>
                                </a>
                                <a href="#" class="flex items-center space-x-3 px-4 py-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-md hover:bg-gray-50">
                                    <div class="w-4 h-4 rounded-full bg-green-500"></div>
                                    <span>Français</span>
                                </a>
                            </div>
                        </div>

                        <!-- Mobile Search -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text" placeholder="Search" class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        </div>

                        @auth
                            <!-- Mobile Logout -->

                                @csrf
                                <button wire:click="logout" type="submit" class="block w-full px-4 py-3 text-center text-base font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 transition duration-150" @click="open = false">
                                    {{ __('Log Out') }}
                                </button>


                        @else
                            <!-- Mobile Login/Register -->
                            <div class="space-y-2">
                                <a href="/login" class="block w-full px-4 py-3 text-center text-base font-medium rounded-lg text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 transition duration-150" @click="open = false">
                                    Login
                                </a>
                                <a href="/register" class="block w-full px-4 py-3 text-center text-base font-medium rounded-lg text-white bg-indigo-800 hover:bg-indigo-700 transition duration-150" @click="open = false">
                                    Register
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Red line below navigation -->
    <div class="w-full h-1 bg-red-600"></div>
</nav>
