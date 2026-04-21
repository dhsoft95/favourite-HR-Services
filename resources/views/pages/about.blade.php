@extends('layouts.main')

@section('navigation')
    @include('patrials.heander')
@endsection

@push('styles')
    <style>
        :root {
            --indigo: #312e81;
            --indigo-mid: #3730a3;
            --indigo-light: #4f46e5;
            --red: #dc2626;
            --red-light: #ef4444;
            --red-dim: rgba(220, 38, 38, 0.15);
            --indigo-dim: rgba(49, 46, 129, 0.4);
        }

        #hero-section {
            font-family: 'Inter', sans-serif;
        }

        /* Grain overlay */
        #hero-section::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 3;
            opacity: 0.35;
        }

        .hero-vignette {
            background: radial-gradient(ellipse at center, transparent 35%, rgba(49,46,129,0.55) 100%);
        }

        /* Ring pulse - red */
        .ring-pulse {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(220, 38, 38, 0.5);
            animation: ringPulse 2.5s ease-out infinite;
            pointer-events: none;
        }
        .ring-pulse:nth-child(1) { inset: -14px; }
        .ring-pulse:nth-child(2) { inset: -28px; animation-delay: 0.7s; border-color: rgba(220,38,38,0.25); }
        .ring-pulse:nth-child(3) { inset: -44px; animation-delay: 1.4s; border-color: rgba(220,38,38,0.1); }

        @keyframes ringPulse {
            0%   { opacity: 1; transform: scale(1); }
            100% { opacity: 0; transform: scale(1.18); }
        }

        /* Play button */
        #playButton {
            position: relative;
            width: 84px;
            height: 84px;
            border-radius: 50%;
            background: rgba(220, 38, 38, 0.15);
            border: 1.5px solid var(--red);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.35s ease, transform 0.35s ease, box-shadow 0.35s ease;
            box-shadow: 0 0 32px rgba(220,38,38,0.25), inset 0 0 20px rgba(220,38,38,0.08);
        }

        #playButton:hover {
            background: rgba(220, 38, 38, 0.3);
            transform: scale(1.1);
            box-shadow: 0 0 60px rgba(220,38,38,0.5), inset 0 0 24px rgba(220,38,38,0.15);
        }

        /* Entrance animations */
        .anim-up {
            opacity: 0;
            animation: fadeSlideUp 1s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.42s; }
        .delay-3 { animation-delay: 0.62s; }
        .delay-4 { animation-delay: 0.82s; }
        .delay-5 { animation-delay: 1.0s; }

        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Accent rule - red */
        .accent-rule {
            display: inline-block;
            width: 44px;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--red), transparent);
        }

        /* Scroll indicator */
        .scroll-line {
            width: 1px;
            height: 52px;
            background: linear-gradient(to bottom, var(--red), transparent);
            margin: 0 auto 10px;
            animation: scrollPulse 2s ease-in-out infinite;
        }

        @keyframes scrollPulse {
            0%, 100% { opacity: 0.25; transform: scaleY(0.6) translateY(-4px); }
            50%       { opacity: 1;    transform: scaleY(1)   translateY(4px); }
        }

        /* Stat card */
        .stat-card {
            border: 1px solid rgba(220, 38, 38, 0.2);
            background: rgba(49, 46, 129, 0.35);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-radius: 10px;
            padding: 20px 28px;
            text-align: center;
            transition: border-color 0.3s ease, background 0.3s ease;
        }

        .stat-card:hover {
            border-color: rgba(220,38,38,0.5);
            background: rgba(49,46,129,0.55);
        }

        /* Modal */
        #videoModal {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        #modalInner {
            animation: modalIn 0.42s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.92) translateY(20px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }

        /* Modal frame - indigo to red gradient border */
        .modal-frame {
            position: relative;
            border-radius: 12px;
            padding: 2px;
            background: linear-gradient(135deg, var(--red) 0%, var(--indigo) 50%, var(--red-light) 100%);
        }

        .modal-frame video {
            border-radius: 10px;
            display: block;
            width: 100%;
        }

        /* Corner accents */
        .corner {
            position: absolute;
            width: 22px;
            height: 22px;
            border-color: var(--red);
            border-style: solid;
            opacity: 0.9;
        }
        .corner-tl { top: -7px;    left: -7px;   border-width: 2px 0 0 2px; border-radius: 2px 0 0 0; }
        .corner-tr { top: -7px;    right: -7px;  border-width: 2px 2px 0 0; border-radius: 0 2px 0 0; }
        .corner-bl { bottom: -7px; left: -7px;   border-width: 0 0 2px 2px; border-radius: 0 0 0 2px; }
        .corner-br { bottom: -7px; right: -7px;  border-width: 0 2px 2px 0; border-radius: 0 0 2px 0; }

        /* Divider */
        .modal-divider {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .modal-divider::before,
        .modal-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(220,38,38,0.3));
        }
        .modal-divider::after {
            background: linear-gradient(90deg, rgba(220,38,38,0.3), transparent);
        }
    </style>
