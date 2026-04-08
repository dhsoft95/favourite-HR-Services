<div>
    {{-- Hero Section --}}
    <section class="relative w-full hero-section">
        <style>
            :root {
                --primary-navy: #2A2D5A;
                --accent-red: #D2232A;
                --text-light: #f8fafc;
                --text-muted: #cbd5e1;
                --overlay: rgba(26, 35, 50, 0.55);
            }

            .hero-section {
                height: 75vh;
                min-height: 500px;
            }

            @media (max-width: 768px) {
                .hero-section {
                    height: auto;
                    min-height: unset;
                }
            }

            /* Slider */
            .hero-slider {
                position: relative;
                width: 100%;
                height: 75vh;
                min-height: 500px;
                overflow: hidden;
            }

            @media (max-width: 768px) {
                .hero-slider {
                    height: 60vh;
                    min-height: 400px;
                }
            }

            @media (max-width: 480px) {
                .hero-slider {
                    height: 55vh;
                    min-height: 360px;
                }
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

            /* Content */
            .hero-content {
                position: relative;
                z-index: 2;
                height: 100%;
                display: flex;
                align-items: center;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1.5rem;
            }

            @media (max-width: 768px) {
                .hero-content {
                    justify-content: center;
                    text-align: center;
                    padding: 0 1rem;
                    padding-bottom: 3rem;
                }
            }

            .content-wrapper {
                animation: slideInUp 0.6s ease-out;
                max-width: 560px;
            }

            @media (max-width: 768px) {
                .content-wrapper {
                    max-width: 100%;
                }
            }

            .hero-title {
                font-family: 'Inter', sans-serif;
                font-weight: 700;
                font-size: clamp(1.6rem, 4vw, 3.5rem);
                line-height: 1.15;
                color: var(--text-light);
                margin-bottom: 1rem;
            }

            .hero-subtitle {
                font-family: 'Inter', sans-serif;
                font-size: clamp(0.875rem, 2vw, 1.05rem);
                line-height: 1.6;
                color: var(--text-muted);
                font-weight: 300;
                margin-bottom: 1.5rem;
            }

            /* CTA Button */
            .cta-button {
                font-family: 'Inter', sans-serif;
                display: inline-flex;
                align-items: center;
                padding: 0.7rem 1.4rem;
                border: 2px solid var(--text-light);
                color: var(--text-light);
                font-weight: 500;
                font-size: 0.875rem;
                text-transform: uppercase;
                text-decoration: none;
                transition: all 300ms ease;
                position: relative;
                overflow: hidden;
                letter-spacing: 0.5px;
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

            .cta-button:hover::before { transform: translateX(0); }
            .cta-button:hover { color: var(--primary-navy); }
            .cta-button svg { margin-left: 0.5rem; transition: transform 300ms ease; }
            .cta-button:hover svg { transform: translateX(3px); }

            /* Slider dots */
            .slider-navigation {
                position: absolute;
                bottom: 1.5rem;
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
                border-color: var(--accent-red);
            }

            /* Arrows */
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

            .slider-arrow:hover { background: rgba(255, 255, 255, 0.28); }
            .slider-arrow.prev { left: 1rem; }
            .slider-arrow.next { right: 1rem; }

            @media (max-width: 768px) {
                .slider-arrow { display: none; }
            }

            /* Search form */
            .search-wrapper {
                background: #fff;
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
                border-radius: 0.75rem;
                padding: 1.5rem;
                max-width: 900px;
                margin: 0 auto;
                position: relative;
                z-index: 30;
                margin-top: -2.5rem;
                margin-left: 1rem;
                margin-right: 1rem;
            }

            @media (min-width: 769px) {
                .search-wrapper {
                    position: absolute;
                    bottom: 0;
                    left: 50%;
                    transform: translate(-50%, 50%);
                    width: calc(100% - 2rem);
                    margin-top: 0;
                }
            }

            @media (max-width: 480px) {
                .search-wrapper {
                    border-radius: 0.5rem;
                    padding: 1rem;
                    margin-top: -1.5rem;
                    margin-left: 0.75rem;
                    margin-right: 0.75rem;
                }
            }

            .form-grid {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr auto;
                gap: 1rem;
                align-items: end;
            }

            @media (max-width: 900px) {
                .form-grid {
                    grid-template-columns: 1fr 1fr;
                }
            }

            @media (max-width: 600px) {
                .form-grid {
                    grid-template-columns: 1fr;
                    gap: 0.75rem;
                }
            }

            .form-group {
                display: flex;
                flex-direction: column;
                gap: 0.25rem;
            }

            .form-label {
                font-family: 'Inter', sans-serif;
                font-weight: 600;
                color: var(--primary-navy);
                font-size: 0.7rem;
                text-transform: uppercase;
                letter-spacing: 0.6px;
            }

            .form-input,
            .form-select {
                font-family: 'Inter', sans-serif;
                padding: 0.75rem;
                border: 1px solid #e2e8f0;
                border-radius: 0.375rem;
                font-size: 0.875rem;
                transition: border-color 200ms ease;
                width: 100%;
                background: #fff;
                color: #1e293b;
            }

            /* Prevent iOS zoom on focus */
            @media (max-width: 768px) {
                .form-input,
                .form-select {
                    font-size: 16px;
                }
            }

            .form-input:focus,
            .form-select:focus {
                outline: none;
                border-color: var(--primary-navy);
                box-shadow: 0 0 0 3px rgba(42, 45, 90, 0.08);
            }

            .form-select {
                appearance: none;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23666'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
                background-repeat: no-repeat;
                background-position: right 0.75rem center;
                background-size: 1rem;
                padding-right: 2.5rem;
                cursor: pointer;
            }

            .search-button {
                font-family: 'Inter', sans-serif;
                padding: 0.75rem 1.75rem;
                background: var(--primary-navy);
                color: white;
                border: none;
                border-radius: 0.375rem;
                font-weight: 600;
                font-size: 0.875rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                cursor: pointer;
                transition: all 200ms ease;
                white-space: nowrap;
                width: 100%;
            }

            .search-button:hover { background: #1f2347; }
            .search-button:disabled { opacity: 0.7; cursor: not-allowed; }

            /* Page spacing after hero to account for search form overlap */
            .hero-spacer {
                height: 5rem;
            }

            @media (max-width: 768px) {
                .hero-spacer {
                    height: 1.5rem;
                }
            }

            @keyframes slideInUp {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>

        <!-- Slider -->
        <div class="hero-slider" id="heroSlider">

            <!-- Slide 1 -->
            <div class="hero-slide active" style="background-image: url('/images/Hero/slider-01.webp');">
                <div class="hero-content">
                    <div class="content-wrapper">
                        <h1 class="hero-title">
                            Build Your Team With<br>
                            <span style="color: var(--accent-red);">Trusted Staffing Experts</span>
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
                    <div class="content-wrapper">
                        <h1 class="hero-title">
                            Elevate Your Team<br>
                            <span style="color: var(--accent-red);">Expert Staffing Solutions</span>
                        </h1>
                        <p class="hero-subtitle">
                            With relentless dedication to excellence, we specialize in connecting top-tier talent with leading companies.
                        </p>
                        <a href="/solutions" class="cta-button">
                            Our Services
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="hero-slide" style="background-image: url('/images/Hero/slider-03.webp');">
                <div class="hero-content">
                    <div class="content-wrapper">
                        <h1 class="hero-title">
                            Build Stronger Teams,<br>
                            <span style="color: var(--accent-red);">Empower &amp; Transform</span>
                        </h1>
                        <p class="hero-subtitle">
                            From talent acquisition to workforce solutions, we help companies cultivate thriving cultures where employees feel valued and ready to excel.
                        </p>
                        <a href="/jobs" class="cta-button">
                            Browse Jobs
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Dots -->
            <div class="slider-navigation">
                <button class="slider-dot active" data-slide="0" aria-label="Slide 1"></button>
                <button class="slider-dot" data-slide="1" aria-label="Slide 2"></button>
                <button class="slider-dot" data-slide="2" aria-label="Slide 3"></button>
            </div>

            <!-- Arrows -->
            <button class="slider-arrow prev" id="prevSlide" aria-label="Previous slide">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button class="slider-arrow next" id="nextSlide" aria-label="Next slide">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        {{-- Search Form --}}
        <livewire:hero-job-search />
    </section>

    {{-- Spacer to push content below the overlapping search form --}}
    <div class="hero-spacer"></div>
</div>
