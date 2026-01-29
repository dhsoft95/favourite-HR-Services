<section class="relative w-full h-[75vh]">
    <style>
        :root {
            --primary-navy: #1a2332;
            /*--accent-gold: #D2232A;*/
            --text-light: #f8fafc;
            --text-muted: #cbd5e1;
            /*--overlay: rgba(26, 35, 50, 0.6);*/
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: all 800ms ease-in-out;
            transform: scale(1.02);
        }

        .hero-slide.active {
            opacity: 1;
            transform: scale(1);
        }

        .hero-slide::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--overlay);
            z-index: 1;
        }

        .hero-title {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: clamp(1.8rem, 4vw, 3.5rem);
            line-height: 1.1;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-family: 'Inter', sans-serif;
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            line-height: 1.5;
            color: var(--text-muted);
            font-weight: 300;
            margin-bottom: 1.5rem;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .cta-button {
            font-family: 'Inter', sans-serif;
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--text-light);
            color: var(--text-light);
            font-weight: 500;
            font-size: 0.9rem;
            text-transform: uppercase;
            text-decoration: none;
            transition: all 300ms ease;
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--text-light);
            transform: translateX(-100%);
            transition: transform 300ms ease;
            z-index: -1;
        }

        .cta-button:hover::before {
            transform: translateX(0);
        }

        .cta-button:hover {
            color: var(--primary-navy);
        }

        .cta-button svg {
            margin-left: 0.5rem;
            transition: transform 300ms ease;
        }

        .cta-button:hover svg {
            transform: translateX(3px);
        }

        .slider-navigation {
            position: absolute;
            bottom: 8rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.75rem;
            z-index: 20;
        }

        .slider-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid transparent;
            transition: all 250ms ease;
            cursor: pointer;
        }

        .slider-dot.active {
            background: var(--text-light);
            border-color: var(--accent-gold);
        }

        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 2.5rem;
            height: 2.5rem;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            cursor: pointer;
            transition: all 250ms ease;
            z-index: 20;
        }

        .slider-arrow:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        .slider-arrow.prev { left: 1rem; }
        .slider-arrow.next { right: 1rem; }

        .search-form {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            transform: translateY(50%);
            z-index: 30;
            padding: 0 1rem;
        }

        .search-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            align-items: end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .form-label {
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            color: var(--primary-navy);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input, .form-select {
            font-family: 'Inter', sans-serif;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: border-color 200ms ease;
        }

        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary-navy);
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23666'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1rem;
            padding-right: 2.5rem;
        }

        .search-button {
            font-family: 'Inter', sans-serif;
            padding: 0.75rem 1.5rem;
            background: #312e81;
            color: white;
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 200ms ease;
        }

        .search-button:hover {
            background: #44436c;
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .content-wrapper {
            animation: slideInUp 0.6s ease-out;
        }

        /* Mobile optimizations */
        @media (max-width: 768px) {
            .hero-content {
                text-align: center;
                padding: 0 0.75rem;
            }

            .slider-arrow {
                display: none;
            }

            .slider-navigation {
                bottom: 6rem;
            }

            .search-container {
                padding: 1rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 0.75rem;
            }
        }

        @media (max-width: 640px) {
            .search-form {
                transform: translateY(40%);
            }

            .hero-title {
                margin-bottom: 0.75rem;
            }

            .hero-subtitle {
                margin-bottom: 1.25rem;
            }
        }

        @media (max-width: 480px) {
            .search-form {
                transform: translateY(35%);
            }

            .search-container {
                padding: 0.75rem;
                border-radius: 0.5rem;
            }
        }
    </style>

    <!-- Slider Container -->
    <div class="hero-slider relative w-full h-full">
        <!-- Slide 1 -->
        <div class="hero-slide active" style="background-image: url('/images/Hero/slider-01.webp');">
            <div class="hero-content">
                <div class="content-wrapper max-w-xl">
                    <h1 class="hero-title">
                        Build Your Team With<br>
                        <span style="color: var(--accent-gold);">Trusted Staffing Experts</span>
                    </h1>
                    <p class="hero-subtitle">
                        We connect top talent with leading companies, helping you grow stronger teams and achieve lasting success.
                    </p>
                    <a href="/about" class="cta-button">
                        Learn More
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="hero-slide" style="background-image: url('/images/Hero/slider-02.webp');">
            <div class="hero-content">
                <div class="content-wrapper max-w-xl">
                    <h1 class="hero-title">
                        Elevate Your Team<br>
                        <span style="color: var(--accent-gold);">Expert Staffing Solutions</span>
                    </h1>
                    <p class="hero-subtitle">
                        With relentless dedication to excellence, we specialize in connecting top-tier talent with leading companies.
                    </p>
                    <a href="/services" class="cta-button">
                        Our Services
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="hero-slide absolute inset-0 bg-cover bg-center bg-no-repeat transition-opacity duration-1000 opacity-0"
             style="background-image: url('/images/Hero/slider-03.webp');">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="relative z-10 flex flex-col justify-center h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div class="text-center lg:text-left">
                        <h1 class="hero-title text-white leading-tight mb-6">
                            Build Stronger Teams<br>
                            <span class="text-white">Empower People, Transform Workplaces</span>
                        </h1>
                        <p class="text-lg text-gray-200 mb-8 max-w-lg leading-relaxed">
                            From talent acquisition to workforce solutions, we help companies cultivate thriving cultures where employees feel valued, supported, and ready to excel
                        </p>
                        <div class="flex justify-center lg:justify-start">
                            <a href="/jobs" class="inline-flex items-center px-8 py-4 border-2 border-white text-white font-medium text-lg hover:bg-white hover:text-gray-900 transition duration-300 ease-in-out group">
                                Browse Jobs
                                <svg class="ml-3 w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Dots -->
        <div class="slider-navigation">
            <button class="slider-dot active" data-slide="0"></button>
            <button class="slider-dot" data-slide="1"></button>
            <button class="slider-dot" data-slide="2"></button>
        </div>

        <!-- Navigation Arrows -->
        <button class="slider-arrow prev" id="prevSlide">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <button class="slider-arrow next" id="nextSlide">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
        </button>
    </div>



    <livewire:hero-job-search />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.slider-dot');
            const prevBtn = document.getElementById('prevSlide');
            const nextBtn = document.getElementById('nextSlide');
            let currentSlide = 0;
            let autoPlayInterval;
            const slideSpeed = 20000;

            function showSlide(index) {
                slides.forEach((slide, i) => slide.classList.toggle('active', i === index));
                dots.forEach((dot, i) => dot.classList.toggle('active', i === index));
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
            }

            function startAutoPlay() {
                autoPlayInterval = setInterval(nextSlide, slideSpeed);
            }

            function stopAutoPlay() {
                clearInterval(autoPlayInterval);
            }

            nextBtn?.addEventListener('click', () => { nextSlide(); stopAutoPlay(); startAutoPlay(); });
            prevBtn?.addEventListener('click', () => { prevSlide(); stopAutoPlay(); startAutoPlay(); });

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentSlide = index;
                    showSlide(currentSlide);
                    stopAutoPlay();
                    startAutoPlay();
                });
            });

            let touchStartX = 0;
            const slider = document.querySelector('.hero-slider');

            slider.addEventListener('touchstart', e => touchStartX = e.changedTouches[0].screenX, { passive: true });
            slider.addEventListener('touchend', e => {
                const touchEndX = e.changedTouches[0].screenX;
                const diff = touchStartX - touchEndX;
                if (Math.abs(diff) > 50) {
                    diff > 0 ? nextSlide() : prevSlide();
                    stopAutoPlay();
                    startAutoPlay();
                }
            }, { passive: true });

            startAutoPlay();

            document.addEventListener('visibilitychange', () => {
                document.visibilityState === 'visible' ? startAutoPlay() : stopAutoPlay();
            });
        });
    </script>
</section>