@endpush

@section('content')

    {{-- ======================================================
         EXISTING SECTIONS - UNTOUCHED
         ====================================================== --}}

    <section class="relative h-[300px] sm:h-[400px] lg:h-[500px] overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('/images/about/about.png');">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/30"></div>
        </div>
        <div class="relative h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
                <div class="flex items-center h-full">
                    <div class="max-w-xl lg:max-w-4xl">
                        <h1 class="text-white font-semibold leading-tight mb-4 lg:mb-6 drop-shadow-lg
                               text-4xl sm:text-5xl lg:text-6xl tracking-tight">
                            About Favorite<br>
                            HR Services
                        </h1>
                        <p class="text-base sm:text-lg lg:text-xl text-white/95 leading-relaxed max-w-lg drop-shadow-md">
                            Your trusted partner in modern, results-driven HR solutions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 lg:py-10 bg-white">
        <h2 class="text-[#3730a3] mb-6"
            style="font-family: Inter; font-weight: 700; font-size: 48px; line-height: 60px; letter-spacing: -0.02em; text-align: center;">
            Who We Are
        </h2>
        <div class="flex justify-center px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <p class="text-gray-700 leading-relaxed mb-6 text-lg"
                   style="font-family: Inter, sans-serif; line-height: 1.75; text-align: justify; text-align-last: center; hyphens: auto;">
                    Favorite HR Services (FHS) was founded to bridge the gap in truly professional human capital solutions. After recognizing a clear lack of excellence and consistency in the HR industry, we set out with a purposeful mission: to serve organizations that value human capital as the driving force behind real transformation. Whether profit or non-profit, we support businesses in moving from ordinary operations to world-class performance and industry-leading standards.
                </p>
                <p class="text-gray-700 leading-relaxed text-lg"
                   style="font-family: Inter, sans-serif; line-height: 1.75; text-align: justify; text-align-last: center; hyphens: auto;">
                    At FHS, we believe in relationship selling, not transactional interactions. Our focus is on building long-lasting partnerships with both existing and prospective clients by delivering genuine, value-adding HR solutions tailored to their needs. Our team is equipped with up-to-date expertise in the field of human capital and is committed to providing state-of-the-art solutions that support organizational growth, professionalism, and excellence.
                </p>
            </div>
        </div>
    </section>

    <section class="py-10 lg:py-10 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-2xl overflow-hidden min-h-[300px] sm:min-h-[380px] lg:h-[445px]">
                <div class="absolute inset-0 bg-cover bg-center"
                     style="background-image: url('/images/about/about-two.png');"></div>
                <div class="absolute inset-0 bg-black/60"></div>
                <div class="grid grid-cols-1 lg:grid-cols-2 h-full relative z-10">
                    <div class="hidden lg:block relative h-full"></div>
                    <div class="flex items-center p-6 sm:p-8 lg:p-12">
                        <div class="text-white">
                            <blockquote class="text-white mb-6 font-extrabold text-base sm:text-lg lg:text-xl leading-relaxed">
                                " In these tough economic times, organizations cannot afford to pour funds or any resources into (or partner with) ordinary trial-and-error companies that do not value excellence, professionalism, cost efficiency, time, and most important, the green concept."
                            </blockquote>
                            <div class="text-gray-300">
                                <p class="text-sm opacity-80">CEO</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 lg:py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center mb-12 lg:mb-16">
                <div class="inline-flex flex-wrap sm:flex-nowrap bg-gray-100 rounded-full p-1 justify-center gap-1 sm:gap-0">
                    <button onclick="showTab('mission')" id="mission-tab"
                            class="px-4 sm:px-6 py-2 rounded-full font-medium transition-all duration-300 bg-[#3730a3] text-white text-sm whitespace-nowrap">
                        Mission
                    </button>
                    <button onclick="showTab('vision')" id="vision-tab"
                            class="px-4 sm:px-6 py-2 rounded-full font-medium transition-all duration-300 text-gray-500 hover:text-gray-700 text-sm whitespace-nowrap">
                        Vision
                    </button>
                    <button onclick="showTab('values')" id="values-tab"
                            class="px-4 sm:px-6 py-2 rounded-full font-medium transition-all duration-300 text-gray-500 hover:text-gray-700 text-sm whitespace-nowrap">
                        Core Values
                    </button>
                </div>
            </div>
            <div class="text-center">
                <div id="mission-content" class="block">
                    <h2 class="text-[#3730a3] mb-4 lg:mb-6 text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight"
                        style="font-family: Inter; letter-spacing: -0.02em;">Mission</h2>
                    <div class="flex justify-center">
                        <p class="text-gray-600 text-base sm:text-lg leading-relaxed max-w-3xl lg:max-w-4xl px-4" style="font-family: Inter;">
                            Our core duty is to provide our clients with most effective organization-tailored human capital solutions.
                            We are committed to consistently providing superior human capital services presented in a professional,
                            timely, and cost-effective manner. We strive to leave the client with the finest lasting impression.
                        </p>
                    </div>
                </div>
                <div id="vision-content" class="hidden">
                    <h2 class="text-[#3730a3] mb-4 lg:mb-6 text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight"
                        style="font-family: Inter; letter-spacing: -0.02em;">Vision</h2>
                    <div class="flex justify-center">
                        <p class="text-gray-600 text-base sm:text-lg leading-relaxed max-w-3xl lg:max-w-4xl px-4" style="font-family: Inter;">
                            FHS' vision is to become the most esteemed brand and number one choice when it comes to serving human capital needs.
                            To achieve this vision, we are determined to deploying effective strategies, creating/maintaining competent team,
                            and constantly upgrading our ways of doing business; while we focus on lowering our (along with clients') expenses,
                            increasing efficiency, and continuously improving quality.
                        </p>
                    </div>
                </div>
                <div id="values-content" class="hidden">
                    <h2 class="text-[#3730a3] mb-4 lg:mb-6 text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight"
                        style="font-family: Inter; letter-spacing: -0.02em;">Core Values</h2>
                    <div class="flex justify-center">
                        <div class="text-gray-600 text-base sm:text-lg leading-relaxed max-w-4xl lg:max-w-5xl px-4" style="font-family: Inter;">
                            <p class="mb-8 text-center">FHS is governed by its core values when performing daily activities. These values guide each decision and behaviour, shape culture, and define the character of the company.</p>
                            <div class="text-left max-w-4xl mx-auto">
                                <p class="mb-4 font-semibold">At FHS, we:</p>
                                <div class="space-y-6">
                                    <div class="flex items-start gap-3"><span class="flex-shrink-0">•</span><p class="leading-relaxed">Act with highest level of honesty and integrity while performing every project</p></div>
                                    <div class="flex items-start gap-3"><span class="flex-shrink-0">•</span><p class="leading-relaxed">Highly worship clients as they are the purpose of whatever we do, and our success depends on our clients' satisfaction entirely</p></div>
                                    <div class="flex items-start gap-3"><span class="flex-shrink-0">•</span><p class="leading-relaxed">Value and embrace talents, leadership, and initiatives of each associate</p></div>
                                    <div class="flex items-start gap-3"><span class="flex-shrink-0">•</span><p class="leading-relaxed">Worth doing things right first and actively learning from others, and</p></div>
                                    <div class="flex items-start gap-3"><span class="flex-shrink-0">•</span><p class="leading-relaxed">Extremely value and respect communities in which we live and work.</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ======================================================
         HERO / VIDEO SECTION - REDESIGNED
         ====================================================== --}}
    <section id="hero-section" class="relative min-h-screen flex flex-col items-center justify-center overflow-hidden">

        {{-- Background video --}}
        <div class="absolute inset-0 z-0">
            <video id="bgVideo" autoplay muted loop playsinline
                   class="w-full h-full object-cover object-center">
                <source src="{{ asset('images/Hero/video.mp4') }}" type="video/mp4">
            </video>
            <div class="absolute inset-0 bg-gradient-to-r from-[#312e81]/80 via-black/40 to-[#312e81]/60"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-[#312e81]/30"></div>
            <div class="absolute inset-0 hero-vignette"></div>
        </div>

        {{-- Decorative top border line --}}
        <div class="absolute top-0 left-0 right-0 h-[3px] z-10"
             style="background: linear-gradient(90deg, transparent, #dc2626, #312e81, #dc2626, transparent);"></div>

        {{-- Main content --}}
        <div class="relative z-10 text-center px-6 max-w-4xl mx-auto w-full pt-20 pb-12">

            {{-- Eyebrow --}}
            <div class="anim-up delay-1 flex items-center justify-center gap-3 mb-6">
                <span class="accent-rule"></span>
                <span class="text-xs tracking-[0.35em] uppercase text-red-400"
                      style="font-family:'Inter',sans-serif; font-weight:300;">
                    Premium HR Solutions
                </span>
                <span class="accent-rule"></span>
            </div>

            {{-- Headline --}}
            <h1 class="anim-up delay-2 text-5xl md:text-7xl lg:text-8xl text-white mb-6 leading-[1.05] font-bold"
                style="font-family:'Inter',sans-serif; letter-spacing:-0.02em;">
                Your Career,<br>
                <span style="color: #ef4444;">Our Mission</span>
            </h1>

            {{-- Subtitle --}}
            <p class="anim-up delay-3 text-base md:text-lg text-white/60 mb-12 max-w-xl mx-auto leading-relaxed"
               style="font-family:'Inter',sans-serif; font-weight:300; letter-spacing:0.02em;">
                Connecting exceptional talent with extraordinary opportunities across East Africa and beyond.
            </p>

            {{-- CTA row --}}
            <div class="anim-up delay-4 flex flex-col sm:flex-row items-center justify-center gap-8 mb-20">

                {{-- Play button --}}
                <div class="flex flex-col items-center gap-3">
                    <button id="playButton" aria-label="Watch our story">
                        <div class="ring-pulse"></div>
                        <div class="ring-pulse"></div>
                        <div class="ring-pulse"></div>
                        <svg id="iconPlay" class="w-7 h-7 ml-1 text-red-400"
                             fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        <svg id="iconSound" class="w-7 h-7 hidden text-red-400"
                             fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3A4.5 4.5 0 0 0 14 7.97v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                        </svg>
                    </button>
                    <span class="text-white/35 text-[10px] tracking-[0.3em] uppercase"
                          style="font-family:'Inter',sans-serif; font-weight:300;">
                        Watch our story
                    </span>
                </div>

                {{-- Vertical divider --}}
                <div class="hidden sm:block w-px h-12 bg-white/10"></div>

                {{-- Explore services --}}
                <a href="#services"
                   class="group flex items-center gap-3 text-white/50 hover:text-red-400 transition-colors duration-300"
                   style="font-family:'Inter',sans-serif; font-weight:300; letter-spacing:0.1em; font-size:0.75rem; text-transform:uppercase;">
                    Explore Services
                    <span class="w-6 h-px bg-current transition-all duration-300 group-hover:w-10"></span>
                </a>
            </div>

            {{-- Stats row --}}
            <div class="anim-up delay-5 grid grid-cols-2 md:grid-cols-4 gap-3 max-w-3xl mx-auto">
                @php
                    $stats = [
                        ['value' => '500+', 'label' => 'Placements'],
                        ['value' => '12+',  'label' => 'Years Active'],
                        ['value' => '98%',  'label' => 'Client Satisfaction'],
                        ['value' => '50+',  'label' => 'Partner Companies'],
                    ];
                @endphp
                @foreach($stats as $stat)
                    <div class="stat-card">
                        <div class="text-2xl md:text-3xl font-bold mb-1 text-red-400"
                             style="font-family:'Inter',sans-serif;">
                            {{ $stat['value'] }}
                        </div>
                        <div class="text-white/45 text-[10px] tracking-[0.2em] uppercase"
                             style="font-family:'Inter',sans-serif; font-weight:300;">
                            {{ $stat['label'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10">
            <a href="#content" class="flex flex-col items-center text-white/30 hover:text-red-400 transition-colors duration-300">
                <div class="scroll-line"></div>
                <span class="text-[9px] tracking-[0.35em] uppercase"
                      style="font-family:'Inter',sans-serif; font-weight:300;">
                    Scroll
                </span>
            </a>
        </div>
    </section>


    {{-- ======================================================
         VIDEO MODAL
         ====================================================== --}}
    <div id="videoModal"
         class="hidden fixed inset-0 z-50 bg-[#312e81]/70 flex items-center justify-center p-4 md:p-8">

        <div id="modalInner" class="relative w-full max-w-4xl">

            {{-- Top bar --}}
            <div class="flex items-center justify-between mb-4 px-1">
                <div class="flex items-center gap-3">
                    <span class="accent-rule" style="width:28px;"></span>
                    <span class="text-white/40 text-[10px] tracking-[0.3em] uppercase"
                          style="font-family:'Inter',sans-serif; font-weight:300;">
                        Favorite HR Services
                    </span>
                </div>
                <button id="closeModal"
                        class="flex items-center gap-2 text-white/40 hover:text-red-400 transition-colors duration-200 group"
                        aria-label="Close">
                    <span class="text-[10px] tracking-[0.3em] uppercase hidden sm:block"
                          style="font-family:'Inter',sans-serif; font-weight:300;">
                        Close
                    </span>
                    <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Framed video --}}
            <div class="modal-frame">
                <div class="corner corner-tl"></div>
                <div class="corner corner-tr"></div>
                <div class="corner corner-bl"></div>
                <div class="corner corner-br"></div>

                <div class="relative pt-[56.25%]">
                    <video id="modalVideo"
                           class="absolute inset-0 w-full h-full"
                           style="border-radius:10px;"
                           controls
                           playsinline>
                        <source src="{{ asset('images/Hero/video.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>

            {{-- Caption --}}
            <div class="modal-divider mt-5">
                <span class="text-white/25 text-[9px] tracking-[0.35em] uppercase whitespace-nowrap"
                      style="font-family:'Inter',sans-serif; font-weight:200;">
                    Our Story &mdash; Favorite HR Services Ltd
                </span>
            </div>
        </div>
    </div>


    @include('patrials.clients')
    @include('patrials.trusted_brands')

@endsection

@section('footer')
    @include('patrials.footer')
@endsection

@push('scripts')
    <script>
        // Tab switching
        function showTab(tab) {
            const tabs    = ['mission', 'vision', 'values'];
            const active  = 'bg-[#3730a3] text-white';
            const inactive = 'text-gray-500 hover:text-gray-700';

            tabs.forEach(t => {
                const content = document.getElementById(t + '-content');
                const btn     = document.getElementById(t + '-tab');

                if (t === tab) {
                    content.classList.remove('hidden');
                    content.classList.add('block');
                    btn.classList.add('bg-[#3730a3]', 'text-white');
                    btn.classList.remove('text-gray-500', 'hover:text-gray-700');
                } else {
                    content.classList.add('hidden');
                    content.classList.remove('block');
                    btn.classList.remove('bg-[#3730a3]', 'text-white');
                    btn.classList.add('text-gray-500', 'hover:text-gray-700');
                }
            });
        }

        // Video modal
        const bgVideo    = document.getElementById('bgVideo');
        const modalVideo = document.getElementById('modalVideo');
        const modal      = document.getElementById('videoModal');
        const modalInner = document.getElementById('modalInner');
        const playBtn    = document.getElementById('playButton');
        const iconPlay   = document.getElementById('iconPlay');
        const iconSound  = document.getElementById('iconSound');

        function openModal() {
            modal.classList.remove('hidden');
            modalInner.style.animation = 'none';
            modalInner.offsetHeight;
            modalInner.style.animation = '';
            modalVideo.currentTime = 0;
            modalVideo.play();
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('hidden');
            modalVideo.pause();
            modalVideo.currentTime = 0;
            document.body.style.overflow = '';
        }

        playBtn.addEventListener('click', openModal);
        document.getElementById('closeModal').addEventListener('click', closeModal);

        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeModal();
        });
    </script>
@endpush
