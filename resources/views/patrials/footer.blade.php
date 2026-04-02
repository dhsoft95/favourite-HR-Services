<div class="w-full h-1" style="background-color: rgb(162, 38, 49);"></div>
<footer class="bg-[#151457] text-white">
    <!-- Newsletter Section -->
    <div class="border-b border-gray-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-6">
            </div>
        </div>
    </div>

    <!-- Main Footer Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">

            <!-- Quick Links -->
            <div>
                <h3 class="text-red-500 font-bold text-sm uppercase tracking-wide mb-4">Quick Links</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="/" class="transition-colors {{ request()->is('/') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="transition-colors {{ request()->routeIs('about') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }}">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('solutions') }}" class="transition-colors {{ request()->routeIs('solutions') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }}">
                            Our Solutions
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('jobs') }}" class="transition-colors {{ request()->routeIs('Jobs') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }}">
                            Jobs
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="transition-colors {{ request()->routeIs('contact') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }}">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Our Services -->
            <div>
                <h3 class="text-red-500 font-bold text-sm uppercase tracking-wide mb-4">Our Services</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('solutions') }}" class="transition-colors {{ request()->routeIs('solutions') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }} class="text-gray-300 hover:text-white transition-colors">Start Up Company Guidance</a></li>
                    <li><a href="{{ route('solutions') }}" class="transition-colors {{ request()->routeIs('solutions') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }}class="text-gray-300 hover:text-white transition-colors">Recruitment & Selection</a></li>
                    <li><a href="{{ route('solutions') }}" class="transition-colors {{ request()->routeIs('solutions') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }} class="text-gray-300 hover:text-white transition-colors">Corporate Training</a></li>
                    <li><a href="{{ route('solutions') }}" class="transition-colors {{ request()->routeIs('solutions') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }}class="text-gray-300 hover:text-white transition-colors">Organization Structure</a></li>
                    <li><a href="{{ route('solutions') }}" class="transition-colors {{ request()->routeIs('solutions') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }} class="text-gray-300 hover:text-white transition-colors">HR Documents & Reports</a></li>
                </ul>
            </div>

            <!-- Additional Services -->
            <div>
                <ul class="space-y-3 mt-8">
                    <li><a href="{{ route('solutions') }}" class="transition-colors {{ request()->routeIs('solutions') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }} class="text-gray-300 hover:text-white transition-colors">Background Checks</a></li>
                    <li><a href="{{ route('solutions') }}" class="transition-colors {{ request()->routeIs('solutions') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }} class="text-gray-300 hover:text-white transition-colors">Salary & Benefits</a></li>
                    <li><a href="{{ route('solutions') }}" class="transition-colors {{ request()->routeIs('solutions') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }}class="text-gray-300 hover:text-white transition-colors">HR Audit</a></li>
                    <li><a href="{{ route('solutions') }}" class="transition-colors {{ request()->routeIs('solutions') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }}class="text-gray-300 hover:text-white transition-colors">Job Analysis, Documentation & Evaluation</a></li>
{{--                    <li><a href="{{ route('solutions') }}" class="transition-colors {{ request()->routeIs('solutions') ? 'text-[rgb(212,54,46)] font-semibold' : 'text-gray-300 hover:text-white' }}class="text-gray-300 hover:text-white transition-colors">Outsourcing</a></li>--}}
                </ul>
            </div>

            <!-- Contact Us -->
            <div>
                <h3 class="text-red-500 font-bold text-sm uppercase tracking-wide mb-4">Contact Us</h3>
                <div class="space-y-3">
                    <div>
                        <p class="text-gray-300 text-sm">Enquires:</p>
                        <a href="mailto:fhs@favoritegroup.co.tz" class="text-white hover:text-gray-300 transition-colors">
                            fhs@favoritegroup.co.tz
                        </a>
                    </div>
                    <div>
                        <p class="text-gray-300 text-sm">Job applications:</p>
                        <a href="mailto:jobs@favoritegroup.co.tz" class="text-white hover:text-gray-300 transition-colors">
                            jobs@favoritegroup.co.tz
                        </a>
                    </div>
                    <div class="space-y-1">
                        <a href="tel:+255683383132" class="block text-white hover:text-gray-300 transition-colors">+255 683 383 132</a>
                        <a href="tel:+255767636871" class="block text-white hover:text-gray-300 transition-colors">+255 767 636 871</a>
                        <a href="tel:+255710287676" class="block text-white hover:text-gray-300 transition-colors">+255 710 287 676</a>
                        <a href="tel:+255710287676" class="block text-white hover:text-gray-300 transition-colors">+255 750 048 993</a>
                    </div>
                </div>
            </div>

            <!-- Our Offices -->
            <div>
                <h3 class="text-red-500 font-bold text-sm uppercase tracking-wide mb-4">Our Offices</h3>
                <div class="text-gray-300 text-sm leading-relaxed">
                    <p class="font-semibold text-white mb-2">Favorite Group Ltd</p>
                    <p>Alfa Plaza (Formerly Jangid Plaza)</p>
                    <p>6th Floor, Suite No. 6/01/C, Plot No. G6</p>
                    <p>Ada Estate/Oysterbay -</p>
                    <p>Off Ali Hassan Mwinyi Road</p>
                    <p>Dar Es Salaam, Tanzania</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="border-t border-gray-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <img src="images/logo/HR-Logo-White.png" alt="FHS Logo" class="h-12 w-auto">
            </div>

            <!-- Copyright -->
            <div class="text-center text-gray-400 text-sm mb-6">
                <p>© FHS - 2025. All rights reserved.</p>
                <p class="mt-1 text-gray-500 text-xs">Favourite HR Services Ltd · Dar es Salaam, Tanzania</p>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-700 mb-6"></div>

            <!-- Social + Bottom Row -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">

                <div class="text-gray-500 text-xs">
                    Connecting talent with opportunity across Africa.
                </div>

                <!-- Social Media Icons -->
                <div class="flex gap-4">
                    <a href="https://www.instagram.com/favoritefhs/" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/favoritefhs" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="https://www.threads.net/@favoritefhs" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.186 24h-.007c-3.581-.024-6.334-1.205-8.184-3.509C2.35 18.44 1.5 15.586 1.472 12.01v-.017c.03-3.579.879-6.43 2.525-8.482C5.845 1.205 8.6.024 12.18 0h.014c2.746.02 5.043.725 6.826 2.098 1.677 1.29 2.858 3.13 3.509 5.467l-2.04.569c-1.104-3.96-3.898-5.984-8.304-6.015-2.91.022-5.11.936-6.54 2.717C4.307 6.504 3.616 8.914 3.589 12c.027 3.086.718 5.496 2.055 7.164 1.43 1.783 3.631 2.698 6.541 2.717 2.623-.02 4.358-.631 5.8-2.045 1.647-1.613 1.618-3.593 1.09-4.798-.31-.71-.873-1.3-1.634-1.75-.192 1.352-.622 2.446-1.284 3.272-.886 1.102-2.14 1.704-3.73 1.79-1.202.065-2.361-.218-3.259-.801-1.063-.689-1.685-1.74-1.752-2.964-.065-1.19.408-2.285 1.33-3.082.88-.76 2.119-1.207 3.583-1.291a13.853 13.853 0 013.02.142l-.126.742a12.22 12.22 0 00-2.836-.133c-1.15.067-2.08.397-2.698.957-.645.584-.96 1.368-.914 2.27.046.902.444 1.62 1.15 2.076.63.408 1.424.599 2.303.552 1.232-.066 2.194-.503 2.86-1.297.616-.734.976-1.727 1.075-2.964l.038-.465.011-.133.283.033c.908.105 1.689.327 2.324.66 1.042.546 1.886 1.388 2.374 2.373.799 1.615.815 4.133-1.236 6.223-1.795 1.827-4.06 2.54-7.245 2.572zm-.012-14.41c-.012 0-.022-.002-.034-.002zm.025 0z"/>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/company/favorite-hr-services/" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</footer>
