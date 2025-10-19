<div class="w-full py-20 relative overflow-hidden bg-white">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-10 left-10 w-32 h-32 border border-gray-300 rounded-full"></div>
        <div class="absolute bottom-10 right-10 w-48 h-48 border border-gray-300 rounded-full"></div>
        <div class="absolute top-1/2 right-1/4 w-24 h-24 border border-gray-300 rounded-full"></div>
        <div class="absolute top-1/3 right-20 w-16 h-16 bg-gray-200 rounded-lg transform rotate-45"></div>
        <div class="absolute bottom-1/3 left-20 w-20 h-20 bg-gray-200 rounded-lg transform rotate-12"></div>
        <div class="absolute top-3/4 right-1/3 w-12 h-12 border border-gray-300 transform rotate-45"></div>
        <div class="absolute top-1/4 left-1/3 w-14 h-14 border border-gray-300 transform -rotate-12"></div>
    </div>

    <div class="relative z-10">
        <!-- Header -->
        <div class="text-center mb-10 px-4 sm:px-6 lg:px-8">
            <h2 class="header-title mb-4">
                Trusted By Leading Brands National-wise
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-12">
                Transforming human potential into sustainable business growth.
            </p>
        </div>

        <!-- Full Width Logos Slider -->
        <div class="relative w-full">
            <!-- Fade Edges -->
            <div class="absolute left-0 top-0 bottom-0 w-24 sm:w-32 z-10 pointer-events-none bg-gradient-to-r from-white via-white to-transparent"></div>
            <div class="absolute right-0 top-0 bottom-0 w-24 sm:w-32 z-10 pointer-events-none bg-gradient-to-l from-white via-white to-transparent"></div>

            <!-- Logos Container -->
            <div class="overflow-hidden py-6">
                <div class="flex gap-16 animate-slide items-center">
                    @php
                        $clients = [
                            'azam-tv-seeklogo.png',
                            'azam-tv-seeklogo.png',
                            'azam-tv-seeklogo.png',
                            'azam-tv-seeklogo.png',
                            'azam-tv-seeklogo.png',
                        ];
                    @endphp

                    @foreach($clients as $logo)
                        <div class="flex-shrink-0 w-48 h-28 flex items-center justify-center bg-gray-50 rounded-lg px-6 border border-gray-100 hover:bg-white hover:shadow-lg hover:border-gray-200 transition-all duration-300 group">
                            <img src="{{ asset('images/clients/' . $logo) }}"
                                 alt="Client Logo"
                                 class="max-w-full max-h-16 object-contain grayscale group-hover:grayscale-0 transition-all duration-500">
                        </div>
                    @endforeach

                    <!-- Duplicate for loop -->
                    @foreach($clients as $logo)
                        <div class="flex-shrink-0 w-48 h-28 flex items-center justify-center bg-gray-50 rounded-lg px-6 border border-gray-100 hover:bg-white hover:shadow-lg hover:border-gray-200 transition-all duration-300 group">
                            <img src="{{ asset('/images/clients/' . $logo) }}"
                                 alt="Client Logo"
                                 class="max-w-full max-h-16 object-contain grayscale group-hover:grayscale-0 transition-all duration-500">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .header-title {
        font-family: Inter, sans-serif;
        font-weight: 700;
        font-style: normal;
        font-size: 48px;
        line-height: 60px;
        letter-spacing: -0.02em;
        text-align: center;
        color: #151457;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .header-title {
            font-size: 32px;
            line-height: 40px;
        }
    }

    @media (max-width: 640px) {
        .header-title {
            font-size: 28px;
            line-height: 36px;
        }
    }

    @keyframes slide {
        from { transform: translateX(0); }
        to { transform: translateX(-50%); }
    }

    .animate-slide {
        animation: slide 30s linear infinite;
        will-change: transform;
    }

    .animate-slide:hover {
        animation-play-state: paused;
    }
</style>
