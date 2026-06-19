<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        use App\Models\Setting;
        use App\Models\SeoMeta;
        $seo = SeoMeta::getForPage(request()->route()->getName() ?? 'home');
        $siteName = Setting::get('college_name', "K.T.S.P.M's Law College, Khopoli");
    @endphp

    <title>{{ $seo?->meta_title ?? ($title ?? 'Home') }} | {{ $siteName }}</title>
    <meta name="description" content="{{ $seo?->meta_description ?? '' }}">
    <meta name="keywords" content="{{ $seo?->meta_keywords ?? '' }}">
    @if($seo?->canonical_url)
        <link rel="canonical" href="{{ $seo->canonical_url }}">
    @endif
    <meta property="og:title" content="{{ $seo?->og_title ?? ($title ?? $siteName) }}">
    <meta property="og:description" content="{{ $seo?->og_description ?? '' }}">
    @if($seo?->og_image)
        <meta property="og:image" content="{{ asset('storage/' . $seo->og_image) }}">
    @endif
    <meta property="og:type" content="website">

    <link rel="icon" type="image/png" href="{{ Setting::get('favicon') ? asset('storage/' . Setting::get('favicon')) : asset('images/favicon.png') }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts: Plus Jakarta Sans + Fraunces -->
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,600;0,9..144,700;1,9..144,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animations -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- GLightbox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

    <style>
        :root {
            --primary: #162450;
            --primary-light: #1e3368;
            --primary-dark: #0a1228;
            --secondary: #C8973A;
            --secondary-light: #e0b057;
            --accent: #8B1A1A;
            --dark: #0a1020;
            --light: #FAFAF8;
            --gray: #6c757d;
            --body-bg: #ffffff;
            --card-radius: 16px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #2d2d2d;
            background: var(--body-bg);
            line-height: 1.7;
            font-size: 15px;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Fraunces', serif;
            font-weight: 600;
            line-height: 1.3;
        }

        /* ── Top Bar ───────────────────────────────── */
        .topbar {
            background: var(--primary);
            padding: 6px 0;
            font-size: 12.5px;
            font-weight: 500;
            letter-spacing: 0.01em;
        }
        .topbar a { color: rgba(255,255,255,.8); text-decoration: none; transition: var(--transition); }
        .topbar a:hover { color: #fff; }
        .topbar .divider { color: rgba(255,255,255,.3); margin: 0 12px; }
        .topbar .social-link {
            display: inline-flex; align-items: center; justify-content: center;
            width: 26px; height: 26px; border-radius: 50%;
            background: rgba(255,255,255,.12); color: rgba(255,255,255,.8);
            font-size: 12px; transition: var(--transition); text-decoration: none;
        }
        .topbar .social-link:hover { background: var(--secondary); color: #fff; }

        /* ── Navbar ────────────────────────────────── */
        .main-nav {
            background: var(--dark) !important;
            padding: 0;
            transition: var(--transition);
            border-bottom: 1px solid rgba(255,255,255,.05);
        }
        .main-nav.scrolled {
            background: rgba(15,23,41,.97) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 4px 30px rgba(0,0,0,.35);
        }
        .navbar-brand { padding: 10px 0; }
        .navbar-brand img { height: 56px; width: auto; }
        .brand-logo-placeholder {
            width: 52px; height: 52px; border-radius: 50%;
            background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
            display: flex; align-items: center; justify-content: center;
            font-size: 20px; font-weight: 700; color: #fff;
            font-family: 'Fraunces', serif;
        }
        .college-name {
            font-family: 'Fraunces', serif;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            line-height: 1.25;
        }
        .college-name small {
            display: block;
            font-size: .78rem;
            font-weight: 400;
            color: rgba(255,255,255,.6);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .nav-link-item {
            color: rgba(255,255,255,.8) !important;
            font-weight: 500;
            font-size: .88rem;
            padding: 20px 11px !important;
            letter-spacing: 0.02em;
            transition: var(--transition);
            position: relative;
        }
        .nav-link-item::after {
            content: '';
            position: absolute; bottom: 0; left: 50%; right: 50%;
            height: 2px; background: var(--secondary);
            transition: var(--transition);
        }
        .nav-link-item:hover::after,
        .nav-link-item.active::after { left: 8px; right: 8px; }
        .nav-link-item:hover,
        .nav-link-item.active { color: #fff !important; }

        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 40px rgba(0,0,0,.18);
            padding: 8px;
            min-width: 210px;
            margin-top: 4px !important;
        }
        .dropdown-item {
            border-radius: 8px;
            padding: 9px 14px;
            font-size: .875rem;
            font-weight: 500;
            color: #2d2d2d;
            transition: var(--transition);
        }
        .dropdown-item:hover {
            background: rgba(22,36,80,.07);
            color: var(--primary);
        }
        .dropdown-header {
            font-size: .7rem;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--gray);
            padding: 6px 14px 4px;
        }

        .btn-apply-nav {
            background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
            color: #fff !important;
            border-radius: 8px;
            padding: 8px 18px !important;
            margin: 10px 0 10px 8px;
            font-size: .84rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            box-shadow: 0 2px 10px rgba(200,151,58,.3);
            transition: var(--transition);
        }
        .btn-apply-nav:hover {
            background: linear-gradient(135deg, #a57a2a, var(--secondary));
            box-shadow: 0 4px 18px rgba(200,151,58,.45);
            transform: translateY(-1px);
        }
        .btn-apply-nav::after { display: none !important; }

        /* ── Admission Banner ──────────────────────── */
        .admission-ticker {
            background: linear-gradient(90deg, var(--secondary) 0%, var(--secondary-light) 100%);
            color: #fff;
            padding: 9px 0;
            font-size: 13.5px;
            font-weight: 600;
            letter-spacing: 0.01em;
        }
        .admission-ticker a { color: #fff; font-weight: 700; }

        /* ── Page Banner ───────────────────────────── */
        .page-banner {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 50%, var(--accent) 100%);
            color: #fff;
            padding: 70px 0 60px;
            position: relative;
            overflow: hidden;
        }
        .page-banner::before {
            content: '';
            position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .page-banner h1 { font-size: 2.4rem; }
        .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,.5); }
        .breadcrumb-item a { color: var(--secondary); text-decoration: none; }
        .breadcrumb-item.active { color: rgba(255,255,255,.75); }

        /* ── Section Titles ────────────────────────── */
        .section-label {
            display: inline-block;
            background: rgba(22,36,80,.08);
            color: var(--primary);
            font-size: 11.5px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 20px;
            margin-bottom: 12px;
        }
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 0;
        }
        .section-title .highlight { color: var(--primary); }
        .section-subtitle {
            color: var(--gray);
            font-size: .95rem;
            margin-top: 10px;
        }
        .title-divider {
            width: 50px; height: 3px;
            background: linear-gradient(90deg, var(--secondary), var(--secondary-light));
            border-radius: 2px;
            margin-top: 14px;
        }
        .title-divider.center { margin-left: auto; margin-right: auto; }

        /* ── Cards ─────────────────────────────────── */
        .card-modern {
            border: none;
            border-radius: var(--card-radius);
            box-shadow: 0 2px 20px rgba(0,0,0,.06);
            transition: var(--transition);
            overflow: hidden;
        }
        .card-modern:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(0,0,0,.12);
        }

        /* ── Course Card ───────────────────────────── */
        .course-card {
            border: none;
            border-radius: var(--card-radius);
            overflow: hidden;
            box-shadow: 0 2px 16px rgba(0,0,0,.06);
            transition: var(--transition);
            background: #fff;
        }
        .course-card:hover { transform: translateY(-6px); box-shadow: 0 14px 40px rgba(0,0,0,.12); }
        .course-card .course-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 22px 20px 18px;
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .course-card .course-header::after {
            content: '';
            position: absolute; right: -20px; top: -20px;
            width: 100px; height: 100px;
            border-radius: 50%;
            background: rgba(255,255,255,.07);
        }

        /* ── Faculty Card ──────────────────────────── */
        .faculty-card {
            border: none;
            border-radius: var(--card-radius);
            text-align: center;
            box-shadow: 0 2px 16px rgba(0,0,0,.06);
            transition: var(--transition);
            background: #fff;
            padding: 20px 14px;
        }
        .faculty-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,.1); }
        .faculty-avatar {
            width: 90px; height: 90px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--secondary);
            margin: 0 auto 12px;
            display: block;
        }
        .faculty-avatar-placeholder {
            width: 90px; height: 90px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex; align-items: center; justify-content: center;
            font-size: 2rem; font-weight: 700; color: #fff;
            margin: 0 auto 12px;
            border: 3px solid var(--secondary);
            font-family: 'Fraunces', serif;
        }

        /* ── Notice Board ──────────────────────────── */
        .notice-board {
            background: linear-gradient(160deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: var(--card-radius);
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .notice-board::before {
            content: '';
            position: absolute; right: -30px; top: -30px;
            width: 160px; height: 160px;
            border-radius: 50%;
            background: rgba(255,255,255,.04);
        }
        .notice-item {
            border-bottom: 1px solid rgba(255,255,255,.1);
            padding: 11px 0;
            transition: var(--transition);
        }
        .notice-item:last-child { border-bottom: none; }
        .notice-item:hover { padding-left: 6px; }

        /* ── Footer ────────────────────────────────── */
        footer {
            background: var(--dark);
            color: rgba(255,255,255,.6);
        }
        footer .footer-brand h4 {
            font-family: 'Fraunces', serif;
            color: #fff;
            font-size: 1.2rem;
        }
        footer .footer-heading {
            color: #fff;
            font-size: .85rem;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255,255,255,.08);
        }
        footer a {
            color: rgba(255,255,255,.55);
            text-decoration: none;
            font-size: .875rem;
            transition: var(--transition);
            display: block;
            padding: 3px 0;
        }
        footer a:hover { color: var(--secondary); padding-left: 4px; }
        .footer-divider { border-color: rgba(255,255,255,.07); }
        .footer-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(255,255,255,.06);
            border-radius: 8px;
            padding: 8px 14px;
            font-size: .8rem;
            color: rgba(255,255,255,.7);
        }
        .footer-badge i { color: var(--secondary); }

        /* ── Utility ───────────────────────────────── */
        .text-primary-c { color: var(--primary) !important; }
        .text-secondary-c { color: var(--secondary) !important; }
        .bg-primary-c { background-color: var(--primary) !important; }
        .bg-light-c { background-color: var(--light) !important; }
        .btn-primary-c {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff; border: none;
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 600; font-size: .875rem;
            transition: var(--transition);
            letter-spacing: 0.01em;
        }
        .btn-primary-c:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(22,36,80,.3);
        }
        .btn-secondary-c {
            background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
            color: #fff; border: none;
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 600; font-size: .875rem;
            transition: var(--transition);
        }
        .btn-secondary-c:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(200,151,58,.35);
            color: #fff;
        }
        .btn-outline-primary-c {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
            border-radius: 10px;
            padding: 9px 22px;
            font-weight: 600; font-size: .875rem;
            transition: var(--transition);
        }
        .btn-outline-primary-c:hover {
            background: var(--primary);
            color: #fff;
            transform: translateY(-2px);
        }

        /* ── WhatsApp ──────────────────────────────── */
        .whatsapp-float {
            position: fixed; bottom: 28px; right: 28px; z-index: 9999;
        }
        .whatsapp-float a {
            background: #25D366;
            color: #fff;
            width: 54px; height: 54px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 26px;
            box-shadow: 0 4px 20px rgba(37,211,102,.4);
            text-decoration: none;
            animation: wpulse 2.5s infinite;
            transition: var(--transition);
        }
        .whatsapp-float a:hover { transform: scale(1.1); }
        @keyframes wpulse {
            0%,100%{ box-shadow: 0 4px 20px rgba(37,211,102,.4); }
            50%{ box-shadow: 0 4px 30px rgba(37,211,102,.7); }
        }

        /* ── Responsive ────────────────────────────── */
        @media (max-width: 991px) {
            .main-nav .nav-link-item { padding: 11px 8px !important; }
            .main-nav .nav-link-item::after { display: none; }
            .btn-apply-nav { margin: 5px 0 10px; }
        }

        /* ══════════════════════════════════════════════
           Grand Page Loader
        ══════════════════════════════════════════════ */
        #pageLoader {
            position: fixed; inset: 0; z-index: 99999;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            overflow: hidden;
            transition: opacity .65s ease, transform .65s ease;
        }
        #pageLoader.loader-exit {
            opacity: 0;
            transform: scale(1.06);
            pointer-events: none;
        }

        .ldr-bg {
            position: absolute; inset: 0;
            background: radial-gradient(ellipse at 50% 45%, rgba(22,36,80,.85) 0%, #0a1020 70%),
                        linear-gradient(160deg, #0a1228 0%, #162450 55%, #0a1020 100%);
        }
        /* gold dust particles */
        .ldr-particle {
            position: absolute;
            border-radius: 50%;
            background: var(--secondary);
            opacity: 0;
            animation: particleDrift var(--dur, 3s) ease-in-out var(--delay, 0s) infinite;
        }
        @keyframes particleDrift {
            0%   { transform: translateY(0) scale(1); opacity: 0; }
            20%  { opacity: .6; }
            80%  { opacity: .25; }
            100% { transform: translateY(-140px) scale(.3); opacity: 0; }
        }

        /* pulsing rings */
        .ldr-ring {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(200,151,58,.18);
            animation: ringPulse var(--rd, 3s) ease-out var(--rdelay, 0s) infinite;
        }
        @keyframes ringPulse {
            0%   { transform: scale(.55); opacity: 0; }
            25%  { opacity: 1; }
            100% { transform: scale(1.55); opacity: 0; }
        }

        /* logo */
        .ldr-logo-wrap {
            position: relative; z-index: 2;
            animation: logoBounceIn .9s cubic-bezier(.175,.885,.32,1.275) .25s both;
        }
        .ldr-logo {
            width: 148px; height: 148px;
            object-fit: contain;
            filter: drop-shadow(0 0 32px rgba(200,151,58,.55))
                    drop-shadow(0 0 80px rgba(200,151,58,.25));
            display: block;
        }
        .ldr-logo-glow {
            position: absolute; inset: -28px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(200,151,58,.28) 0%, transparent 65%);
            animation: glowBreath 2.2s ease-in-out infinite;
        }
        @keyframes logoBounceIn {
            0%   { transform: scale(0) rotate(-200deg); opacity: 0; }
            60%  { transform: scale(1.1) rotate(8deg); opacity: 1; }
            100% { transform: scale(1) rotate(0deg); opacity: 1; }
        }
        @keyframes glowBreath {
            0%,100% { transform: scale(1); opacity: .7; }
            50%      { transform: scale(1.2); opacity: 1; }
        }

        /* text block */
        .ldr-text { position: relative; z-index: 2; text-align: center; margin-top: 22px; }
        .ldr-name {
            font-family: 'Fraunces', serif;
            font-size: clamp(1.35rem, 4vw, 1.9rem);
            font-weight: 700; color: #fff;
            letter-spacing: .03em; line-height: 1.2;
            animation: riseIn .7s ease .95s both;
        }
        .ldr-location {
            font-size: .78rem; font-weight: 600;
            color: rgba(255,255,255,.45);
            letter-spacing: .18em; text-transform: uppercase;
            margin-top: 5px;
            animation: riseIn .7s ease 1.15s both;
        }
        .ldr-motto {
            display: flex; align-items: center; justify-content: center;
            gap: 10px; margin-top: 16px;
            animation: riseIn .7s ease 1.35s both;
        }
        .ldr-motto span { color: var(--secondary); font-size: .72rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; }
        .ldr-motto .ldr-dot { color: rgba(200,151,58,.35); font-size: 1rem; }

        /* progress bar */
        .ldr-progress {
            width: 180px; height: 2px;
            background: rgba(255,255,255,.08);
            border-radius: 2px; margin-top: 28px;
            overflow: hidden; position: relative; z-index: 2;
            animation: riseIn .5s ease 1.55s both;
        }
        .ldr-progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--secondary), var(--secondary-light), var(--secondary));
            background-size: 200%;
            border-radius: 2px;
            animation: progressFill 1.3s ease 1.6s both, shimmer 1.4s linear 1.6s;
        }
        @keyframes riseIn {
            from { transform: translateY(18px); opacity: 0; }
            to   { transform: translateY(0); opacity: 1; }
        }
        @keyframes progressFill {
            from { width: 0; }
            to   { width: 100%; }
        }
        @keyframes shimmer {
            0%   { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* divider lines */
        .ldr-lines {
            position: relative; z-index: 2;
            display: flex; gap: 6px; align-items: center;
            margin-top: 18px;
        }
        .ldr-lines .ldr-line {
            height: 1px; background: linear-gradient(90deg, transparent, rgba(200,151,58,.45), transparent);
            animation: lineGrow .8s ease 1.35s both;
        }
        @keyframes lineGrow {
            from { width: 0; opacity: 0; }
            to   { opacity: 1; }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- ══ Grand Page Loader ════════════════════════ -->
    <div id="pageLoader">
        <div class="ldr-bg"></div>

        {{-- Animated rings --}}
        <div class="ldr-ring" style="width:240px;height:240px;--rd:2.8s;--rdelay:0s;"></div>
        <div class="ldr-ring" style="width:340px;height:340px;--rd:2.8s;--rdelay:.5s;border-color:rgba(200,151,58,.11);"></div>
        <div class="ldr-ring" style="width:460px;height:460px;--rd:2.8s;--rdelay:1s;border-color:rgba(200,151,58,.06);"></div>
        <div class="ldr-ring" style="width:600px;height:600px;--rd:2.8s;--rdelay:1.5s;border-color:rgba(200,151,58,.03);"></div>

        {{-- Logo --}}
        <div class="ldr-logo-wrap">
            <div class="ldr-logo-glow"></div>
            <img src="{{ asset('images/logo.png') }}" alt="K.T.S.P.M's Law College" class="ldr-logo">
        </div>

        {{-- Horizontal decorative lines --}}
        <div class="ldr-lines">
            <div class="ldr-line" style="width:60px;"></div>
            <div style="color:rgba(200,151,58,.4);font-size:.6rem;letter-spacing:.2em;animation:riseIn .5s ease 1.35s both;opacity:0;">EST. 2024</div>
            <div class="ldr-line" style="width:60px;"></div>
        </div>

        {{-- Text --}}
        <div class="ldr-text">
            <div class="ldr-name">K.T.S.P.M's Law College</div>
            <div class="ldr-location">Khopoli &nbsp;·&nbsp; Raigad</div>
            <div class="ldr-motto">
                <span>Justice</span>
                <span class="ldr-dot">•</span>
                <span>Knowledge</span>
                <span class="ldr-dot">•</span>
                <span>Integrity</span>
            </div>
        </div>

        {{-- Progress bar --}}
        <div class="ldr-progress">
            <div class="ldr-progress-fill"></div>
        </div>
    </div>

    <script>
    // Grand loader — show once per session
    (function () {
        var loader = document.getElementById('pageLoader');
        if (!loader) return;

        // skip on repeat visits within the same session
        // if (sessionStorage.getItem('ldrSeen')) {
        //     loader.style.display = 'none';
        //     return;
        // }
        sessionStorage.setItem('ldrSeen', '1');

        // Generate gold dust particles
        var count = 22;
        for (var i = 0; i < count; i++) {
            var p = document.createElement('div');
            p.className = 'ldr-particle';
            var size = Math.random() * 4 + 2;
            p.style.cssText = [
                'width:' + size + 'px',
                'height:' + size + 'px',
                'left:' + (Math.random() * 100) + '%',
                'top:' + (60 + Math.random() * 30) + '%',
                '--dur:' + (2.5 + Math.random() * 2) + 's',
                '--delay:' + (Math.random() * 2.5) + 's',
                'opacity:0'
            ].join(';');
            loader.appendChild(p);
        }

        // Hide loader after 3s
        setTimeout(function () {
            loader.classList.add('loader-exit');
            setTimeout(function () { loader.style.display = 'none'; }, 700);
        }, 3000);
    })();
    </script>

    <!-- Top Bar -->
    <div class="topbar d-none d-md-block">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-1" style="color:rgba(255,255,255,.8)">
                    <i class="fas fa-phone-alt me-1" style="font-size:11px;color:var(--secondary)"></i>
                    <a href="tel:{{ \App\Models\Setting::get('phone') }}">{{ \App\Models\Setting::get('phone', '+91 02192 000000') }}</a>
                    <span class="divider">|</span>
                    <i class="fas fa-envelope me-1" style="font-size:11px;color:var(--secondary)"></i>
                    <a href="mailto:{{ \App\Models\Setting::get('email') }}">{{ \App\Models\Setting::get('email', 'info@ktspmlawcollege.edu.in') }}</a>
                </div>
                <div class="d-flex align-items-center gap-2">
                    @php
                        $fb = \App\Models\Setting::get('facebook_url');
                        $ig = \App\Models\Setting::get('instagram_url');
                        $yt = \App\Models\Setting::get('youtube_url');
                    @endphp
                    @if($fb) <a href="{{ $fb }}" class="social-link" target="_blank"><i class="fab fa-facebook-f"></i></a> @endif
                    @if($ig) <a href="{{ $ig }}" class="social-link" target="_blank"><i class="fab fa-instagram"></i></a> @endif
                    @if($yt) <a href="{{ $yt }}" class="social-link" target="_blank"><i class="fab fa-youtube"></i></a> @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg main-nav sticky-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                @php $logo = \App\Models\Setting::get('logo'); @endphp
                @if($logo)
                    <img src="{{ asset('storage/' . $logo) }}" alt="Logo" style="height:56px;width:auto;">
                @else
                    <img src="{{ asset('images/logo.png') }}" alt="K.T.S.P.M's Law College Logo" style="height:60px;width:auto;">
                @endif
                <div class="college-name">
                    K.T.S.P.M's
                    <small>Law College, Khopoli</small>
                </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" style="color:rgba(255,255,255,.8)">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link nav-link-item {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-item dropdown-toggle {{ request()->routeIs('about','infrastructure','affiliation') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">About</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about') }}"><i class="fas fa-university me-2 text-primary-c"></i>About College</a></li>
                            <li><a class="dropdown-item" href="{{ route('infrastructure') }}"><i class="fas fa-building me-2 text-primary-c"></i>Infrastructure</a></li>
                            <li><a class="dropdown-item" href="{{ route('affiliation') }}"><i class="fas fa-certificate me-2 text-primary-c"></i>Affiliation & Approval</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-item dropdown-toggle {{ request()->routeIs('mandal*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">K.T.S.P. Mandal</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('mandal') }}"><i class="fas fa-building me-2 text-primary-c"></i>About Mandal</a></li>
                            <li><a class="dropdown-item" href="{{ route('mandal.governing-body') }}"><i class="fas fa-users me-2 text-primary-c"></i>Governing Body</a></li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li><h6 class="dropdown-header">Messages</h6></li>
                            <li><a class="dropdown-item" href="{{ route('mandal.chairman') }}"><i class="fas fa-crown me-2 text-secondary-c"></i>Chairman's Message</a></li>
                            <li><a class="dropdown-item" href="{{ route('mandal.vice-chairman') }}"><i class="fas fa-star me-2 text-secondary-c"></i>Vice-Chairman's Message</a></li>
                            <li><a class="dropdown-item" href="{{ route('mandal.secretary') }}"><i class="fas fa-feather-alt me-2 text-secondary-c"></i>Secretary's Message</a></li>
                            <li><a class="dropdown-item" href="{{ route('mandal.principal') }}"><i class="fas fa-balance-scale me-2 text-secondary-c"></i>Principal's Message</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link nav-link-item {{ request()->routeIs('courses.*') ? 'active' : '' }}" href="{{ route('courses.index') }}">Courses</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-item {{ request()->routeIs('faculty.*') ? 'active' : '' }}" href="{{ route('faculty.index') }}">Faculty</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-item {{ request()->routeIs('notices.*') ? 'active' : '' }}" href="{{ route('notices.index') }}">Notices</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-item {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">News & Events</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-item {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Gallery</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-item dropdown-toggle {{ request()->routeIs('downloads.*','legal-aid','admissions.*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">Academics</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admissions.index') }}"><i class="fas fa-graduation-cap me-2 text-primary-c"></i>Admissions</a></li>
                            <li><a class="dropdown-item" href="{{ route('downloads.index') }}"><i class="fas fa-download me-2 text-primary-c"></i>Syllabus &amp; Downloads</a></li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li><a class="dropdown-item" href="{{ route('legal-aid') }}"><i class="fas fa-hands-helping me-2 text-secondary-c"></i>Legal Aid Committee</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link nav-link-item {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                    <li class="nav-item">
                        <a class="nav-link btn-apply-nav" href="{{ route('admissions.index') }}">
                            <i class="fas fa-graduation-cap me-1"></i>Apply Now
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Admission Open Banner -->
    @if(\App\Models\Setting::get('admission_open'))
        <div class="admission-ticker text-center">
            <div class="container">
                <i class="fas fa-bell me-2"></i>
                Admissions Open for {{ date('Y') }}-{{ date('Y')+1 }} Academic Year &nbsp;—&nbsp;
                <a href="{{ route('admissions.index') }}">Apply Now <i class="fas fa-arrow-right ms-1" style="font-size:11px"></i></a>
            </div>
        </div>
    @endif

    @yield('content')

    <!-- Footer -->
    <footer class="pt-5 pb-0 mt-5">
        <div class="container pb-4">
            <div class="row g-4">
                <!-- Brand -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand mb-3">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height:60px;width:60px;object-fit:contain;background:#162450;border-radius:50%;padding:4px;">
                            <h4 class="mb-0">K.T.S.P.M's Law College</h4>
                        </div>
                        <p style="font-size:.875rem;line-height:1.75;margin-top:10px;">
                            {{ \App\Models\Setting::get('about_short', 'Affiliated to University of Mumbai. Approved by Bar Council of India. Shaping the legal professionals of tomorrow.') }}
                        </p>
                    </div>
                    <div class="d-flex gap-2 flex-wrap mt-3">
                        <span class="footer-badge"><i class="fas fa-university"></i> Uni. of Mumbai</span>
                        <span class="footer-badge"><i class="fas fa-balance-scale"></i> Bar Council of India</span>
                    </div>
                    <p class="mt-3" style="font-size:.875rem;">
                        <i class="fas fa-map-marker-alt me-2" style="color:var(--secondary)"></i>
                        {{ \App\Models\Setting::get('address', 'Khopoli, Raigad, Maharashtra') }}
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-3 col-6">
                    <h6 class="footer-heading">Quick Links</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('courses.index') }}">Courses</a></li>
                        <li><a href="{{ route('faculty.index') }}">Faculty</a></li>
                        <li><a href="{{ route('admissions.index') }}">Admissions</a></li>
                        <li><a href="{{ route('notices.index') }}">Notices</a></li>
                        <li><a href="{{ route('gallery.index') }}">Gallery</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>

                <!-- More -->
                <div class="col-lg-2 col-md-3 col-6">
                    <h6 class="footer-heading">More</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('news.index') }}">News & Events</a></li>
                        <li><a href="{{ route('downloads.index') }}">Downloads</a></li>
                        <li><a href="{{ route('anti-ragging') }}">Anti-Ragging</a></li>
                        <li><a href="{{ route('rti') }}">RTI</a></li>
                        <li><a href="{{ route('legal-aid') }}">Legal Aid Committee</a></li>
                        <li><a href="{{ route('affiliation') }}">Affiliation</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-lg-4 col-md-6">
                    <h6 class="footer-heading">Get In Touch</h6>
                    <div class="d-flex flex-column gap-3">
                        <a href="tel:{{ \App\Models\Setting::get('phone') }}" class="d-flex align-items-center gap-2" style="display:inline-flex !important;">
                            <span style="width:32px;height:32px;background:rgba(200,151,58,.15);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fas fa-phone-alt" style="color:var(--secondary);font-size:13px;"></i>
                            </span>
                            <span style="color:rgba(255,255,255,.6);font-size:.875rem;">{{ \App\Models\Setting::get('phone', '+91 02192 000000') }}</span>
                        </a>
                        <a href="mailto:{{ \App\Models\Setting::get('email') }}" class="d-flex align-items-center gap-2" style="display:inline-flex !important;">
                            <span style="width:32px;height:32px;background:rgba(200,151,58,.15);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fas fa-envelope" style="color:var(--secondary);font-size:13px;"></i>
                            </span>
                            <span style="color:rgba(255,255,255,.6);font-size:.875rem;">{{ \App\Models\Setting::get('email', 'info@ktspmlawcollege.edu.in') }}</span>
                        </a>
                    </div>
                    @php $map = \App\Models\Setting::get('google_map_embed'); @endphp
                    @if($map)
                        <div class="mt-3 rounded overflow-hidden" style="border-radius:10px;">{!! $map !!}</div>
                    @endif
                    @php
                        $fb2 = \App\Models\Setting::get('facebook_url');
                        $ig2 = \App\Models\Setting::get('instagram_url');
                        $yt2 = \App\Models\Setting::get('youtube_url');
                    @endphp
                    <div class="d-flex gap-2 mt-3">
                        @if($fb2) <a href="{{ $fb2 }}" target="_blank" style="width:36px;height:36px;background:rgba(255,255,255,.07);border-radius:8px;display:flex !important;align-items:center;justify-content:center;"><i class="fab fa-facebook-f" style="font-size:14px;color:rgba(255,255,255,.6)"></i></a> @endif
                        @if($ig2) <a href="{{ $ig2 }}" target="_blank" style="width:36px;height:36px;background:rgba(255,255,255,.07);border-radius:8px;display:flex !important;align-items:center;justify-content:center;"><i class="fab fa-instagram" style="font-size:14px;color:rgba(255,255,255,.6)"></i></a> @endif
                        @if($yt2) <a href="{{ $yt2 }}" target="_blank" style="width:36px;height:36px;background:rgba(255,255,255,.07);border-radius:8px;display:flex !important;align-items:center;justify-content:center;"><i class="fab fa-youtube" style="font-size:14px;color:rgba(255,255,255,.6)"></i></a> @endif
                    </div>
                </div>
            </div>
        </div>

        <div style="border-top:1px solid rgba(255,255,255,.06);padding:18px 0;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start" style="font-size:.8rem;color:rgba(255,255,255,.4)">
                        {!! \App\Models\Setting::get('footer_text', '&copy; ' . date('Y') . " K.T.S.P.M's Law College, Khopoli. All rights reserved.") !!}
                    </div>
                    <div class="col-md-6 text-center text-md-end mt-2 mt-md-0" style="font-size:.8rem;color:rgba(255,255,255,.4)">
                        Affiliated to <strong style="color:rgba(255,255,255,.65)">University of Mumbai</strong> &nbsp;|&nbsp; Approved by <strong style="color:rgba(255,255,255,.65)">Bar Council of India</strong>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float -->
    @php $wa = \App\Models\Setting::get('whatsapp_number'); @endphp
    @if($wa)
        <div class="whatsapp-float">
            <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $wa) }}" target="_blank" title="Chat on WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>
        </div>
    @endif

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        AOS.init({ duration: 750, once: true, offset: 60 });

        try { const lightbox = GLightbox({ selector: '.glightbox' }); } catch(e) {}

        // Scrolled navbar
        const navbar = document.getElementById('mainNavbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 60);
        });
    </script>
    @stack('scripts')
</body>
</html>
