<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>The Mountain School | A Little World of Big Beginnings</title>
    
    <!-- Bootstrap 5.3 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts: Fredoka (Playful Bold Rounded Display) & Plus Jakarta Sans (Clean Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ==========================================================================
           DESIGN TOKENS & CORE COLOR PALETTE
           ========================================================================== */
        :root {
            --brand-pink: #E91E7E;
            --brand-pink-dark: #c91469;
            --brand-navy: #083B73;
            --brand-navy-dark: #052852;
            --brand-teal: #00B4D8;
            --brand-yellow: #FFB703;
            --surface-white: #FFFFFF;
            --surface-soft: #F8FAFC;
            --text-dark: #1E293B;
            --text-muted: #64748B;
            --border-light: #E2E8F0;
            --font-display: 'Fredoka', sans-serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-body);
            color: var(--text-dark);
            background-color: var(--surface-white);
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* ==========================================================================
           TYPOGRAPHY
           ========================================================================== */
        .font-display {
            font-family: var(--font-display);
            letter-spacing: 0.02em;
            text-transform: uppercase;
            line-height: 1.15;
        }

        .section-title {
            font-family: var(--font-display);
            font-weight: 700;
            font-size: clamp(1.45rem, 2.6vw, 2.15rem);
            text-transform: uppercase;
            letter-spacing: 0.03em;
            margin-bottom: 0;
        }

        .text-pink { color: var(--brand-pink) !important; }
        .text-navy { color: var(--brand-navy) !important; }
        .bg-pink { background-color: var(--brand-pink) !important; }
        .bg-navy { background-color: var(--brand-navy) !important; }

        /* ==========================================================================
           CUSTOM PILL BUTTONS
           ========================================================================== */
        .btn-pill {
            border-radius: 50rem;
            font-weight: 700;
            font-size: 0.82rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            padding: 0.6rem 1.45rem;
            transition: all 0.25s cubic-bezier(0.25, 0.8, 0.25, 1);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: 2px solid transparent;
        }

        .btn-pink {
            background-color: var(--brand-pink);
            color: #FFFFFF;
            box-shadow: 0 4px 14px rgba(233, 30, 126, 0.35);
        }
        .btn-pink:hover {
            background-color: var(--brand-pink-dark);
            color: #FFFFFF;
            transform: translateY(-2px);
        }

        .btn-white {
            background-color: #FFFFFF;
            color: var(--brand-navy);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }
        .btn-white:hover {
            background-color: #F1F5F9;
            color: var(--brand-pink);
            transform: translateY(-2px);
        }

        .btn-outline-white {
            background-color: transparent;
            color: #FFFFFF;
            border-color: rgba(255, 255, 255, 0.85);
        }
        .btn-outline-white:hover {
            background-color: #FFFFFF;
            color: var(--brand-pink);
            border-color: #FFFFFF;
        }

        .btn-outline-navy {
            background-color: transparent;
            color: var(--brand-navy);
            border-color: var(--brand-navy);
        }
        .btn-outline-navy:hover {
            background-color: var(--brand-navy);
            color: #FFFFFF;
        }

        .btn-outline-pink {
            background-color: transparent;
            color: var(--brand-pink);
            border-color: var(--brand-pink);
        }
        .btn-outline-pink:hover {
            background-color: var(--brand-pink);
            color: #FFFFFF;
        }

        /* ==========================================================================
           SUBTLE LINE-ART BACKGROUND DOODLE PATTERNS
           ========================================================================== */
        .doodle-bg-white-lines {
            background-image: url("data:image/svg+xml,%3Csvg width='180' height='180' viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23FFFFFF' stroke-opacity='0.09' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M25 35 L32 20 L39 35 L54 37 L42 47 L45 62 L32 54 L19 62 L22 47 L10 37 Z'/%3E%3Ccircle cx='135' cy='40' r='14'/%3E%3Cpath d='M127 40 Q135 48 143 40'/%3E%3Cpath d='M120 130 L150 118 L142 148 L133 136 Z'/%3E%3Cpath d='M35 135 C35 120, 60 120, 60 135 C60 148, 35 148, 35 135 Z'/%3E%3Cpath d='M85 80 L95 70 L105 80 L95 90 Z'/%3E%3Cpath d='M15 90 Q25 80 35 90 T55 90'/%3E%3C/g%3E%3C/svg%3E");
            background-repeat: repeat;
        }

        .doodle-bg-soft {
            background-image: url("data:image/svg+xml,%3Csvg width='180' height='180' viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23083B73' stroke-opacity='0.045' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M25 35 L32 20 L39 35 L54 37 L42 47 L45 62 L32 54 L19 62 L22 47 L10 37 Z'/%3E%3Ccircle cx='135' cy='40' r='14'/%3E%3Cpath d='M120 130 L150 118 L142 148 L133 136 Z'/%3E%3Cpath d='M35 135 C35 120, 60 120, 60 135 C60 148, 35 148, 35 135 Z'/%3E%3Cpath d='M85 80 L95 70 L105 80 L95 90 Z'/%3E%3C/g%3E%3C/svg%3E");
            background-repeat: repeat;
        }

        /* ==========================================================================
           SCALLOPED CLOUD SECTION DIVIDERS
           ========================================================================== */
        .cloud-wave-top, .cloud-wave-bottom {
            width: 100%;
            overflow: hidden;
            line-height: 0;
            position: relative;
            z-index: 2;
        }
        .cloud-wave-top svg, .cloud-wave-bottom svg {
            display: block;
            width: calc(100% + 2px);
            height: 46px;
        }
        @media (min-width: 768px) {
            .cloud-wave-top svg, .cloud-wave-bottom svg {
                height: 68px;
            }
        }

        /* Mascot Overlay Positioning */
        .mascot-float {
            position: relative;
            z-index: 10;
            pointer-events: none;
            user-select: none;
        }

        /* ==========================================================================
           1. TOP UTILITY BAR & NAVBAR
           ========================================================================== */
        .utility-bar {
            background-color: var(--brand-pink);
            color: #FFFFFF;
            font-size: 0.78rem;
            font-weight: 600;
            padding: 0.4rem 0;
        }
        .utility-bar a {
            color: #FFFFFF;
            text-decoration: none;
            transition: opacity 0.2s;
        }
        .utility-bar a:hover {
            opacity: 0.85;
        }

        .main-navbar {
            background-color: #FFFFFF;
            box-shadow: 0 4px 20px rgba(8, 59, 115, 0.08);
            padding: 0.55rem 0;
            z-index: 1030;
        }
        .brand-badge {
            background: #FFFFFF;
            border: 2px solid var(--brand-navy);
            border-radius: 12px;
            padding: 6px 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(8, 59, 115, 0.12);
        }
        .nav-link-custom {
            color: var(--brand-navy) !important;
            font-weight: 700;
            font-size: 0.86rem;
            padding: 0.5rem 0.85rem !important;
            transition: color 0.2s;
        }
        .nav-link-custom:hover {
            color: var(--brand-pink) !important;
        }

        /* ==========================================================================
           2. HERO SECTION
           ========================================================================== */
        .hero-section {
            position: relative;
            min-height: 540px;
            display: flex;
            align-items: center;
            background: url('https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=1920&q=80') center center / cover no-repeat;
            padding: 5rem 0 6.5rem;
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(15, 23, 42, 0.84) 0%, rgba(15, 23, 42, 0.58) 48%, rgba(15, 23, 42, 0.22) 100%);
        }
        .hero-title {
            font-family: var(--font-display);
            font-size: clamp(2.3rem, 4.8vw, 3.85rem);
            font-weight: 700;
            color: #FFFFFF;
            text-transform: uppercase;
            line-height: 1.08;
            text-shadow: 0 4px 18px rgba(0, 0, 0, 0.3);
        }
        .hero-dots {
            position: absolute;
            bottom: 3.4rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 5;
            display: flex;
            gap: 8px;
        }
        .hero-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.45);
            cursor: pointer;
            transition: all 0.2s;
        }
        .hero-dot.active {
            width: 26px;
            border-radius: 10px;
            background: #FFFFFF;
        }

        /* ==========================================================================
           VIDEO PLAY BUTTON OVERLAYS
           ========================================================================== */
        .video-card-wrapper {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 14px 32px rgba(0, 0, 0, 0.18);
            cursor: pointer;
        }
        .video-card-wrapper img {
            transition: transform 0.45s ease;
        }
        .video-card-wrapper:hover img {
            transform: scale(1.04);
        }
        .play-btn-circle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 62px;
            height: 62px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF;
            font-size: 1.5rem;
            box-shadow: 0 0 0 8px rgba(255, 255, 255, 0.28);
            transition: transform 0.25s ease;
        }
        .video-card-wrapper:hover .play-btn-circle {
            transform: translate(-50%, -50%) scale(1.1);
        }
        .play-teal { background-color: var(--brand-teal); }
        .play-pink { background-color: var(--brand-pink); }

        /* ==========================================================================
           STAGE & SIGNATURE CARDS
           ========================================================================== */
        .stage-card {
            background: #FFFFFF;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .stage-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 34px rgba(0, 0, 0, 0.18);
        }
        .stage-card-img {
            height: 185px;
            width: 100%;
            object-fit: cover;
        }
        .stage-card-body {
            padding: 1.25rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .slider-controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.5rem;
        }
        .slider-line-indicator {
            display: flex;
            gap: 6px;
        }
        .slider-line-indicator span {
            height: 4px;
            width: 24px;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.35);
        }
        .slider-line-indicator span.active {
            width: 42px;
            background: #FFFFFF;
        }
        .slider-arrow-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1.5px solid rgba(255, 255, 255, 0.65);
            background: transparent;
            color: #FFFFFF;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        .slider-arrow-btn:hover {
            background: #FFFFFF;
            color: var(--brand-pink);
        }
        .slider-arrow-btn.navy-variant {
            border-color: var(--brand-navy);
            color: var(--brand-navy);
        }
        .slider-arrow-btn.navy-variant:hover {
            background: var(--brand-navy);
            color: #FFFFFF;
        }

        /* ==========================================================================
           DAY AT THE MOUNTAIN CARDS
           ========================================================================== */
        .day-card {
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.22);
        }
        .day-card img {
            height: 220px;
            width: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .day-card:hover img {
            transform: scale(1.05);
        }

        /* ==========================================================================
           6. SAFETY 4x2 GRID
           ========================================================================== */
        .safety-grid-item {
            padding: 1.65rem 1.35rem;
            border-right: 1px solid var(--border-light);
            border-bottom: 1px solid var(--border-light);
            transition: background-color 0.25s ease;
        }
        .safety-grid-item:hover {
            background-color: #F8FAFC;
        }
        @media (min-width: 992px) {
            .safety-grid-item:nth-child(4n) {
                border-right: none;
            }
            .safety-grid-item:nth-child(n+5) {
                border-bottom: none;
            }
        }
        @media (max-width: 991.98px) {
            .safety-grid-item {
                border-right: none;
            }
        }
        .safety-icon-box {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background-color: rgba(8, 59, 115, 0.08);
            color: var(--brand-navy);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 0.9rem;
        }

        /* ==========================================================================
           7. BENTO CAMPUS GALLERY
           ========================================================================== */
        .bento-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(8, 59, 115, 0.1);
            transition: transform 0.35s ease;
        }
        .bento-img:hover {
            transform: scale(1.02);
        }

        /* ==========================================================================
           9. TESTIMONIAL CARDS
           ========================================================================== */
        .testimonial-card {
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 18px;
            padding: 1rem;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .testimonial-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 26px rgba(8, 59, 115, 0.1);
            background: #FFFFFF;
        }

        /* ==========================================================================
           10. EVENT DIARY & FAQ ACCORDION + ENQUIRY CARD
           ========================================================================== */
        .event-photo-card {
            border-radius: 14px;
            overflow: hidden;
            position: relative;
            aspect-ratio: 4 / 3;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.16);
        }
        .event-photo-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .event-photo-card:hover img {
            transform: scale(1.06);
        }
        .event-caption-badge {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(8, 59, 115, 0.88);
            color: #FFFFFF;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
        }

        /* Custom Pink Accordion */
        .pink-faq .accordion-item {
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 0;
        }
        .pink-faq .accordion-button {
            background: transparent;
            color: #FFFFFF;
            font-weight: 600;
            font-size: 0.92rem;
            padding: 1rem 0.25rem;
            box-shadow: none;
        }
        .pink-faq .accordion-button::after {
            background-image: none;
            content: '+';
            font-size: 1.35rem;
            font-weight: 700;
            color: #FFFFFF;
            width: auto;
            height: auto;
            transform: none !important;
        }
        .pink-faq .accordion-button:not(.collapsed)::after {
            content: '−';
        }
        .pink-faq .accordion-body {
            color: rgba(255, 255, 255, 0.92);
            font-size: 0.86rem;
            padding: 0 0.25rem 1rem;
        }

        /* Enquiry Card */
        .enquiry-form-card {
            background: #FFFFFF;
            border-radius: 22px;
            padding: 1.85rem;
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.18);
        }
        .enquiry-form-card .form-control,
        .enquiry-form-card .form-select {
            border-radius: 10px;
            border: 1.5px solid #E2E8F0;
            font-size: 0.85rem;
            padding: 0.6rem 0.85rem;
        }
        .enquiry-form-card .form-control:focus,
        .enquiry-form-card .form-select:focus {
            border-color: var(--brand-pink);
            box-shadow: 0 0 0 0.2rem rgba(233, 30, 126, 0.15);
        }

        /* ==========================================================================
           11. MAP STYLED CARD
           ========================================================================== */
        .campus-map-card {
            background: #E8F1F8;
            border-radius: 20px;
            border: 2px solid #CBD5E1;
            overflow: hidden;
            position: relative;
            min-height: 340px;
            box-shadow: 0 12px 28px rgba(8, 59, 115, 0.1);
        }

        /* ==========================================================================
           12. FOOTER & FLOATING WHATSAPP
           ========================================================================== */
        .footer-link {
            color: rgba(255, 255, 255, 0.82);
            text-decoration: none;
            font-size: 0.84rem;
            display: block;
            margin-bottom: 0.55rem;
            transition: color 0.2s, transform 0.2s;
        }
        .footer-link:hover {
            color: #FFFFFF;
            transform: translateX(3px);
        }
        .social-circle {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.12);
            color: #FFFFFF;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: background 0.2s;
        }
        .social-circle:hover {
            background: var(--brand-pink);
            color: #FFFFFF;
        }
        .whatsapp-float {
            position: fixed;
            bottom: 22px;
            right: 22px;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background-color: #25D366;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.65rem;
            box-shadow: 0 8px 22px rgba(37, 211, 102, 0.45);
            z-index: 1040;
            text-decoration: none;
            transition: transform 0.25s ease;
        }
        .whatsapp-float:hover {
            transform: scale(1.08);
            color: #FFFFFF;
        }
    </style>
</head>
<body>

    <!-- ========================================================================
         1. TOP UTILITY BAR & STICKY NAVBAR
         ======================================================================== -->
    <div class="utility-bar">
        <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="d-flex align-items-center gap-3">
                <a href="tel:+919876543210"><i class="bi bi-telephone-fill me-1"></i> +91 98765 43210</a>
                <span class="opacity-50 d-none d-sm-inline">|</span>
                <a href="mailto:admissions@themountainschool.edu" class="d-none d-sm-inline"><i class="bi bi-envelope-fill me-1"></i> admissions@themountainschool.edu</a>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-white text-pink rounded-pill px-2 py-1 fw-bold" style="font-size: 0.7rem;">Admissions Open 2026-27</span>
                @auth
                    <a href="{{ route('admin.news-events.index') }}" class="fw-bold"><i class="bi bi-speedometer2 me-1"></i> Admin Panel</a>
                @else
                    <a href="{{ route('login') }}"><i class="bi bi-lock-fill me-1"></i> Admin Login</a>
                @endauth
                <div class="d-none d-md-flex gap-2">
                    <a href="#footer" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#footer" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#footer" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg sticky-top main-navbar">
        <div class="container">
            <!-- Square School Emblem Logo -->
            <a class="navbar-brand p-0" href="{{ route('home') }}">
                <div class="brand-badge">
                    <svg width="34" height="34" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="8" fill="#083B73"/>
                        <path d="M7 29L16 14L22 23L27 17L33 29H7Z" fill="#E91E7E"/>
                        <circle cx="28" cy="11" r="3.5" fill="#FFB703"/>
                        <path d="M13 19L16 14L19 19H13Z" fill="#FFFFFF"/>
                    </svg>
                    <div class="lh-1">
                        <span class="d-block fw-extrabold text-navy" style="font-size: 0.72rem; letter-spacing: 0.05em;">THE</span>
                        <span class="d-block font-display text-pink" style="font-size: 0.98rem;">MOUNTAIN</span>
                        <span class="d-block fw-bold text-navy" style="font-size: 0.65rem; letter-spacing: 0.14em;">SCHOOL</span>
                    </div>
                </div>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#programs">Programs</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#curriculum">Curriculum</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#safety">Safety</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#campus">Campus</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#events">Events</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#location">Contact</a></li>
                </ul>
                <div class="d-flex">
                    <a href="#enquiry-section" class="btn btn-pill btn-pink">Enquire Now</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ========================================================================
         2. HERO SECTION
         ======================================================================== -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container position-relative z-3">
            <div class="row">
                <div class="col-lg-7 col-xl-6 text-white">
                    <span class="badge bg-pink text-white rounded-pill px-3 py-2 mb-3 fw-bold text-uppercase" style="letter-spacing: 0.06em; font-size: 0.72rem;">
                        Early Childhood Excellence
                    </span>
                    <h1 class="hero-title mb-3">
                        A LITTLE WORLD OF BIG BEGINNINGS
                    </h1>
                    <p class="lead text-white-50 mb-4 fw-medium" style="font-size: 1.05rem; max-width: 500px;">
                        Nurturing curiosity, confidence, and joyful discovery in a warm, child-centric environment designed for ages 1.8 to 6 years.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#enquiry-section" class="btn btn-pill btn-white">
                            Book a Campus Visit <i class="bi bi-arrow-right-circle-fill text-pink"></i>
                        </a>
                        <a href="#programs" class="btn btn-pill btn-outline-white">
                            Explore Stages
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel Indicator Dots -->
        <div class="hero-dots">
            <span class="hero-dot active"></span>
            <span class="hero-dot"></span>
            <span class="hero-dot"></span>
        </div>
    </section>

    <!-- ========================================================================
         3. VIBRANT PINK BAND (#E91E7E) + CLOUD TRANSITIONS + DOODLES
         ======================================================================== -->
    <!-- Top Scalloped Cloud Wave overlapping Hero bottom -->
    <div class="cloud-wave-top" style="margin-top: -45px; background: transparent;">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path fill="#E91E7E" d="M0,45 C40,15 95,15 135,45 C175,10 245,10 285,45 C330,12 395,12 440,45 C485,8 560,8 605,45 C650,15 715,15 760,45 C805,10 875,10 920,45 C965,14 1035,14 1080,45 C1125,8 1195,8 1240,45 C1290,15 1370,15 1440,42 L1440,80 L0,80 Z"/>
        </svg>
    </div>

    <section id="about" class="bg-pink doodle-bg-white-lines text-white pt-4 pb-5 position-relative">
        <div class="container position-relative">
            
            <!-- Mascot Standing at Top-Right Edge -->
            <div class="d-none d-lg-block position-absolute" style="top: -55px; right: 10px; z-index: 12;">
                <svg width="110" height="135" viewBox="0 0 120 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="42" cy="36" r="14" fill="#1E293B"/>
                    <circle cx="78" cy="36" r="14" fill="#1E293B"/>
                    <circle cx="60" cy="48" r="24" fill="#FDBA74"/>
                    <path d="M36 45 C36 25, 84 25, 84 45 C75 36, 45 36, 36 45 Z" fill="#1E293B"/>
                    <circle cx="52" cy="48" r="3" fill="#1E293B"/>
                    <circle cx="68" cy="48" r="3" fill="#1E293B"/>
                    <path d="M54 57 Q60 63 66 57" stroke="#E91E7E" stroke-width="2.5" stroke-linecap="round"/>
                    <path d="M42 74 L78 74 L84 112 L36 112 Z" fill="#083B73"/>
                    <path d="M52 74 L60 84 L68 74" fill="#FFFFFF"/>
                    <path d="M78 78 Q98 62 96 46" stroke="#FDBA74" stroke-width="8" stroke-linecap="round"/>
                    <path d="M42 78 L26 96" stroke="#FDBA74" stroke-width="8" stroke-linecap="round"/>
                    <rect x="47" y="112" width="8" height="22" rx="4" fill="#FDBA74"/>
                    <rect x="65" y="112" width="8" height="22" rx="4" fill="#FDBA74"/>
                    <rect x="43" y="130" width="14" height="8" rx="4" fill="#FFFFFF"/>
                    <rect x="63" y="130" width="14" height="8" rx="4" fill="#FFFFFF"/>
                </svg>
            </div>

            <!-- Intro Split: Left Video Card + Right Heading -->
            <div class="row align-items-center g-4 g-lg-5 mb-5">
                <div class="col-lg-6">
                    <div class="video-card-wrapper" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-title="Learning Begins With Wonder">
                        <img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=900&q=80" alt="Children learning together" class="img-fluid w-100" style="height: 330px; object-fit: cover;">
                        <div class="play-btn-circle play-teal">
                            <i class="bi bi-play-fill"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-5">
                    <h2 class="section-title text-white mb-3">
                        LEARNING BEGINS<br>WITH WONDER
                    </h2>
                    <p class="text-white opacity-90 mb-4" style="font-size: 0.96rem; line-height: 1.7;">
                        At The Mountain School, every day is an invitation to explore. Through hands-on play, storytelling, music, and guided discovery, we lay a joyful foundation for lifelong learning and emotional confidence.
                    </p>
                    <a href="#curriculum" class="btn btn-pill btn-outline-white">
                        Our Philosophy <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Center Display Tagline -->
            <div class="text-center my-5 py-2">
                <h2 class="font-display text-white mx-auto" style="font-size: clamp(1.65rem, 3.2vw, 2.5rem); max-width: 780px;">
                    A CHILDHOOD FILLED WITH WONDER, DISCOVERY AND POSSIBILITY.
                </h2>
            </div>

            <!-- Programs Carousel/Grid: THE RIGHT BEGINNING FOR EVERY STAGE -->
            <div id="programs" class="pt-3">
                <div class="text-center mb-4">
                    <span class="text-uppercase fw-bold small opacity-85" style="letter-spacing: 0.1em;">Age-Appropriate Pathways</span>
                    <h3 class="section-title text-white mt-1">THE RIGHT BEGINNING FOR EVERY STAGE</h3>
                </div>

                <div class="row g-4">
                    <!-- Card 1: Playgroup -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="stage-card">
                            <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&w=600&q=80" alt="Playgroup" class="stage-card-img">
                            <div class="stage-card-body">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="font-display text-navy mb-0" style="font-size: 1.15rem;">PLAYGROUP</h5>
                                        <span class="badge bg-pink text-white rounded-pill">1.8 – 2.5 Yrs</span>
                                    </div>
                                    <p class="text-muted small mb-3">
                                        Gentle sensory exploration, social bonding, music, and motor-skill play in a loving environment.
                                    </p>
                                </div>
                                <a href="#enquiry-section" class="text-pink fw-bold text-decoration-none small">
                                    Learn More <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Nursery -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="stage-card">
                            <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=600&q=80" alt="Nursery" class="stage-card-img">
                            <div class="stage-card-body">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="font-display text-navy mb-0" style="font-size: 1.15rem;">NURSERY</h5>
                                        <span class="badge bg-pink text-white rounded-pill">2.5 – 3.5 Yrs</span>
                                    </div>
                                    <p class="text-muted small mb-3">
                                        Language immersion, creative art, imaginative role-play, and early numeracy concepts.
                                    </p>
                                </div>
                                <a href="#enquiry-section" class="text-pink fw-bold text-decoration-none small">
                                    Learn More <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Junior KG -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="stage-card">
                            <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=600&q=80" alt="Junior KG" class="stage-card-img">
                            <div class="stage-card-body">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="font-display text-navy mb-0" style="font-size: 1.15rem;">JUNIOR KG</h5>
                                        <span class="badge bg-pink text-white rounded-pill">3.5 – 4.5 Yrs</span>
                                    </div>
                                    <p class="text-muted small mb-3">
                                        Phonics readiness, hands-on STEM curiosity, collaborative projects, and expressive confidence.
                                    </p>
                                </div>
                                <a href="#enquiry-section" class="text-pink fw-bold text-decoration-none small">
                                    Learn More <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Senior KG -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="stage-card">
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80" alt="Senior KG" class="stage-card-img">
                            <div class="stage-card-body">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="font-display text-navy mb-0" style="font-size: 1.15rem;">SENIOR KG</h5>
                                        <span class="badge bg-pink text-white rounded-pill">4.5 – 6.0 Yrs</span>
                                    </div>
                                    <p class="text-muted small mb-3">
                                        Critical thinking, fluent reading, logical math foundations, and seamless primary school readiness.
                                    </p>
                                </div>
                                <a href="#enquiry-section" class="text-pink fw-bold text-decoration-none small">
                                    Learn More <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Controls -->
                <div class="slider-controls">
                    <div class="slider-line-indicator">
                        <span class="active"></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="slider-arrow-btn" aria-label="Previous Stage"><i class="bi bi-arrow-left"></i></button>
                        <button class="slider-arrow-btn" aria-label="Next Stage"><i class="bi bi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom Scalloped Cloud Wave Pink -> White -->
    <div class="cloud-wave-bottom bg-pink">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path fill="#FFFFFF" d="M0,35 C55,68 115,68 170,35 C225,65 290,65 345,35 C400,70 470,70 525,35 C580,65 650,65 705,35 C760,70 830,70 885,35 C940,65 1010,65 1065,35 C1120,70 1190,70 1245,35 C1305,65 1380,65 1440,35 L1440,80 L0,80 Z"/>
        </svg>
    </div>

    <!-- ========================================================================
         4. WHITE SECTION: WHY THE MOUNTAIN SCHOOL
         ======================================================================== -->
    <section class="py-5 bg-white doodle-bg-soft position-relative">
        <div class="container position-relative">
            
            <!-- Cute Walking Boy Mascot Overlapping Pink-to-White Cloud Transition -->
            <div class="mascot-float d-none d-md-block" style="margin-top: -105px; margin-bottom: 10px;">
                <svg width="95" height="125" viewBox="0 0 110 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="55" cy="42" r="23" fill="#FDBA74"/>
                    <path d="M32 38 C32 18, 78 18, 78 38 C72 28, 38 28, 32 38 Z" fill="#0F172A"/>
                    <circle cx="48" cy="43" r="3" fill="#0F172A"/>
                    <circle cx="63" cy="43" r="3" fill="#0F172A"/>
                    <path d="M50 52 Q56 58 62 52" stroke="#E91E7E" stroke-width="2.5" stroke-linecap="round"/>
                    <rect x="30" y="68" width="14" height="32" rx="6" fill="#E91E7E"/>
                    <path d="M40 66 L70 66 L74 102 L36 102 Z" fill="#00B4D8"/>
                    <path d="M70 70 L86 86" stroke="#FDBA74" stroke-width="7" stroke-linecap="round"/>
                    <path d="M46 102 L38 126" stroke="#083B73" stroke-width="9" stroke-linecap="round"/>
                    <path d="M62 102 L72 124" stroke="#083B73" stroke-width="9" stroke-linecap="round"/>
                    <rect x="30" y="122" width="14" height="8" rx="4" fill="#E91E7E"/>
                    <rect x="66" y="120" width="14" height="8" rx="4" fill="#E91E7E"/>
                </svg>
            </div>

            <div class="text-center mb-5">
                <h2 class="section-title text-navy">WHY THE MOUNTAIN SCHOOL</h2>
            </div>

            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h3 class="font-display text-pink mb-3" style="font-size: clamp(1.5rem, 2.8vw, 2.2rem);">
                        EXPERIENTIAL LEARNING FOR HOLISTIC GROWTH
                    </h3>
                    <p class="text-muted mb-4" style="font-size: 0.98rem; line-height: 1.75;">
                        We blend the best of Montessori, Reggio Emilia, and modern early-childhood research. Children learn by touching, questioning, building, and collaborating—developing strong cognitive skills alongside empathy and resilience.
                    </p>
                    <a href="#curriculum" class="btn btn-pill btn-outline-navy">
                        Discover Our Approach <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <!-- Custom Vector Illustration of Two Cheerful Children Playing with Blocks & Paper Airplanes -->
                <div class="col-lg-6 text-center">
                    <svg class="img-fluid" style="max-height: 330px;" viewBox="0 0 520 360" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="260" cy="195" rx="220" ry="135" fill="#F1F5F9"/>
                        <path d="M85 110 C130 65, 200 65, 235 95" stroke="#E91E7E" stroke-width="3" stroke-dasharray="6 6" stroke-linecap="round"/>
                        <path d="M225 82 L268 78 L242 108 L236 95 Z" fill="#E91E7E"/>
                        <path d="M236 95 L268 78 L248 100 Z" fill="#083B73"/>
                        <circle cx="385" cy="70" r="22" fill="#FEF3C7"/>
                        <path d="M385 56 C377 56, 372 62, 372 69 C372 74, 375 77, 378 80 L392 80 C395 77, 398 74, 398 69 C398 62, 393 56, 385 56 Z" fill="#FFB703"/>
                        <rect x="380" y="82" width="10" height="5" rx="2" fill="#083B73"/>

                        <circle cx="185" cy="145" r="36" fill="#FDBA74"/>
                        <path d="M149 140 C149 108, 221 108, 221 140 C210 124, 160 124, 149 140 Z" fill="#0F172A"/>
                        <circle cx="174" cy="146" r="4" fill="#0F172A"/>
                        <circle cx="196" cy="146" r="4" fill="#0F172A"/>
                        <path d="M177 160 Q185 168 193 160" stroke="#E91E7E" stroke-width="3.5" stroke-linecap="round"/>
                        <path d="M155 184 L215 184 L225 255 L145 255 Z" fill="#00B4D8"/>

                        <circle cx="315" cy="155" r="34" fill="#FDBA74"/>
                        <circle cx="283" cy="135" r="16" fill="#0F172A"/>
                        <circle cx="347" cy="135" r="16" fill="#0F172A"/>
                        <path d="M281 150 C281 120, 349 120, 349 150 C338 134, 292 134, 281 150 Z" fill="#0F172A"/>
                        <circle cx="304" cy="156" r="4" fill="#0F172A"/>
                        <circle cx="326" cy="156" r="4" fill="#0F172A"/>
                        <path d="M307 169 Q315 177 323 169" stroke="#E91E7E" stroke-width="3.5" stroke-linecap="round"/>
                        <path d="M288 192 L342 192 L352 255 L278 255 Z" fill="#083B73"/>

                        <rect x="85" y="255" width="75" height="16" rx="5" fill="#E91E7E"/>
                        <rect x="90" y="239" width="68" height="16" rx="5" fill="#FFB703"/>
                        <rect x="82" y="271" width="82" height="16" rx="5" fill="#083B73"/>

                        <rect x="195" y="252" width="38" height="38" rx="8" fill="#FFB703"/>
                        <text x="207" y="278" fill="#083B73" font-family="Fredoka" font-weight="bold" font-size="20">A</text>
                        <rect x="238" y="252" width="38" height="38" rx="8" fill="#E91E7E"/>
                        <text x="250" y="278" fill="#FFFFFF" font-family="Fredoka" font-weight="bold" font-size="20">B</text>
                        <rect x="216" y="214" width="38" height="38" rx="8" fill="#00B4D8"/>
                        <text x="228" y="240" fill="#FFFFFF" font-family="Fredoka" font-weight="bold" font-size="20">C</text>

                        <rect x="335" y="262" width="95" height="24" rx="6" fill="#FFFFFF" stroke="#CBD5E1" stroke-width="2"/>
                        <rect x="440" y="245" width="10" height="42" rx="4" transform="rotate(15 440 245)" fill="#E91E7E"/>
                        <rect x="454" y="248" width="10" height="42" rx="4" transform="rotate(-10 454 248)" fill="#FFB703"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
         5. DEEP NAVY BLUE BAND (#083B73) + CLOUD TRANSITIONS + DOODLES
         ======================================================================== -->
    <div class="cloud-wave-top bg-white">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path fill="#083B73" d="M0,45 C45,12 105,12 150,45 C195,10 265,10 310,45 C355,14 425,14 470,45 C515,8 585,8 630,45 C675,14 745,14 790,45 C835,10 905,10 950,45 C995,14 1065,14 1110,45 C1155,8 1225,8 1270,45 C1320,14 1385,14 1440,42 L1440,80 L0,80 Z"/>
        </svg>
    </div>

    <section id="curriculum" class="bg-navy doodle-bg-white-lines text-white py-5">
        <div class="container">
            
            <!-- Subsection A: A DAY AT THE MOUNTAIN -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <h2 class="section-title text-white">A DAY AT THE MOUNTAIN</h2>
                <a href="#campus" class="btn btn-pill btn-white">View Daily Routine</a>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="day-card mb-3">
                        <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=700&q=80" alt="Morning Circle Time">
                    </div>
                    <h5 class="font-display text-white mb-1" style="font-size: 1.05rem;">MORNING CIRCLE TIME</h5>
                    <p class="text-white-50 small mb-0">Warm greetings, rhythm songs, weather talk, and mindful breathing to start the day joyfully.</p>
                </div>

                <div class="col-md-4">
                    <div class="day-card mb-3">
                        <img src="https://images.unsplash.com/photo-1560785496-3c9d27877182?auto=format&fit=crop&w=700&q=80" alt="Hands-On Play & Discovery">
                    </div>
                    <h5 class="font-display text-white mb-1" style="font-size: 1.05rem;">HANDS-ON PLAY &amp; DISCOVERY</h5>
                    <p class="text-white-50 small mb-0">Tactile Montessori stations, block engineering, and guided sensory exploration.</p>
                </div>

                <div class="col-md-4">
                    <div class="day-card mb-3">
                        <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&w=700&q=80" alt="Creative Expression">
                    </div>
                    <h5 class="font-display text-white mb-1" style="font-size: 1.05rem;">CREATIVE EXPRESSION</h5>
                    <p class="text-white-50 small mb-0">Painting, clay sculpting, puppet theatre, and imaginative storytelling workshops.</p>
                </div>
            </div>

            <!-- Slider Controls -->
            <div class="slider-controls mb-5 pb-3">
                <div class="slider-line-indicator">
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="d-flex gap-2">
                    <button class="slider-arrow-btn" aria-label="Previous Activity"><i class="bi bi-arrow-left"></i></button>
                    <button class="slider-arrow-btn" aria-label="Next Activity"><i class="bi bi-arrow-right"></i></button>
                </div>
            </div>

            <!-- Subsection B: SIGNATURE PROGRAMMES -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4 pt-2">
                <h2 class="section-title text-white">SIGNATURE PROGRAMMES</h2>
                <a href="#enquiry-section" class="btn btn-pill btn-white">Download Brochure</a>
            </div>

            <div class="row g-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="stage-card">
                        <img src="https://images.unsplash.com/photo-1596464716127-f2a82984de30?auto=format&fit=crop&w=600&q=80" alt="Little Explorers STEM" class="stage-card-img">
                        <div class="stage-card-body">
                            <div>
                                <h6 class="font-display text-navy mb-2">LITTLE EXPLORERS STEM</h6>
                                <p class="text-muted small mb-3">Early coding logic, nature science experiments, and hands-on building labs.</p>
                            </div>
                            <a href="#enquiry-section" class="text-pink fw-bold text-decoration-none small">Explore <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="stage-card">
                        <img src="https://images.unsplash.com/photo-1511629091441-ee46146481b6?auto=format&fit=crop&w=600&q=80" alt="Rhythm & Movement" class="stage-card-img">
                        <div class="stage-card-body">
                            <div>
                                <h6 class="font-display text-navy mb-2">RHYTHM &amp; MOVEMENT</h6>
                                <p class="text-muted small mb-3">Music, expressive dance, yoga, and gross-motor coordination sessions.</p>
                            </div>
                            <a href="#enquiry-section" class="text-pink fw-bold text-decoration-none small">Explore <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="stage-card">
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=600&q=80" alt="Global Storytellers" class="stage-card-img">
                        <div class="stage-card-body">
                            <div>
                                <h6 class="font-display text-navy mb-2">GLOBAL STORYTELLERS</h6>
                                <p class="text-muted small mb-3">Bilingual phonics, public speaking confidence, and interactive reading corners.</p>
                            </div>
                            <a href="#enquiry-section" class="text-pink fw-bold text-decoration-none small">Explore <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="stage-card">
                        <img src="https://images.unsplash.com/photo-1542810634-71277d95dcbb?auto=format&fit=crop&w=600&q=80" alt="Eco-Champions Lab" class="stage-card-img">
                        <div class="stage-card-body">
                            <div>
                                <h6 class="font-display text-navy mb-2">ECO-CHAMPIONS LAB</h6>
                                <p class="text-muted small mb-3">Organic gardening, sustainability habits, and outdoor sensory nature walks.</p>
                            </div>
                            <a href="#enquiry-section" class="text-pink fw-bold text-decoration-none small">Explore <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-controls">
                <div class="slider-line-indicator">
                    <span class="active"></span>
                    <span></span>
                </div>
                <div class="d-flex gap-2">
                    <button class="slider-arrow-btn" aria-label="Previous Programme"><i class="bi bi-arrow-left"></i></button>
                    <button class="slider-arrow-btn" aria-label="Next Programme"><i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom Scalloped Cloud Wave Navy -> White -->
    <div class="cloud-wave-bottom bg-navy">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path fill="#FFFFFF" d="M0,38 C55,70 115,70 170,38 C225,68 290,68 345,38 C400,72 470,72 525,38 C580,68 650,68 705,38 C760,72 830,72 885,38 C940,68 1010,68 1065,38 C1120,72 1190,72 1245,38 C1305,68 1380,68 1440,38 L1440,80 L0,80 Z"/>
        </svg>
    </div>

    <!-- ========================================================================
         6. WHITE SAFETY SECTION: HOW WE KEEP YOUR CHILD SAFE
         ======================================================================== -->
    <section id="safety" class="py-5 bg-white position-relative">
        <div class="container position-relative">
            
            <!-- Cute Waving Girl Mascot Overlapping Navy-to-White Cloud Transition -->
            <div class="mascot-float d-none d-md-block" style="margin-top: -110px; margin-bottom: 5px; margin-left: 4%;">
                <svg width="105" height="130" viewBox="0 0 120 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="42" cy="36" r="14" fill="#1E293B"/>
                    <circle cx="78" cy="36" r="14" fill="#1E293B"/>
                    <circle cx="60" cy="48" r="24" fill="#FDBA74"/>
                    <path d="M36 45 C36 24, 84 24, 84 45 C74 34, 46 34, 36 45 Z" fill="#1E293B"/>
                    <circle cx="52" cy="48" r="3" fill="#1E293B"/>
                    <circle cx="68" cy="48" r="3" fill="#1E293B"/>
                    <path d="M53 57 Q60 64 67 57" stroke="#E91E7E" stroke-width="2.5" stroke-linecap="round"/>
                    <path d="M40 74 L80 74 L86 112 L34 112 Z" fill="#083B73"/>
                    <path d="M24 62 Q32 76 42 78" stroke="#FDBA74" stroke-width="8" stroke-linecap="round"/>
                    <path d="M96 62 Q88 76 78 78" stroke="#FDBA74" stroke-width="8" stroke-linecap="round"/>
                    <rect x="47" y="112" width="8" height="20" rx="4" fill="#FDBA74"/>
                    <rect x="65" y="112" width="8" height="20" rx="4" fill="#FDBA74"/>
                    <rect x="43" y="128" width="14" height="8" rx="4" fill="#E91E7E"/>
                    <rect x="63" y="128" width="14" height="8" rx="4" fill="#E91E7E"/>
                </svg>
            </div>

            <div class="text-center mb-5">
                <h2 class="section-title text-navy">HOW WE KEEP<br>YOUR CHILD SAFE</h2>
            </div>

            <!-- 4x2 Safety Grid -->
            <div class="row g-0 border rounded-4 overflow-hidden shadow-sm bg-white">
                <div class="col-sm-6 col-lg-3 safety-grid-item">
                    <div class="safety-icon-box"><i class="bi bi-camera-video-fill"></i></div>
                    <h6 class="fw-bold text-navy mb-2">24/7 CCTV Surveillance</h6>
                    <p class="text-muted small mb-0">High-definition monitored coverage across all classrooms, corridors, and play zones.</p>
                </div>
                <div class="col-sm-6 col-lg-3 safety-grid-item">
                    <div class="safety-icon-box"><i class="bi bi-shield-check"></i></div>
                    <h6 class="fw-bold text-navy mb-2">Child-Safe Infrastructure</h6>
                    <p class="text-muted small mb-0">Rounded furniture edges, anti-skid flooring, finger-guard doors, and non-toxic materials.</p>
                </div>
                <div class="col-sm-6 col-lg-3 safety-grid-item">
                    <div class="safety-icon-box"><i class="bi bi-person-badge-fill"></i></div>
                    <h6 class="fw-bold text-navy mb-2">Trained &amp; Verified Staff</h6>
                    <p class="text-muted small mb-0">100% background-verified educators and female support staff trained in pediatric care.</p>
                </div>
                <div class="col-sm-6 col-lg-3 safety-grid-item">
                    <div class="safety-icon-box"><i class="bi bi-qr-code-scan"></i></div>
                    <h6 class="fw-bold text-navy mb-2">Strict Visitor Protocol</h6>
                    <p class="text-muted small mb-0">Digital gate-pass verification and authorized parent pick-up ID cards for every child.</p>
                </div>
                <div class="col-sm-6 col-lg-3 safety-grid-item">
                    <div class="safety-icon-box"><i class="bi bi-bus-front-fill"></i></div>
                    <h6 class="fw-bold text-navy mb-2">GPS-Enabled Transport</h6>
                    <p class="text-muted small mb-0">Live bus tracking, speed governors, and dedicated female attendants on every route.</p>
                </div>
                <div class="col-sm-6 col-lg-3 safety-grid-item">
                    <div class="safety-icon-box"><i class="bi bi-droplet-fill"></i></div>
                    <h6 class="fw-bold text-navy mb-2">Hygienic &amp; Sanitized Campus</h6>
                    <p class="text-muted small mb-0">Daily eco-friendly sanitization of toys, washrooms, and HEPA air-purified learning rooms.</p>
                </div>
                <div class="col-sm-6 col-lg-3 safety-grid-item">
                    <div class="safety-icon-box"><i class="bi bi-heart-pulse-fill"></i></div>
                    <h6 class="fw-bold text-navy mb-2">On-Campus Medical Care</h6>
                    <p class="text-muted small mb-0">Dedicated infirmary room with first-aid certified staff and tie-ups with nearby pediatricians.</p>
                </div>
                <div class="col-sm-6 col-lg-3 safety-grid-item">
                    <div class="safety-icon-box"><i class="bi bi-fire"></i></div>
                    <h6 class="fw-bold text-navy mb-2">Fire &amp; Emergency Readiness</h6>
                    <p class="text-muted small mb-0">Certified fire suppression systems, clear evacuation exits, and regular safety drills.</p>
                </div>
            </div>

            <div class="text-center mt-4 pt-2">
                <a href="#enquiry-section" class="btn btn-pill btn-outline-pink">
                    View Full Safety Policy <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ========================================================================
         7. WHITE CAMPUS GALLERY & PRINCIPAL'S NOTE
         ======================================================================== -->
    <section id="campus" class="py-5 bg-white doodle-bg-soft">
        <div class="container">
            
            <!-- Campus Collage Header -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <h2 class="section-title text-navy">DESIGNED FOR CURIOUS MINDS</h2>
                <a href="#location" class="btn btn-pill btn-pink">Schedule a Tour</a>
            </div>

            <!-- Asymmetric Bento Photo Collage -->
            <div class="row g-3 mb-5 pb-4">
                <div class="col-lg-5">
                    <img src="https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=800&q=80" alt="Bright Interactive Classroom" class="bento-img" style="min-height: 320px;">
                </div>

                <div class="col-lg-4">
                    <div class="row g-3 h-100">
                        <div class="col-6">
                            <img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=500&q=80" alt="Reading Corner" class="bento-img" style="height: 152px;">
                        </div>
                        <div class="col-6">
                            <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&w=500&q=80" alt="Sensory Play" class="bento-img" style="height: 152px;">
                        </div>
                        <div class="col-6">
                            <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&w=500&q=80" alt="Art Studio" class="bento-img" style="height: 152px;">
                        </div>
                        <div class="col-6">
                            <img src="https://images.unsplash.com/photo-1560785496-3c9d27877182?auto=format&fit=crop&w=500&q=80" alt="Block Play" class="bento-img" style="height: 152px;">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=600&q=80" alt="Soft Play Tunnel" class="bento-img" style="min-height: 320px;">
                </div>

                <div class="col-md-6">
                    <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=900&q=80" alt="Outdoor Turf Play Area" class="bento-img" style="height: 185px;">
                </div>
                <div class="col-md-6">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=900&q=80" alt="Discovery & Library Lounge" class="bento-img" style="height: 185px;">
                </div>
            </div>

            <!-- Principal's Message Split: THE VISION BEHIND THE MOUNTAIN EXPERIENCE -->
            <div class="row align-items-center g-4 g-lg-5 pt-2">
                <div class="col-lg-5">
                    <div class="video-card-wrapper" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-title="Principal's Message - The Vision Behind The Mountain Experience">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=800&q=80" alt="Principal Message" class="img-fluid w-100" style="height: 310px; object-fit: cover;">
                        <div class="play-btn-circle play-teal">
                            <i class="bi bi-play-fill"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h2 class="section-title text-navy mb-3">
                        THE VISION BEHIND<br>THE MOUNTAIN EXPERIENCE
                    </h2>
                    <p class="text-muted mb-3" style="font-size: 0.96rem; line-height: 1.75;">
                        "Every child arrives with an innate sense of awe. Our mission is not to rush childhood, but to protect its magic—giving young learners the freedom to ask bold questions, make friends, and build character with kindness."
                    </p>
                    <p class="fw-bold text-navy mb-4 small">
                        — Dr. Meera Nair, Founder &amp; Academic Director
                    </p>
                    <a href="#enquiry-section" class="btn btn-pill btn-outline-navy">
                        Read Leadership Note <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
         8. COMPACT DEEP NAVY CTA BANNER (#083B73)
         ======================================================================== -->
    <section class="bg-navy text-white py-4 position-relative my-3">
        <div class="container position-relative">
            <div class="row align-items-center g-3">
                <div class="col-lg-7">
                    <h3 class="font-display text-white mb-1" style="font-size: clamp(1.2rem, 2.2vw, 1.65rem);">
                        READY TO GIVE YOUR CHILD A JOYFUL START?
                    </h3>
                    <p class="text-white-50 small mb-0 fw-semibold">
                        Admissions Open for Academic Year 2026–27 across Playgroup, Nursery, Junior KG &amp; Senior KG.
                    </p>
                </div>
                <div class="col-lg-3 d-flex flex-column gap-2">
                    <a href="#enquiry-section" class="btn btn-pill btn-white justify-content-center py-2">
                        Apply Online Now
                    </a>
                    <a href="#location" class="btn btn-pill btn-pink justify-content-center py-2">
                        Book Campus Visit
                    </a>
                </div>
                <!-- Cute Cartoon Boy Mascot Peeking on Right Edge -->
                <div class="col-lg-2 d-none d-lg-flex justify-content-end">
                    <svg width="95" height="105" viewBox="0 0 110 120" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-top: -35px; margin-bottom: -24px;">
                        <circle cx="55" cy="45" r="24" fill="#FDBA74"/>
                        <path d="M31 41 C31 20, 79 20, 79 41 C72 30, 38 30, 31 41 Z" fill="#0F172A"/>
                        <circle cx="47" cy="46" r="3" fill="#0F172A"/>
                        <circle cx="63" cy="46" r="3" fill="#0F172A"/>
                        <path d="M49 55 Q55 61 61 55" stroke="#E91E7E" stroke-width="2.5" stroke-linecap="round"/>
                        <path d="M36 72 L74 72 L80 105 L30 105 Z" fill="#00B4D8"/>
                        <rect x="34" y="92" width="18" height="18" rx="4" fill="#FFB703"/>
                        <rect x="56" y="92" width="18" height="18" rx="4" fill="#E91E7E"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
         9. WHITE TESTIMONIALS SECTION: WHAT PARENTS SAY
         ======================================================================== -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <h2 class="section-title text-navy">WHAT PARENTS SAY</h2>
                <a href="#enquiry-section" class="btn btn-pill btn-pink">Share Your Story</a>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card h-100">
                        <div class="video-card-wrapper mb-3" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-title="Parent Story - Ananya & Rohan Sharma">
                            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=600&q=80" alt="Parent Testimonial 1" class="w-100" style="height: 205px; object-fit: cover;">
                            <div class="play-btn-circle play-pink" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                <i class="bi bi-play-fill"></i>
                            </div>
                        </div>
                        <h6 class="fw-bold text-navy mb-0">Ananya &amp; Rohan Sharma</h6>
                        <span class="text-pink fw-semibold d-block mb-2" style="font-size: 0.78rem;">Parents of Aarav (Nursery)</span>
                        <p class="text-muted small mb-0">
                            "Aarav wakes up excited for school every morning! The teachers are extraordinarily warm, attentive, and creative."
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimonial-card h-100">
                        <div class="video-card-wrapper mb-3" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-title="Parent Story - Vikramaditya Menon">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80" alt="Parent Testimonial 2" class="w-100" style="height: 205px; object-fit: cover;">
                            <div class="play-btn-circle play-pink" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                <i class="bi bi-play-fill"></i>
                            </div>
                        </div>
                        <h6 class="fw-bold text-navy mb-0">Vikramaditya Menon</h6>
                        <span class="text-pink fw-semibold d-block mb-2" style="font-size: 0.78rem;">Father of Diya (Junior KG)</span>
                        <p class="text-muted small mb-0">
                            "The balance between structured phonics and hands-on play has transformed Diya's confidence and communication skills."
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimonial-card h-100">
                        <div class="video-card-wrapper mb-3" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-title="Parent Story - Priya Deshmukh">
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&q=80" alt="Parent Testimonial 3" class="w-100" style="height: 205px; object-fit: cover;">
                            <div class="play-btn-circle play-pink" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                <i class="bi bi-play-fill"></i>
                            </div>
                        </div>
                        <h6 class="fw-bold text-navy mb-0">Priya Deshmukh</h6>
                        <span class="text-pink fw-semibold d-block mb-2" style="font-size: 0.78rem;">Mother of Kabir (Senior KG)</span>
                        <p class="text-muted small mb-0">
                            "From hygiene and campus safety to individual attention, The Mountain School feels like an extended family."
                        </p>
                    </div>
                </div>
            </div>

            <div class="slider-controls">
                <div class="slider-line-indicator">
                    <span class="active" style="background: var(--brand-pink);"></span>
                    <span style="background: #CBD5E1;"></span>
                    <span style="background: #CBD5E1;"></span>
                </div>
                <div class="d-flex gap-2">
                    <button class="slider-arrow-btn navy-variant" aria-label="Previous Testimonial"><i class="bi bi-arrow-left"></i></button>
                    <button class="slider-arrow-btn navy-variant" aria-label="Next Testimonial"><i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
         10. VIBRANT PINK BAND (#E91E7E): DYNAMIC NEWS & EVENT DIARY + FAQ & ENQUIRY FORM
         ======================================================================== -->
    <div class="cloud-wave-top bg-white">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path fill="#E91E7E" d="M0,45 C45,12 105,12 150,45 C195,10 265,10 310,45 C355,14 425,14 470,45 C515,8 585,8 630,45 C675,14 745,14 790,45 C835,10 905,10 950,45 C995,14 1065,14 1110,45 C1155,8 1225,8 1270,45 C1320,14 1385,14 1440,42 L1440,80 L0,80 Z"/>
        </svg>
    </div>

    <section id="events" class="bg-pink doodle-bg-white-lines text-white py-5 position-relative">
        <div class="container position-relative">
            
            <!-- Cute Celebrating Boy Mascot Sitting on Top Cloud Transition -->
            <div class="text-center mascot-float d-none d-md-block" style="margin-top: -115px; margin-bottom: 10px;">
                <svg width="105" height="125" viewBox="0 0 120 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="60" cy="44" r="23" fill="#FDBA74"/>
                    <path d="M37 40 C37 20, 83 20, 83 40 C75 30, 45 30, 37 40 Z" fill="#0F172A"/>
                    <circle cx="52" cy="45" r="3" fill="#0F172A"/>
                    <circle cx="68" cy="45" r="3" fill="#0F172A"/>
                    <path d="M53 54 Q60 61 67 54" stroke="#E91E7E" stroke-width="2.5" stroke-linecap="round"/>
                    <path d="M40 72 L22 50" stroke="#FDBA74" stroke-width="8" stroke-linecap="round"/>
                    <path d="M80 72 L98 50" stroke="#FDBA74" stroke-width="8" stroke-linecap="round"/>
                    <path d="M42 70 L78 70 L84 106 L36 106 Z" fill="#083B73"/>
                    <path d="M44 106 L32 124" stroke="#00B4D8" stroke-width="9" stroke-linecap="round"/>
                    <path d="M76 106 L88 124" stroke="#00B4D8" stroke-width="9" stroke-linecap="round"/>
                </svg>
            </div>

            <!-- Subsection A: THE EVENT DIARY (Dynamic Laravel Loop) -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <h2 class="section-title text-white">THE EVENT DIARY</h2>
                <a href="{{ route('news-events.index') }}" class="btn btn-pill btn-white">View All Events</a>
            </div>

            <div class="row g-4">
                @forelse($latestNewsEvents as $item)
                    <div class="col-md-4">
                        <div class="stage-card">
                            <div class="position-relative">
                                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="stage-card-img">
                                <span class="badge bg-navy text-white rounded-pill position-absolute top-0 start-0 m-3">
                                    {{ $item->category }}
                                </span>
                            </div>
                            <div class="stage-card-body">
                                <div>
                                    <small class="text-pink fw-bold d-block mb-1">
                                        <i class="bi bi-calendar3 me-1"></i> {{ $item->event_date->format('d M Y') }}
                                    </small>
                                    <h5 class="font-display text-navy mb-2" style="font-size: 1.1rem;">
                                        <a href="{{ route('news-events.show', $item->slug) }}" class="text-navy text-decoration-none">
                                            {{ $item->title }}
                                        </a>
                                    </h5>
                                    <p class="text-muted small mb-3">{{ Str::limit($item->short_description, 110) }}</p>
                                </div>
                                <a href="{{ route('news-events.show', $item->slug) }}" class="text-pink fw-bold text-decoration-none small">
                                    Read Full Story <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-white-50">No news or events published yet.</p>
                    </div>
                @endforelse
            </div>

            <div class="slider-controls mb-5 pb-3">
                <div class="slider-line-indicator">
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="d-flex gap-2">
                    <button class="slider-arrow-btn" aria-label="Previous Events"><i class="bi bi-arrow-left"></i></button>
                    <button class="slider-arrow-btn" aria-label="Next Events"><i class="bi bi-arrow-right"></i></button>
                </div>
            </div>

            <!-- Subsection B: FAQ & QUICK ENQUIRY FORM -->
            <div id="enquiry-section" class="row g-5 pt-2 align-items-start">
                <!-- Left Column: CLEAR YOUR DOUBTS HERE -->
                <div class="col-lg-6">
                    <h2 class="section-title text-white mb-4">CLEAR YOUR DOUBTS HERE</h2>
                    <div class="accordion pink-faq" id="schoolFaqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What is the age criteria for admission in 2026-27?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Playgroup welcomes children aged 1.8 to 2.5 years, Nursery from 2.5 to 3.5 years, Junior KG from 3.5 to 4.5 years, and Senior KG from 4.5 to 6.0 years as of March 31, 2026.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    What is the student-to-teacher ratio in each classroom?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    We maintain an intimate 10:1 student-to-educator ratio in Playgroup and 12:1 in Kindergarten, supported by a dedicated female teaching assistant in every room.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    How do you help first-time toddlers settle in smoothly?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Our gentle 2-week Settling-In Transition allows parents to accompany their child during shorter orientation hours until the child feels completely secure and joyful.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Is school transport available with GPS tracking?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Yes! Air-conditioned, GPS-enabled school buses cover all major residential neighborhoods with live parent app tracking and a trained female bus attendant.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    How do parents receive daily updates on their child's progress?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Parents receive daily activity snapshots, meal/nap logs, and weekly learning portfolios through our secure Parent Connect mobile portal.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                    Do you offer extended day-care or after-school enrichment?
                                </button>
                            </h2>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Yes, our supervised Extended Care &amp; Hobby Club operates until 6:00 PM with nutritious snacks, rest corners, and creative play.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                    Can we visit the campus before submitting an application?
                                </button>
                            </h2>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Absolutely! Fill out the Quick Enquiry Form on the right to schedule a personalized guided tour with our Admissions Counselor.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: QUICK ENQUIRY FORM (Wired to Laravel Backend) -->
                <div class="col-lg-6">
                    <h2 class="section-title text-white mb-4">QUICK ENQUIRY FORM</h2>
                    <div class="enquiry-form-card text-dark">
                        <div class="text-center mb-3">
                            <h5 class="font-display text-navy mb-1">START YOUR CHILD'S JOURNEY</h5>
                            <p class="text-muted small mb-0">Fill in the details below and our admissions team will reach out shortly.</p>
                        </div>

                        <div id="enquiryAlertBox" class="alert d-none py-2 px-3 small rounded-3 mb-3"></div>

                        <form id="admissionEnquiryForm" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold text-navy mb-1">Parent's Name *</label>
                                    <input type="text" name="parent_name" id="parent_name" class="form-control" placeholder="e.g. Rajesh Verma">
                                    <div class="invalid-feedback" id="error-parent_name"></div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold text-navy mb-1">Student's Name *</label>
                                    <input type="text" name="student_name" id="student_name" class="form-control" placeholder="e.g. Aarav Verma">
                                    <div class="invalid-feedback" id="error-student_name"></div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold text-navy mb-1">Class Applying For *</label>
                                    <select name="class_applying_for" id="class_applying_for" class="form-select">
                                        <option value="" selected disabled>Choose Class / Stage...</option>
                                        <option value="Playgroup">Playgroup (1.8 – 2.5 Years)</option>
                                        <option value="Nursery">Nursery (2.5 – 3.5 Years)</option>
                                        <option value="Junior KG">Junior KG (3.5 – 4.5 Years)</option>
                                        <option value="Senior KG">Senior KG (4.5 – 6.0 Years)</option>
                                    </select>
                                    <div class="invalid-feedback" id="error-class_applying_for"></div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold text-navy mb-1">Mobile Number (10-digit) *</label>
                                    <input type="tel" name="mobile" id="mobile" class="form-control" maxlength="10" placeholder="e.g. 9876543210">
                                    <div class="invalid-feedback" id="error-mobile"></div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold text-navy mb-1">Email Address (Optional)</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="parent@example.com">
                                    <div class="invalid-feedback" id="error-email"></div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold text-navy mb-1">Message (Optional)</label>
                                    <textarea name="message" id="message" class="form-control" rows="2" placeholder="Any specific questions or preferred campus visit date..."></textarea>
                                    <div class="invalid-feedback" id="error-message"></div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" id="enquirySubmitBtn" class="btn btn-pill btn-pink w-100 justify-content-center py-2">
                                        <span>Submit Enquiry</span> <i class="bi bi-send-fill ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom Scalloped Cloud Wave Pink -> White -->
    <div class="cloud-wave-bottom bg-pink">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path fill="#FFFFFF" d="M0,38 C55,70 115,70 170,38 C225,68 290,68 345,38 C400,72 470,72 525,38 C580,68 650,68 705,38 C760,72 830,72 885,38 C940,68 1010,68 1065,38 C1120,72 1190,72 1245,38 C1305,68 1380,68 1440,38 L1440,80 L0,80 Z"/>
        </svg>
    </div>

    <!-- ========================================================================
         11. WHITE LOCATION & CAMPUS VISIT SECTION: COME AND SEE THE CAMPUS
         ======================================================================== -->
    <section id="location" class="py-5 bg-white position-relative">
        <div class="container position-relative">
            
            <!-- Cute Thinking Boy Mascot Standing on Pink-to-White Cloud Transition -->
            <div class="mascot-float d-none d-md-block" style="margin-top: -115px; margin-bottom: 10px; margin-left: 16%;">
                <svg width="95" height="125" viewBox="0 0 110 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="84" cy="24" r="10" fill="#FEF3C7"/>
                    <path d="M84 17 V27 M84 30 V31" stroke="#FFB703" stroke-width="2.5" stroke-linecap="round"/>
                    <circle cx="52" cy="44" r="22" fill="#FDBA74"/>
                    <path d="M30 40 C30 20, 74 20, 74 40 C67 30, 37 30, 30 40 Z" fill="#0F172A"/>
                    <circle cx="45" cy="45" r="3" fill="#0F172A"/>
                    <circle cx="60" cy="45" r="3" fill="#0F172A"/>
                    <circle cx="54" cy="54" r="2.5" fill="#E91E7E"/>
                    <path d="M36 68 L68 68 L72 104 L32 104 Z" fill="#083B73"/>
                    <path d="M68 72 L64 58" stroke="#FDBA74" stroke-width="7" stroke-linecap="round"/>
                    <rect x="40" y="104" width="9" height="24" rx="4" fill="#00B4D8"/>
                    <rect x="55" y="104" width="9" height="24" rx="4" fill="#00B4D8"/>
                </svg>
            </div>

            <h2 class="section-title text-navy mb-4">COME AND SEE THE CAMPUS</h2>

            <div class="row g-4 align-items-stretch">
                <!-- Left Column: Campus Facade Photo + Contact Details -->
                <div class="col-lg-6">
                    <div class="rounded-4 overflow-hidden shadow-sm mb-4">
                        <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=900&q=80" alt="The Mountain School Campus Building" class="w-100" style="height: 225px; object-fit: cover;">
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="fw-bold text-navy mb-1"><i class="bi bi-geo-alt-fill text-pink me-1"></i> Campus Address</h6>
                            <p class="text-muted small mb-3">
                                Plot 42, Green Meadows Avenue,<br>
                                Sector 18, HSR Layout,<br>
                                Bengaluru – 560102
                            </p>
                            <h6 class="fw-bold text-navy mb-1"><i class="bi bi-clock-fill text-pink me-1"></i> Visiting Hours</h6>
                            <p class="text-muted small mb-0">
                                Mon – Sat: 9:00 AM to 5:30 PM
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="fw-bold text-navy mb-1"><i class="bi bi-telephone-fill text-pink me-1"></i> Admissions Helpline</h6>
                            <p class="text-muted small mb-3">
                                +91 98765 43210<br>
                                +91 80 4123 9876
                            </p>
                            <h6 class="fw-bold text-navy mb-1"><i class="bi bi-envelope-fill text-pink me-1"></i> Email Us</h6>
                            <p class="text-muted small mb-0">
                                admissions@themountainschool.edu
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Styled Interactive Map Card -->
                <div class="col-lg-6">
                    <div class="campus-map-card h-100 d-flex flex-column justify-content-between p-4">
                        <svg class="position-absolute inset-0 w-100 h-100" style="top:0; left:0; z-index: 1;" viewBox="0 0 600 400" preserveAspectRatio="xMidYMid slice">
                            <rect width="600" height="400" fill="#EDF2F7"/>
                            <rect x="40" y="40" width="140" height="110" rx="18" fill="#DCFCE7"/>
                            <rect x="410" y="230" width="150" height="130" rx="22" fill="#DCFCE7"/>
                            <path d="M0 180 L600 120" stroke="#FFFFFF" stroke-width="18"/>
                            <path d="M210 0 L290 400" stroke="#FFFFFF" stroke-width="22"/>
                            <path d="M0 310 L600 270" stroke="#FFFFFF" stroke-width="14"/>
                            <path d="M430 0 L380 400" stroke="#FFFFFF" stroke-width="14"/>
                            <text x="225" y="95" fill="#64748B" font-size="11" font-weight="600" transform="rotate(78 225 95)">GREEN MEADOWS AVE</text>
                            <text x="65" y="172" fill="#64748B" font-size="11" font-weight="600" transform="rotate(-6 65 172)">27TH MAIN ROAD</text>
                            <circle cx="315" cy="185" r="28" fill="#E91E7E" fill-opacity="0.18"/>
                            <path d="M315 142 C300 142, 288 154, 288 169 C288 189, 315 212, 315 212 C315 212, 342 189, 342 169 C342 154, 330 142, 315 142 Z" fill="#E91E7E"/>
                            <circle cx="315" cy="168" r="9" fill="#FFFFFF"/>
                        </svg>

                        <div class="position-relative z-2 bg-white rounded-4 p-3 shadow-sm d-inline-block" style="max-width: 280px;">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-pink rounded-pill">Main Campus</span>
                                <span class="text-warning small fw-bold"><i class="bi bi-star-fill"></i> 4.9 (240+ Reviews)</span>
                            </div>
                            <h6 class="fw-bold text-navy mb-1">The Mountain School</h6>
                            <p class="text-muted mb-0" style="font-size: 0.76rem;">Sector 18, HSR Layout • Easy Drop-off &amp; Parent Parking Available</p>
                        </div>

                        <div class="position-relative z-2 d-flex justify-content-end mt-auto pt-5">
                            <a href="https://maps.google.com" target="_blank" rel="noopener noreferrer" class="btn btn-pill btn-navy bg-navy text-white shadow">
                                <i class="bi bi-compass-fill text-pink"></i> Open in Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
         12. DEEP NAVY FOOTER (#083B73) WITH TOP SCALLOPED CLOUD WAVE
         ======================================================================== -->
    <div class="cloud-wave-top bg-white mt-4">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path fill="#083B73" d="M0,45 C45,12 105,12 150,45 C195,10 265,10 310,45 C355,14 425,14 470,45 C515,8 585,8 630,45 C675,14 745,14 790,45 C835,10 905,10 950,45 C995,14 1065,14 1110,45 C1155,8 1225,8 1270,45 C1320,14 1385,14 1440,42 L1440,80 L0,80 Z"/>
        </svg>
    </div>

    <footer id="footer" class="bg-navy doodle-bg-white-lines text-white pt-4 pb-4 position-relative">
        <div class="container position-relative">
            
            <!-- Cute Reading Boy & Girl Mascots on Left and Right Edges of Top Cloud Wave -->
            <div class="d-none d-lg-flex justify-content-between mascot-float" style="margin-top: -105px; margin-bottom: 12px;">
                <svg width="95" height="95" viewBox="0 0 110 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="52" cy="40" r="20" fill="#FDBA74"/>
                    <path d="M32 36 C32 18, 72 18, 72 36 C65 27, 39 27, 32 36 Z" fill="#0F172A"/>
                    <circle cx="46" cy="42" r="2.5" fill="#0F172A"/>
                    <circle cx="59" cy="42" r="2.5" fill="#0F172A"/>
                    <path d="M26 70 L52 76 L78 70 L78 92 L52 98 L26 92 Z" fill="#FFFFFF"/>
                    <path d="M52 76 V98" stroke="#E91E7E" stroke-width="2.5"/>
                </svg>

                <svg width="95" height="95" viewBox="0 0 110 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="38" cy="30" r="11" fill="#0F172A"/>
                    <circle cx="72" cy="30" r="11" fill="#0F172A"/>
                    <circle cx="55" cy="40" r="20" fill="#FDBA74"/>
                    <path d="M35 36 C35 18, 75 18, 75 36 C68 27, 42 27, 35 36 Z" fill="#0F172A"/>
                    <circle cx="49" cy="42" r="2.5" fill="#0F172A"/>
                    <circle cx="62" cy="42" r="2.5" fill="#0F172A"/>
                    <path d="M29 70 L55 76 L81 70 L81 92 L55 98 L29 92 Z" fill="#FFB703"/>
                    <path d="M55 76 V98" stroke="#083B73" stroke-width="2.5"/>
                </svg>
            </div>

            <!-- 5-Column Footer Layout -->
            <div class="row g-4 pb-4 border-bottom border-white border-opacity-10">
                <div class="col-lg-3">
                    <div class="brand-badge mb-3">
                        <svg width="30" height="30" viewBox="0 0 40 40" fill="none">
                            <rect width="40" height="40" rx="8" fill="#083B73"/>
                            <path d="M7 29L16 14L22 23L27 17L33 29H7Z" fill="#E91E7E"/>
                            <circle cx="28" cy="11" r="3.5" fill="#FFB703"/>
                        </svg>
                        <div class="lh-1">
                            <span class="d-block font-display text-pink" style="font-size: 0.92rem;">THE MOUNTAIN</span>
                            <span class="d-block fw-bold text-navy" style="font-size: 0.62rem; letter-spacing: 0.14em;">SCHOOL</span>
                        </div>
                    </div>
                    <p class="text-white-50 small mb-3">
                        Nurturing young minds through joyful exploration, safe spaces, and holistic early-childhood education.
                    </p>
                    <div class="d-flex gap-2">
                        <a href="#" class="social-circle" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-circle" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-circle" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="social-circle" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <h6 class="font-display text-white mb-3" style="font-size: 0.95rem;">QUICK LINKS</h6>
                    <a href="#about" class="footer-link">About Us</a>
                    <a href="#curriculum" class="footer-link">Our Philosophy</a>
                    <a href="#safety" class="footer-link">Child Safety</a>
                    <a href="#campus" class="footer-link">Campus Gallery</a>
                    <a href="{{ route('news-events.index') }}" class="footer-link">News &amp; Events</a>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <h6 class="font-display text-white mb-3" style="font-size: 0.95rem;">PROGRAMS</h6>
                    <a href="#programs" class="footer-link">Playgroup</a>
                    <a href="#programs" class="footer-link">Nursery</a>
                    <a href="#programs" class="footer-link">Junior KG</a>
                    <a href="#programs" class="footer-link">Senior KG</a>
                    <a href="#curriculum" class="footer-link">After-School Care</a>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <h6 class="font-display text-white mb-3" style="font-size: 0.95rem;">ADMISSIONS</h6>
                    <a href="#enquiry-section" class="footer-link">Admission Process</a>
                    <a href="#enquiry-section" class="footer-link">Age Criteria</a>
                    <a href="#location" class="footer-link">Book a Campus Tour</a>
                    <a href="#enquiry-section" class="footer-link">Parent FAQs</a>
                    <a href="#location" class="footer-link">Contact Office</a>
                </div>

                <div class="col-6 col-md-3 col-lg-3">
                    <h6 class="font-display text-white mb-3" style="font-size: 0.95rem;">STAY CONNECTED</h6>
                    <p class="text-white-50 small mb-3">
                        Get our 2026–27 curriculum guide &amp; event calendar delivered to your inbox.
                    </p>
                    <a href="#enquiry-section" class="btn btn-pill btn-white">
                        Enquire Now <i class="bi bi-arrow-right text-pink"></i>
                    </a>
                </div>
            </div>

            <!-- Copyright Bar -->
            <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 text-white-50" style="font-size: 0.78rem;">
                <div>© 2026 The Mountain School. All Rights Reserved.</div>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white-50 text-decoration-none">Privacy Policy</a>
                    <a href="#" class="text-white-50 text-decoration-none">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Chat Button -->
    <a href="https://wa.me/919876543210" target="_blank" rel="noopener noreferrer" class="whatsapp-float" aria-label="Chat on WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- ========================================================================
         INTERACTIVE VIDEO PREVIEW MODAL
         ======================================================================== -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 overflow-hidden border-0">
                <div class="modal-header bg-navy text-white border-0">
                    <h6 class="modal-title font-display" id="videoModalTitle">Campus Video Showcase</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 bg-dark text-center text-white">
                    <div class="ratio ratio-16x9 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #083B73, #E91E7E);">
                        <div class="d-flex flex-column align-items-center justify-content-center p-4">
                            <i class="bi bi-play-circle-fill display-1 mb-3 text-white"></i>
                            <h5 class="font-display mb-2" id="videoModalInnerTitle">Experience The Mountain School</h5>
                            <p class="small text-white-50 mb-0" style="max-width: 440px;">
                                Discover how our educators nurture joyful curiosity, creativity, and confidence every single day.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Dynamic Video Modal Title Handling
        const videoModal = document.getElementById('videoModal');
        if (videoModal) {
            videoModal.addEventListener('show.bs.modal', function (event) {
                const trigger = event.relatedTarget;
                const title = trigger ? trigger.getAttribute('data-video-title') : 'Campus Video Showcase';
                document.getElementById('videoModalTitle').textContent = title;
                document.getElementById('videoModalInnerTitle').textContent = title;
            });
        }

        // AJAX Admission Enquiry Form Submission
        document.getElementById('admissionEnquiryForm')?.addEventListener('submit', async function (e) {
            e.preventDefault();

            const form = this;
            const submitBtn = document.getElementById('enquirySubmitBtn');
            const alertBox = document.getElementById('enquiryAlertBox');

            alertBox.className = 'alert d-none py-2 px-3 small rounded-3 mb-3';
            form.querySelectorAll('.form-control, .form-select').forEach(el => el.classList.remove('is-invalid'));
            form.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Submitting...';

            try {
                const formData = new FormData(form);
                const response = await fetch("{{ route('enquiries.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok) {
                    alertBox.className = 'alert alert-success py-2 px-3 small rounded-3 mb-3';
                    alertBox.innerHTML = `<i class="bi bi-check-circle-fill me-1"></i> ${data.message}`;
                    form.reset();
                } else if (response.status === 422 && data.errors) {
                    Object.entries(data.errors).forEach(([field, messages]) => {
                        const input = document.getElementById(field);
                        const errorDiv = document.getElementById(`error-${field}`);
                        if (input) input.classList.add('is-invalid');
                        if (errorDiv) errorDiv.textContent = messages[0];
                    });
                } else {
                    alertBox.className = 'alert alert-warning py-2 px-3 small rounded-3 mb-3';
                    alertBox.innerHTML = `<i class="bi bi-exclamation-triangle-fill me-1"></i> ${data.message || 'Unable to process your enquiry.'}`;
                }
            } catch (error) {
                alertBox.className = 'alert alert-danger py-2 px-3 small rounded-3 mb-3';
                alertBox.textContent = 'Network error. Please check your connection and try again.';
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<span>Submit Enquiry</span> <i class="bi bi-send-fill ms-1"></i>';
            }
        });
    </script>
</body>
</html>