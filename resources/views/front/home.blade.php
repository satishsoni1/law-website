@extends('layouts.front')

@push('styles')
<style>
    /* ── Hero ──────────────────────────────────────── */
    .hero-section {
        position: relative;
        min-height: 92vh;
        display: flex;
        align-items: center;
        overflow: hidden;
        background: var(--dark);
    }
    .hero-bg-slider {
        position: absolute;
        inset: 0;
        z-index: 0;
    }
    .hero-bg-slider .carousel,
    .hero-bg-slider .carousel-inner,
    .hero-bg-slider .carousel-item {
        height: 100%;
    }
    .hero-bg-slider .carousel-item img {
        width: 100%; height: 100%;
        object-fit: cover;
        filter: brightness(.38) saturate(1.1);
    }
    .hero-bg-slider .carousel-item .fallback-bg {
        width: 100%; height: 100%;
        background: linear-gradient(145deg, var(--primary-dark) 0%, var(--dark) 60%, var(--accent) 100%);
    }
    /* geometric overlay */
    .hero-section::after {
        content: '';
        position: absolute; inset: 0; z-index: 1;
        background: linear-gradient(105deg, rgba(10,18,40,.82) 0%, rgba(22,36,80,.55) 55%, rgba(10,18,40,.6) 100%);
    }
    .hero-content {
        position: relative; z-index: 2;
        width: 100%;
    }
    .hero-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        background: rgba(200,151,58,.18);
        border: 1px solid rgba(200,151,58,.35);
        color: var(--secondary-light);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
        padding: 6px 16px;
        border-radius: 30px;
        margin-bottom: 22px;
        backdrop-filter: blur(6px);
    }
    .hero-eyebrow i { font-size: 10px; }
    .hero-title {
        font-family: 'Fraunces', serif;
        font-size: clamp(2.4rem, 5.5vw, 4rem);
        font-weight: 700;
        color: #fff;
        line-height: 1.18;
        margin-bottom: 20px;
        text-shadow: 0 2px 20px rgba(0,0,0,.3);
    }
    .hero-title .line-gold { color: var(--secondary-light); }
    .hero-subtitle {
        font-size: 1.05rem;
        color: rgba(255,255,255,.78);
        line-height: 1.75;
        max-width: 560px;
        margin-bottom: 36px;
    }
    .hero-cta-group { display: flex; flex-wrap: wrap; gap: 14px; }
    .hero-cta-primary {
        display: inline-flex; align-items: center; gap: 8px;
        background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
        color: #fff;
        font-weight: 700; font-size: .95rem;
        padding: 14px 30px;
        border-radius: 12px;
        text-decoration: none;
        box-shadow: 0 6px 25px rgba(200,151,58,.4);
        transition: all .3s ease;
        letter-spacing: 0.01em;
    }
    .hero-cta-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 35px rgba(200,151,58,.55);
        color: #fff;
    }
    .hero-cta-secondary {
        display: inline-flex; align-items: center; gap: 8px;
        border: 2px solid rgba(255,255,255,.45);
        color: #fff;
        font-weight: 600; font-size: .95rem;
        padding: 12px 28px;
        border-radius: 12px;
        text-decoration: none;
        backdrop-filter: blur(6px);
        background: rgba(255,255,255,.07);
        transition: all .3s ease;
    }
    .hero-cta-secondary:hover {
        border-color: rgba(255,255,255,.85);
        background: rgba(255,255,255,.15);
        color: #fff;
        transform: translateY(-3px);
    }

    /* accred badges */
    .hero-accred {
        display: flex; flex-wrap: wrap; gap: 10px;
        margin-top: 40px;
    }
    .accred-chip {
        display: inline-flex; align-items: center; gap: 7px;
        background: rgba(255,255,255,.1);
        border: 1px solid rgba(255,255,255,.18);
        color: rgba(255,255,255,.85);
        font-size: .78rem; font-weight: 600;
        padding: 7px 14px;
        border-radius: 8px;
        backdrop-filter: blur(8px);
        letter-spacing: 0.02em;
    }
    .accred-chip i { color: var(--secondary-light); font-size: 11px; }

    /* hero indicators */
    .hero-bg-slider .carousel-indicators {
        bottom: 24px; z-index: 10;
        margin-bottom: 0;
    }
    .hero-bg-slider .carousel-indicators [data-bs-target] {
        width: 8px; height: 8px;
        border-radius: 50%;
        border: none;
        background: rgba(255,255,255,.35);
        transition: all .3s ease;
        margin: 0 4px;
    }
    .hero-bg-slider .carousel-indicators .active {
        background: var(--secondary);
        width: 28px;
        border-radius: 4px;
    }

    /* ── Stats Bar ─────────────────────────────────── */
    .stats-bar {
        background: #fff;
        box-shadow: 0 4px 30px rgba(0,0,0,.08);
        position: relative; z-index: 3;
        margin-top: -1px;
    }
    .stat-item {
        padding: 28px 20px;
        text-align: center;
        border-right: 1px solid #f0f0f0;
        transition: all .3s ease;
    }
    .stat-item:last-child { border-right: none; }
    .stat-item:hover { background: rgba(22,36,80,.04); }
    .stat-number {
        font-family: 'Fraunces', serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--primary);
        line-height: 1;
        display: block;
    }
    .stat-label {
        font-size: .78rem;
        font-weight: 600;
        color: #888;
        letter-spacing: .06em;
        text-transform: uppercase;
        margin-top: 5px;
        display: block;
    }
    .stat-icon {
        width: 40px; height: 40px;
        border-radius: 10px;
        background: rgba(22,36,80,.09);
        display: inline-flex; align-items: center; justify-content: center;
        margin-bottom: 10px;
        font-size: 15px;
        color: var(--primary);
    }

    /* ── About + Notice ────────────────────────────── */
    .about-feature-card {
        display: flex; align-items: flex-start; gap: 14px;
        background: #fff;
        border: 1px solid #f0f0f0;
        border-radius: 12px;
        padding: 16px;
        transition: all .3s ease;
    }
    .about-feature-card:hover {
        border-color: var(--secondary);
        box-shadow: 0 4px 20px rgba(200,151,58,.12);
    }
    .about-feature-icon {
        width: 44px; height: 44px; flex-shrink: 0;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 18px;
    }

    /* ── Why Choose Us ─────────────────────────────── */
    .why-card {
        background: #fff;
        border-radius: var(--card-radius);
        padding: 30px 24px;
        box-shadow: 0 2px 16px rgba(0,0,0,.055);
        transition: all .3s ease;
        height: 100%;
        border-bottom: 3px solid transparent;
    }
    .why-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0,0,0,.1);
        border-bottom-color: var(--secondary);
    }
    .why-icon {
        width: 56px; height: 56px;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 22px;
        margin-bottom: 16px;
    }

    /* ── Leadership Cards ──────────────────────────── */
    .leader-card {
        border-radius: var(--card-radius);
        overflow: hidden;
        box-shadow: 0 2px 16px rgba(0,0,0,.07);
        transition: all .3s ease;
        background: #fff;
        height: 100%;
    }
    .leader-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 40px rgba(0,0,0,.12);
    }
    .leader-card-top {
        padding: 28px 20px 22px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .leader-card-top::before {
        content: '';
        position: absolute; top: -40px; right: -40px;
        width: 130px; height: 130px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
    }
    .leader-avatar-ring {
        width: 90px; height: 90px;
        border-radius: 50%;
        border: 3px solid rgba(255,255,255,.5);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 14px;
        background: rgba(255,255,255,.1);
        overflow: hidden;
    }
    .leader-avatar {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        display: block;
    }

    /* ── Course Cards ──────────────────────────────── */
    .course-pill {
        display: inline-block;
        background: rgba(200,151,58,.12);
        color: var(--secondary);
        font-size: .72rem; font-weight: 700;
        letter-spacing: .06em; text-transform: uppercase;
        padding: 4px 10px; border-radius: 6px;
        margin-bottom: 8px;
    }

    /* ── News Cards ────────────────────────────────── */
    .news-card {
        border: none;
        border-radius: var(--card-radius);
        overflow: hidden;
        box-shadow: 0 2px 16px rgba(0,0,0,.06);
        transition: all .3s ease;
        height: 100%;
    }
    .news-card:hover { transform: translateY(-5px); box-shadow: 0 12px 35px rgba(0,0,0,.11); }
    .news-card .card-img-wrap {
        height: 195px; overflow: hidden;
    }
    .news-card .card-img-wrap img,
    .news-card .card-img-wrap .img-placeholder {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform .4s ease;
    }
    .news-card:hover .card-img-wrap img { transform: scale(1.05); }

    /* ── Gallery Grid ──────────────────────────────── */
    .gallery-thumb {
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        height: 165px;
        display: block;
    }
    .gallery-thumb img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform .45s ease;
    }
    .gallery-thumb:hover img { transform: scale(1.08); }
    .gallery-thumb .gallery-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,.65) 0%, transparent 55%);
        display: flex; align-items: flex-end;
        padding: 10px 12px;
        transition: all .3s ease;
    }
    .gallery-thumb:hover .gallery-overlay { background: linear-gradient(to top, rgba(139,26,26,.7) 0%, transparent 60%); }
    .gallery-thumb .gallery-title {
        color: #fff; font-size: .78rem; font-weight: 600;
        line-height: 1.3;
    }

    /* ── Testimonials ──────────────────────────────── */
    .testimonial-card {
        background: rgba(255,255,255,.07);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: var(--card-radius);
        padding: 28px;
        transition: all .3s ease;
        height: 100%;
    }
    .testimonial-card:hover {
        background: rgba(255,255,255,.12);
        border-color: rgba(200,151,58,.3);
        transform: translateY(-4px);
    }
    .star-rating i { color: var(--secondary); font-size: 13px; }

    /* ── CTA Section ───────────────────────────────── */
    .cta-section {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 40%, var(--primary-light) 100%);
        position: relative; overflow: hidden;
    }
    .cta-section::before {
        content: '';
        position: absolute; inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    /* ── Why Icon Variants ─────────────────────────── */
    .wi-primary   { background: rgba(139,26,26,.09); color: var(--primary); }
    .wi-secondary { background: rgba(200,151,58,.10); color: var(--secondary); }
    .wi-accent    { background: rgba(30,58,95,.09);   color: var(--accent); }

    /* ── Leader Card Backgrounds ───────────────────── */
    .lc-1 { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); }
    .lc-2 { background: linear-gradient(135deg, #8a6820, var(--secondary)); }
    .lc-3 { background: linear-gradient(135deg, var(--accent), #152b47); }
    .lc-4 { background: linear-gradient(135deg, #1a5c35, #0e3b22); }

    /* ── News Badge ────────────────────────────────── */
    .news-badge {
        display: inline-block;
        font-size: .72rem; font-weight: 700;
        letter-spacing: .05em; text-transform: uppercase;
        padding: 4px 10px; border-radius: 6px;
        margin-bottom: 8px;
    }
    .news-badge-event { background: rgba(200,151,58,.15); color: var(--secondary); }
    .news-badge-news  { background: rgba(139,26,26,.1);   color: var(--primary); }

    /* ── Scrolling Counters ────────────────────────── */
    .counter-num { display: inline-block; }

    /* ── Hero Right Panel ──────────────────────────── */
    .hero-right-panel { position: relative; z-index: 2; }
    @keyframes pulse { 0%,100%{opacity:1}50%{opacity:.35} }

    .hero-card {
        background: rgba(255,255,255,.055);
        backdrop-filter: blur(22px);
        -webkit-backdrop-filter: blur(22px);
        border: 1px solid rgba(255,255,255,.13);
        border-radius: 22px;
        padding: 28px 26px 22px;
        min-height: 360px;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
    }
    .hero-card::before {
        content: '';
        position: absolute; top: -60px; right: -60px;
        width: 180px; height: 180px;
        border-radius: 50%;
        background: rgba(200,151,58,.07);
        pointer-events: none;
    }

    /* slide labels & titles */
    .hc-badge {
        display: inline-flex; align-items: center; gap: 7px;
        background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
        color: #fff;
        font-size: .72rem; font-weight: 700;
        letter-spacing: .1em; text-transform: uppercase;
        padding: 5px 14px; border-radius: 20px;
        width: fit-content; margin-bottom: 16px;
    }
    .hc-label {
        font-size: .68rem; font-weight: 700;
        letter-spacing: .13em; text-transform: uppercase;
        color: var(--secondary-light);
        margin-bottom: 8px;
    }
    .hc-title {
        font-family: 'Fraunces', serif;
        font-size: 1.25rem; font-weight: 700;
        color: #fff; line-height: 1.3;
        margin-bottom: 18px;
    }

    /* check list */
    .hc-list { list-style: none; padding: 0; margin: 0 0 20px; flex: 1; }
    .hc-list li {
        display: flex; align-items: center; gap: 10px;
        font-size: .84rem; color: rgba(255,255,255,.82);
        padding: 7px 0;
        border-bottom: 1px solid rgba(255,255,255,.07);
    }
    .hc-list li:last-child { border-bottom: none; }
    .hc-list li i { color: var(--secondary-light); font-size: 12px; flex-shrink: 0; }

    /* course list items */
    .hc-course {
        display: flex; align-items: center; gap: 10px;
        background: rgba(255,255,255,.06);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 10px;
        padding: 10px 14px;
        margin-bottom: 8px;
        text-decoration: none;
        transition: all .25s ease;
    }
    .hc-course:hover { background: rgba(200,151,58,.12); border-color: rgba(200,151,58,.25); }
    .hc-course .hc-course-icon {
        width: 32px; height: 32px; border-radius: 8px; flex-shrink: 0;
        background: rgba(200,151,58,.15);
        display: flex; align-items: center; justify-content: center;
        font-size: 13px; color: var(--secondary-light);
    }
    .hc-course .hc-course-name {
        font-size: .82rem; font-weight: 600; color: rgba(255,255,255,.88); line-height: 1.3;
    }
    .hc-course .hc-course-dur {
        font-size: .72rem; color: rgba(255,255,255,.45); margin-top: 2px;
    }

    /* stat grid */
    .hc-stats { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; flex: 1; }
    .hc-stat-box {
        background: rgba(255,255,255,.07);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 12px;
        padding: 14px 12px;
        text-align: center;
    }
    .hc-stat-num {
        font-family: 'Fraunces', serif;
        font-size: 1.6rem; font-weight: 700;
        color: var(--secondary-light);
        display: block; line-height: 1;
    }
    .hc-stat-lbl {
        font-size: .72rem; color: rgba(255,255,255,.55);
        font-weight: 600; letter-spacing: .04em;
        margin-top: 5px; display: block;
        text-transform: uppercase;
    }

    /* notice slide */
    .hc-notice-item {
        background: rgba(255,255,255,.06);
        border-left: 3px solid var(--secondary);
        border-radius: 0 10px 10px 0;
        padding: 10px 14px;
        margin-bottom: 8px;
    }
    .hc-notice-item p {
        font-size: .82rem; color: rgba(255,255,255,.85);
        line-height: 1.5; margin: 0;
    }
    .hc-notice-item small {
        font-size: .72rem; color: rgba(255,255,255,.4);
        display: block; margin-top: 4px;
    }

    /* bottom CTA button */
    .hc-btn {
        display: flex; align-items: center; justify-content: center; gap: 8px;
        background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
        color: #fff; font-weight: 700; font-size: .84rem;
        padding: 11px 20px; border-radius: 12px;
        text-decoration: none; margin-top: auto;
        transition: all .3s ease;
        letter-spacing: 0.01em;
    }
    .hc-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(200,151,58,.4); color: #fff; }
    .hc-btn-ghost {
        display: flex; align-items: center; justify-content: center; gap: 8px;
        border: 1px solid rgba(255,255,255,.2);
        color: rgba(255,255,255,.8); font-weight: 600; font-size: .82rem;
        padding: 9px 18px; border-radius: 12px;
        text-decoration: none; margin-top: auto;
        transition: all .3s ease;
        backdrop-filter: blur(4px);
    }
    .hc-btn-ghost:hover { border-color: rgba(200,151,58,.5); color: var(--secondary-light); }

    /* carousel dots */
    #heroRightSlider .carousel-indicators {
        position: static; margin: 14px 0 0; justify-content: center;
    }
    #heroRightSlider .carousel-indicators [data-bs-target] {
        width: 7px; height: 7px; border-radius: 50%;
        border: none; background: rgba(255,255,255,.25);
        transition: all .3s ease; margin: 0 3px;
        flex-shrink: 0;
    }
    #heroRightSlider .carousel-indicators .active {
        background: var(--secondary); width: 22px; border-radius: 4px;
    }
</style>
@endpush

@section('content')

{{-- ══════════════════════════════════════════════════
     HERO
═════════════════════════════════════════════════════ --}}
<section class="hero-section">

    {{-- Background carousel --}}
    <div class="hero-bg-slider">
        <div id="heroBgSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                @foreach($sliders as $i => $s)
                    <button type="button" data-bs-target="#heroBgSlider" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"></button>
                @endforeach
                @if($sliders->isEmpty())
                    <button type="button" data-bs-target="#heroBgSlider" data-bs-slide-to="0" class="active"></button>
                @endif
            </div>
            <div class="carousel-inner" style="height:100%">
                @forelse($sliders as $i => $slide)
                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}" style="height:100%">
                        <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}">
                    </div>
                @empty
                    <div class="carousel-item active" style="height:100%">
                        <div class="fallback-bg"></div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Hero content --}}
    <div class="hero-content py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                {{-- Left: main headline --}}
                <div class="col-lg-7 col-xl-6" data-aos="fade-right" data-aos-duration="900">
                    <div class="hero-eyebrow">
                        <i class="fas fa-balance-scale"></i>
                        Established &amp; Approved College of Law
                    </div>
                    <h1 class="hero-title">
                        Shape Your Future in
                        <span class="line-gold">Law &amp; Justice</span>
                    </h1>
                    <p class="hero-subtitle">
                        K.T.S.P.M's Law College, Khopoli — affiliated to University of Mumbai and
                        approved by Bar Council of India. Empowering students from Raigad &amp; beyond with
                        world-class legal education.
                    </p>
                    <div class="hero-cta-group">
                        <a href="{{ route('admissions.index') }}" class="hero-cta-primary">
                            <i class="fas fa-graduation-cap"></i> Apply for Admission
                        </a>
                        <a href="{{ route('courses.index') }}" class="hero-cta-secondary">
                            <i class="fas fa-book-open"></i> Explore Courses
                        </a>
                    </div>
                    <div class="hero-accred">
                        <span class="accred-chip"><i class="fas fa-university"></i> University of Mumbai</span>
                        <span class="accred-chip"><i class="fas fa-gavel"></i> Bar Council of India</span>
                        <span class="accred-chip"><i class="fas fa-star"></i> Est. 2024</span>
                    </div>
                </div>

                {{-- Right: info banner slider --}}
                <div class="col-lg-5 col-xl-6 d-none d-lg-block hero-right-panel" data-aos="fade-left" data-aos-duration="900" data-aos-delay="200">
                    <div id="heroRightSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4500">
                        <div class="carousel-inner">

                            {{-- Slide 1: Admissions --}}
                            <div class="carousel-item active">
                                <div class="hero-card">
                                    <div class="hc-badge">
                                        <i class="fas fa-circle" style="font-size:7px;animation:pulse 1.5s infinite;"></i>
                                        Admissions Open {{ date('Y') }}–{{ date('Y')+1 }}
                                    </div>
                                    <div class="hc-title">Join India's Emerging<br>College of Law</div>
                                    <ul class="hc-list">
                                        <li><i class="fas fa-check-circle"></i> Bar Council of India Approved</li>
                                        <li><i class="fas fa-check-circle"></i> University of Mumbai Affiliated</li>
                                        <li><i class="fas fa-check-circle"></i> Experienced Legal Faculty</li>
                                        <li><i class="fas fa-check-circle"></i> Moot Court &amp; Library Facility</li>
                                        <li><i class="fas fa-check-circle"></i> Merit Based — No Donation</li>
                                    </ul>
                                    <a href="{{ route('admissions.index') }}" class="hc-btn">
                                        <i class="fas fa-graduation-cap"></i> Apply for Admission
                                    </a>
                                </div>
                            </div>

                            {{-- Slide 2: Courses --}}
                            <div class="carousel-item">
                                <div class="hero-card">
                                    <div class="hc-label"><i class="fas fa-book-open me-1"></i>Academic Programs</div>
                                    <div class="hc-title">Courses We Offer</div>
                                    <div style="flex:1;overflow:hidden;">
                                        @forelse($courses->take(4) as $course)
                                            <a href="{{ route('courses.show', $course->slug) }}" class="hc-course">
                                                <div class="hc-course-icon"><i class="fas fa-graduation-cap"></i></div>
                                                <div>
                                                    <div class="hc-course-name">{{ $course->name }}</div>
                                                    @if($course->duration)
                                                        <div class="hc-course-dur"><i class="fas fa-clock me-1"></i>{{ $course->duration }}</div>
                                                    @endif
                                                </div>
                                            </a>
                                        @empty
                                            <a href="{{ route('courses.index') }}" class="hc-course">
                                                <div class="hc-course-icon"><i class="fas fa-graduation-cap"></i></div>
                                                <div><div class="hc-course-name">3-Year LL.B Programme</div><div class="hc-course-dur"><i class="fas fa-clock me-1"></i>3 Years</div></div>
                                            </a>
                                            <a href="{{ route('courses.index') }}" class="hc-course">
                                                <div class="hc-course-icon"><i class="fas fa-graduation-cap"></i></div>
                                                <div><div class="hc-course-name">5-Year B.A. LL.B Programme</div><div class="hc-course-dur"><i class="fas fa-clock me-1"></i>5 Years</div></div>
                                            </a>
                                        @endforelse
                                    </div>
                                    <a href="{{ route('courses.index') }}" class="hc-btn-ghost mt-3">
                                        View All Courses <i class="fas fa-arrow-right" style="font-size:11px"></i>
                                    </a>
                                </div>
                            </div>

                            {{-- Slide 3: Stats --}}
                            <div class="carousel-item">
                                <div class="hero-card">
                                    <div class="hc-label"><i class="fas fa-chart-bar me-1"></i>College at a Glance</div>
                                    <div class="hc-title">Our Achievements</div>
                                    <div class="hc-stats" style="flex:1;">
                                        <div class="hc-stat-box">
                                            <span class="hc-stat-num">{{ \App\Models\Admission::where('status','approved')->count() ?: '100' }}+</span>
                                            <span class="hc-stat-lbl">Students</span>
                                        </div>
                                        <div class="hc-stat-box">
                                            <span class="hc-stat-num">{{ \App\Models\Faculty::active()->count() ?: '10' }}+</span>
                                            <span class="hc-stat-lbl">Faculty</span>
                                        </div>
                                        <div class="hc-stat-box">
                                            <span class="hc-stat-num">{{ \App\Models\Course::active()->count() ?: '2' }}</span>
                                            <span class="hc-stat-lbl">Courses</span>
                                        </div>
                                        <div class="hc-stat-box">
                                            <span class="hc-stat-num">2024</span>
                                            <span class="hc-stat-lbl">Established</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('about') }}" class="hc-btn-ghost mt-3">
                                        Know More About Us <i class="fas fa-arrow-right" style="font-size:11px"></i>
                                    </a>
                                </div>
                            </div>

                            {{-- Slide 4: Latest Notice --}}
                            <div class="carousel-item">
                                <div class="hero-card">
                                    <div class="hc-label"><i class="fas fa-bullhorn me-1"></i>Notice Board</div>
                                    <div class="hc-title">Latest Announcements</div>
                                    <div style="flex:1;overflow:hidden;">
                                        @forelse($notices->take(4) as $notice)
                                            <div class="hc-notice-item">
                                                <p>{{ Str::limit($notice->title, 68) }}</p>
                                                <small><i class="fas fa-calendar-alt me-1"></i>{{ $notice->publish_date->format('d M Y') }}</small>
                                            </div>
                                        @empty
                                            <div class="hc-notice-item">
                                                <p>Admissions open for {{ date('Y') }}–{{ date('Y')+1 }} academic year.</p>
                                                <small><i class="fas fa-calendar-alt me-1"></i>{{ date('d M Y') }}</small>
                                            </div>
                                        @endforelse
                                    </div>
                                    <a href="{{ route('notices.index') }}" class="hc-btn-ghost mt-3">
                                        All Notices <i class="fas fa-arrow-right" style="font-size:11px"></i>
                                    </a>
                                </div>
                            </div>

                        </div>

                        {{-- Dots --}}
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#heroRightSlider" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#heroRightSlider" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#heroRightSlider" data-bs-slide-to="2"></button>
                            <button type="button" data-bs-target="#heroRightSlider" data-bs-slide-to="3"></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════
     STATS BAR
═════════════════════════════════════════════════════ --}}
<div class="stats-bar">
    <div class="container-fluid px-0">
        <div class="row g-0">
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-user-graduate"></i></div>
                    <span class="stat-number counter-num" data-target="{{ \App\Models\Admission::where('status','approved')->count() }}">0</span>+
                    <span class="stat-label">Students Enrolled</span>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="80">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <span class="stat-number counter-num" data-target="{{ \App\Models\Faculty::active()->count() }}">0</span>+
                    <span class="stat-label">Faculty Members</span>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="160">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-book"></i></div>
                    <span class="stat-number counter-num" data-target="{{ \App\Models\Course::active()->count() }}">0</span>
                    <span class="stat-label">Courses Offered</span>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="240">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-trophy"></i></div>
                    <span class="stat-number counter-num" data-target="{{ date('Y') - 2024 }}">0</span>+
                    <span class="stat-label">Years of Excellence</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════
     ABOUT + NOTICE BOARD
═════════════════════════════════════════════════════ --}}
<section class="py-5 py-lg-6" style="background:#fff;">
    <div class="container" style="--bs-gutter-x:2rem;">
        <div class="row g-5 align-items-start">

            {{-- About --}}
            <div class="col-lg-7" data-aos="fade-right">
                <span class="section-label">Welcome</span>
                <h2 class="section-title">K.T.S.P.M's <span class="highlight">Law College</span>, Khopoli</h2>
                <div class="title-divider mb-4"></div>
                <p class="lead" style="color:#444;font-size:1rem;line-height:1.85;">
                    Established under the K.T.S.P. Mandal, Khopoli, our Law College is affiliated to the
                    University of Mumbai and approved by the Bar Council of India. We are committed to
                    shaping the future legal professionals of India with both theoretical depth and
                    practical excellence.
                </p>
                <p style="color:#666;font-size:.925rem;line-height:1.85;margin-top:14px;">
                    With experienced faculty, a well-equipped library, moot court facility, and modern
                    infrastructure, we provide students an environment that truly fosters learning,
                    critical thinking, and professional growth.
                </p>

                <div class="row g-3 mt-3">
                    <div class="col-sm-6">
                        <div class="about-feature-card">
                            <div class="about-feature-icon" style="background:rgba(139,26,26,.08);">
                                <i class="fas fa-university" style="color:var(--primary)"></i>
                            </div>
                            <div>
                                <strong style="font-size:.9rem;color:#1a1a1a;">Affiliated to</strong>
                                <p style="font-size:.82rem;color:#777;margin:2px 0 0;">University of Mumbai</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="about-feature-card">
                            <div class="about-feature-icon" style="background:rgba(200,151,58,.1);">
                                <i class="fas fa-gavel" style="color:var(--secondary)"></i>
                            </div>
                            <div>
                                <strong style="font-size:.9rem;color:#1a1a1a;">Approved by</strong>
                                <p style="font-size:.82rem;color:#777;margin:2px 0 0;">Bar Council of India</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="about-feature-card">
                            <div class="about-feature-icon" style="background:rgba(30,58,95,.08);">
                                <i class="fas fa-book-reader" style="color:var(--accent)"></i>
                            </div>
                            <div>
                                <strong style="font-size:.9rem;color:#1a1a1a;">Expert Faculty</strong>
                                <p style="font-size:.82rem;color:#777;margin:2px 0 0;">Experienced legal educators</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="about-feature-card">
                            <div class="about-feature-icon" style="background:rgba(139,26,26,.08);">
                                <i class="fas fa-landmark" style="color:var(--primary)"></i>
                            </div>
                            <div>
                                <strong style="font-size:.9rem;color:#1a1a1a;">Moot Court</strong>
                                <p style="font-size:.82rem;color:#777;margin:2px 0 0;">Practical legal training</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('about') }}" class="btn-outline-primary-c">
                        Know More About Us <i class="fas fa-arrow-right ms-2" style="font-size:12px"></i>
                    </a>
                </div>
            </div>

            {{-- Notice Board --}}
            <div class="col-lg-5" data-aos="fade-left">
                <div class="notice-board p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 style="color:var(--secondary-light);font-size:1.05rem;margin:0;">
                            <i class="fas fa-bullhorn me-2"></i>Notice Board
                        </h5>
                        <span style="background:rgba(200,151,58,.2);color:var(--secondary-light);font-size:.72rem;font-weight:700;letter-spacing:.05em;padding:4px 10px;border-radius:6px;">LATEST</span>
                    </div>
                    @forelse($notices as $notice)
                        <div class="notice-item">
                            <div class="d-flex justify-content-between align-items-start gap-2">
                                <div style="flex:1;">
                                    @if($notice->is_pinned)
                                        <span style="background:var(--secondary);color:#fff;font-size:.68rem;font-weight:700;padding:2px 8px;border-radius:4px;letter-spacing:.04em;display:inline-block;margin-bottom:4px;">PINNED</span>
                                    @endif
                                    <p style="font-size:.875rem;line-height:1.55;margin:0;color:rgba(255,255,255,.9);">{{ Str::limit($notice->title, 72) }}</p>
                                    <small style="color:rgba(255,255,255,.45);font-size:.75rem;margin-top:3px;display:block;">
                                        <i class="fas fa-calendar-alt me-1"></i>{{ $notice->publish_date->format('d M Y') }}
                                    </small>
                                </div>
                                @if($notice->attachment)
                                    <a href="{{ route('notices.download', $notice) }}" title="Download"
                                       style="width:30px;height:30px;background:rgba(200,151,58,.2);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--secondary-light);text-decoration:none;transition:all .3s ease;"
                                       onmouseover="this.style.background='rgba(200,151,58,.4)'"
                                       onmouseout="this.style.background='rgba(200,151,58,.2)'">
                                        <i class="fas fa-download" style="font-size:11px;"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4" style="color:rgba(255,255,255,.45);">
                            <i class="fas fa-bell-slash fa-2x mb-2 d-block opacity-50"></i>
                            <small>No notices available.</small>
                        </div>
                    @endforelse
                    <a href="{{ route('notices.index') }}"
                       style="display:block;text-align:center;margin-top:16px;padding:10px;border:1px solid rgba(200,151,58,.35);border-radius:10px;color:var(--secondary-light);font-size:.84rem;font-weight:600;text-decoration:none;transition:all .3s ease;"
                       onmouseover="this.style.background='rgba(200,151,58,.12)'"
                       onmouseout="this.style.background='transparent'">
                        View All Notices <i class="fas fa-arrow-right ms-1" style="font-size:11px"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════
     WHY CHOOSE US
═════════════════════════════════════════════════════ --}}
<section class="py-5 py-lg-6" style="background:var(--light);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Our Strengths</span>
            <h2 class="section-title mt-2">Why Choose <span class="highlight">Our College?</span></h2>
            <div class="title-divider center mt-3"></div>
            <p class="section-subtitle mt-3">Everything you need to launch a successful legal career</p>
        </div>
        <div class="row g-4">
            @foreach([
                ['icon'=>'fa-chalkboard-teacher','cls'=>'wi-primary',  'title'=>'Expert Faculty',      'desc'=>'Learn from seasoned legal professionals, advocates, and retired judges with decades of real-world courtroom experience.'],
                ['icon'=>'fa-book-open',         'cls'=>'wi-secondary','title'=>'Rich Law Library',    'desc'=>'Access thousands of law books, journals, judgments, and digital resources essential for rigorous legal research.'],
                ['icon'=>'fa-landmark',           'cls'=>'wi-accent',   'title'=>'Moot Court Facility','desc'=>'Hone your advocacy skills in our dedicated moot court — practice arguments, debates, and oral pleadings.'],
                ['icon'=>'fa-users',              'cls'=>'wi-primary',  'title'=>'Student Support',    'desc'=>'Dedicated mentoring, career counseling, placement assistance, and an active student bar council.'],
                ['icon'=>'fa-certificate',        'cls'=>'wi-secondary','title'=>'BCI Approved',       'desc'=>'Fully approved by Bar Council of India ensuring your degree is recognized across all courts and legal bodies in India.'],
                ['icon'=>'fa-map-marker-alt',     'cls'=>'wi-accent',   'title'=>'Accessible Location','desc'=>'Located in Khopoli, Raigad — easily reachable for students from Mumbai, Pune, and the entire Raigad district.'],
            ] as $i => $w)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 70 }}">
                <div class="why-card">
                    <div class="why-icon {{ $w['cls'] }}">
                        <i class="fas {{ $w['icon'] }}"></i>
                    </div>
                    <h5 style="font-size:1.05rem;margin-bottom:10px;color:#1a1a1a;">{{ $w['title'] }}</h5>
                    <p style="font-size:.875rem;color:#777;line-height:1.75;margin:0;">{{ $w['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════
     COURSES
═════════════════════════════════════════════════════ --}}
@if($courses->count())
<section class="py-5 py-lg-6" style="background:#fff;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Academic Programs</span>
            <h2 class="section-title mt-2">Courses <span class="highlight">Offered</span></h2>
            <div class="title-divider center mt-3"></div>
            <p class="section-subtitle mt-3">Professionally designed legal programs to launch your career in law</p>
        </div>
        <div class="row g-4">
            @foreach($courses as $i => $course)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="course-card h-100 d-flex flex-column">
                        <div class="course-header">
                            <div style="width:46px;height:46px;background:rgba(255,255,255,.12);border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:14px;">
                                <i class="fas fa-graduation-cap" style="font-size:20px;color:var(--secondary-light);"></i>
                            </div>
                            <h5 style="font-size:1.1rem;margin-bottom:4px;font-weight:700;">{{ $course->name }}</h5>
                            @if($course->short_name)
                                <span style="font-size:.78rem;color:rgba(255,255,255,.6);font-family:'Plus Jakarta Sans',sans-serif;">{{ $course->short_name }}</span>
                            @endif
                        </div>
                        <div class="p-4 flex-grow-1">
                            <ul class="list-unstyled mb-3" style="font-size:.875rem;">
                                <li class="d-flex align-items-center gap-2 py-1 border-bottom" style="border-color:#f5f5f5!important;color:#555;">
                                    <i class="fas fa-clock" style="color:var(--secondary);width:14px;"></i>
                                    <span><strong>Duration:</strong> {{ $course->duration }}</span>
                                </li>
                                @if($course->intake)
                                <li class="d-flex align-items-center gap-2 py-1 border-bottom" style="border-color:#f5f5f5!important;color:#555;">
                                    <i class="fas fa-users" style="color:var(--secondary);width:14px;"></i>
                                    <span><strong>Intake:</strong> {{ $course->intake }} seats</span>
                                </li>
                                @endif
                                @if($course->fees)
                                <li class="d-flex align-items-center gap-2 py-1 border-bottom" style="border-color:#f5f5f5!important;color:#555;">
                                    <i class="fas fa-rupee-sign" style="color:var(--secondary);width:14px;"></i>
                                    <span><strong>Fees:</strong> {{ $course->fees }}</span>
                                </li>
                                @endif
                                @if($course->medium)
                                <li class="d-flex align-items-center gap-2 py-1" style="color:#555;">
                                    <i class="fas fa-language" style="color:var(--secondary);width:14px;"></i>
                                    <span><strong>Medium:</strong> {{ $course->medium }}</span>
                                </li>
                                @endif
                            </ul>
                            @if($course->description)
                                <p style="font-size:.85rem;color:#888;line-height:1.7;margin:0;">{{ Str::limit($course->description, 110) }}</p>
                            @endif
                        </div>
                        <div class="p-4 pt-0 d-flex gap-2">
                            <a href="{{ route('courses.show', $course->slug) }}" class="btn-outline-primary-c flex-fill text-center" style="display:block;border-radius:10px;">Learn More</a>
                            <a href="{{ route('admissions.index') }}" class="btn-secondary-c flex-fill text-center" style="display:block;">Apply Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('courses.index') }}" class="btn-outline-primary-c">
                View All Courses <i class="fas fa-arrow-right ms-2" style="font-size:12px"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- ══════════════════════════════════════════════════
     LEADERSHIP MESSAGES
═════════════════════════════════════════════════════ --}}
<section class="py-5 py-lg-6" style="background:var(--light);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Leadership</span>
            <h2 class="section-title mt-2">Messages from <span class="highlight">Leadership</span></h2>
            <div class="title-divider center mt-3"></div>
            <p class="section-subtitle mt-3">Guiding words from K.T.S.P. Mandal's leadership and our Principal</p>
        </div>
        <div class="row g-4">
            @foreach([
                ['photo'=>'https://kmccollege.in/storage/chairman.png','name'=>'Shri. Santosh Gurunath Jangam',  'title'=>'Chairman, K.T.S.P. Mandal',          'icon'=>'fa-crown',        'cls'=>'lc-1','route'=>'mandal.chairman',     'excerpt'=>'Education is the most powerful instrument for social transformation. The establishment of K.T.S.P.M\'s Law College represents a significant milestone in our mission to make quality education accessible to all.','delay'=>0],
                ['photo'=>'https://kmccollege.in/storage/Jalgaonkar%20sir.jpg','name'=>'Shri. Abubakar Aadam Jalgaonkar','title'=>'Vice-Chairman, K.T.S.P. Mandal',     'icon'=>'fa-star',         'cls'=>'lc-2','route'=>'mandal.vice-chairman','excerpt'=>'With this college, we have brought legal education home for students of Raigad District who aspired to enter the legal field but were constrained by distance and resources.','delay'=>100],
                ['photo'=>'https://kmccollege.in/storage/secretary.png','name'=>'Shri. Kishor Balkrushna Patil',  'title'=>'Secretary, K.T.S.P. Mandal',         'icon'=>'fa-feather-alt',  'cls'=>'lc-3','route'=>'mandal.secretary',    'excerpt'=>'Transparency, accountability, and student welfare are the pillars of our approach. We are committed to ensuring every student has access to the best possible academic environment.','delay'=>200],
                ['photo'=>'storage/faculty/0ERGhG1iBRIoZXiA6lr7kCkHlPbv7F0aZwfmy6yb.jpg','name'=>'Principal',                       'title'=>'K.T.S.P.M\'s Law College, Khopoli',  'icon'=>'fa-balance-scale','cls'=>'lc-4','route'=>'mandal.principal',    'excerpt'=>'Law is not merely about knowing statutes — it is about understanding society, advocating for fairness, and standing up for those who cannot stand up for themselves.','delay'=>300],
            ] as $leader)
            <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="{{ $leader['delay'] }}">
                <div class="leader-card">
                    <div class="leader-card-top {{ $leader['cls'] }}">
                        <div class="leader-avatar-ring">
                            <img src="{{ $leader['photo'] ?? asset('images/leadership/' . Str::slug($leader['name']) . '.jpg') }}" alt="{{ $leader['name'] }}" class="leader-avatar">
                        </div>
                        <h6 style="color:#fff;font-size:.95rem;margin-bottom:4px;">{{ $leader['name'] }}</h6>
                        <small style="color:rgba(255,255,255,.65);font-size:.78rem;font-family:'Plus Jakarta Sans',sans-serif;">{{ $leader['title'] }}</small>
                    </div>
                    <div class="p-4 d-flex flex-column" style="flex:1;">
                        <p style="font-size:.875rem;color:#666;line-height:1.8;font-style:italic;flex:1;">
                            <i class="fas fa-quote-left me-1" style="color:var(--secondary);font-size:.75rem;"></i>
                            {{ $leader['excerpt'] }}
                            <i class="fas fa-quote-right ms-1" style="color:var(--secondary);font-size:.75rem;"></i>
                        </p>
                        <a href="{{ route($leader['route']) }}" class="btn-primary-c mt-3 text-center" style="display:block;font-size:.82rem;padding:9px 16px;">
                            <i class="fas fa-book-open me-1"></i> Read Full Message
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('mandal') }}" class="btn-outline-primary-c">
                <i class="fas fa-building me-2"></i>About K.T.S.P. Mandal
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════
     FACULTY
═════════════════════════════════════════════════════ --}}
@if($faculty->count())
<section class="py-5 py-lg-6" style="background:#fff;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Our Team</span>
            <h2 class="section-title mt-2">Meet Our <span class="highlight">Faculty</span></h2>
            <div class="title-divider center mt-3"></div>
            <p class="section-subtitle mt-3">Experienced legal educators shaping tomorrow's lawyers</p>
        </div>
        <div class="row g-3 justify-content-center">
            @foreach($faculty as $i => $member)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="{{ ($i % 6) * 60 }}">
                    <div class="faculty-card">
                        @if($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="faculty-avatar">
                        @else
                            <div class="faculty-avatar-placeholder">{{ strtoupper(substr($member->name, 0, 1)) }}</div>
                        @endif
                        <h6 style="font-size:.85rem;margin-bottom:3px;color:#1a1a1a;font-weight:600;">{{ $member->name }}</h6>
                        <small style="color:#999;font-size:.78rem;">{{ $member->designation }}</small>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('faculty.index') }}" class="btn-outline-primary-c">View All Faculty</a>
        </div>
    </div>
</section>
@endif

{{-- ══════════════════════════════════════════════════
     NEWS & EVENTS
═════════════════════════════════════════════════════ --}}
@if($news->count() || $events->count())
<section class="py-5 py-lg-6" style="background:var(--light);">
    <div class="container">
        <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-5" data-aos="fade-up">
            <div>
                <span class="section-label">Stay Updated</span>
                <h2 class="section-title mt-2">News &amp; <span class="highlight">Events</span></h2>
                <div class="title-divider mt-3"></div>
            </div>
            <a href="{{ route('news.index') }}" class="btn-outline-primary-c">View All</a>
        </div>
        <div class="row g-4">
            @foreach($news->merge($events)->sortByDesc('published_at')->take(3) as $i => $item)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="news-card card">
                        <div class="card-img-wrap">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                            @else
                                <div class="img-placeholder d-flex align-items-center justify-content-center"
                                     style="background:linear-gradient(135deg,var(--primary),var(--dark))">
                                    <i class="fas fa-{{ $item->type === 'event' ? 'calendar-alt' : 'newspaper' }} fa-3x text-white" style="opacity:.3"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body p-4">
                            <span class="news-badge {{ $item->type === 'event' ? 'news-badge-event' : 'news-badge-news' }}">
                                {{ ucfirst($item->type) }}
                            </span>
                            <h6 style="font-size:.95rem;line-height:1.5;color:#1a1a1a;margin-bottom:8px;">{{ Str::limit($item->title, 65) }}</h6>
                            <p style="font-size:.84rem;color:#888;line-height:1.7;margin:0;">{{ Str::limit($item->excerpt ?? strip_tags($item->content), 105) }}</p>
                        </div>
                        <div class="card-footer bg-transparent p-4 pt-0">
                            <a href="{{ route('news.show', $item->slug) }}" class="btn-outline-primary-c" style="font-size:.82rem;padding:8px 18px;display:inline-block;">
                                Read More <i class="fas fa-arrow-right ms-1" style="font-size:10px"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ══════════════════════════════════════════════════
     GALLERY
═════════════════════════════════════════════════════ --}}
@if($galleries->count())
<section class="py-5 py-lg-6" style="background:#fff;">
    <div class="container">
        <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-5" data-aos="fade-up">
            <div>
                <span class="section-label">Campus Life</span>
                <h2 class="section-title mt-2">Photo <span class="highlight">Gallery</span></h2>
                <div class="title-divider mt-3"></div>
            </div>
            <a href="{{ route('gallery.index') }}" class="btn-outline-primary-c">View All Photos</a>
        </div>
        <div class="row g-3">
            @foreach($galleries->take(6) as $i => $album)
                <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in" data-aos-delay="{{ $i * 60 }}">
                    <a href="{{ route('gallery.show', $album->slug) }}" class="gallery-thumb">
                        @if($album->cover_image)
                            <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}">
                        @else
                            <div style="width:100%;height:100%;background:linear-gradient(135deg,var(--primary),var(--dark));display:flex;align-items:center;justify-content:center;">
                                <i class="fas fa-images fa-2x text-white" style="opacity:.4"></i>
                            </div>
                        @endif
                        <div class="gallery-overlay">
                            <span class="gallery-title">{{ Str::limit($album->title, 28) }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ══════════════════════════════════════════════════
     TESTIMONIALS
═════════════════════════════════════════════════════ --}}
@if($testimonials->count())
<section class="py-5 py-lg-6" style="background:linear-gradient(160deg, var(--primary) 0%, var(--primary-dark) 50%, var(--accent) 100%);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span style="display:inline-block;background:rgba(255,255,255,.12);color:rgba(255,255,255,.85);font-size:11.5px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:5px 14px;border-radius:20px;margin-bottom:12px;">Student Stories</span>
            <h2 style="font-family:'Fraunces',serif;font-size:2rem;font-weight:700;color:#fff;margin:0;">What Our <span style="color:var(--secondary-light)">Students Say</span></h2>
        </div>
        <div class="row g-4">
            @foreach($testimonials as $i => $t)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="testimonial-card">
                        <div class="star-rating mb-3">
                            @for($s = 1; $s <= 5; $s++)
                                <i class="fas fa-star{{ $s > $t->rating ? '-o' : '' }}"></i>
                            @endfor
                        </div>
                        <p style="color:rgba(255,255,255,.88);font-size:.9rem;line-height:1.8;font-style:italic;margin-bottom:20px;">
                            "{{ $t->content }}"
                        </p>
                        <div class="d-flex align-items-center gap-3">
                            @if($t->photo)
                                <img src="{{ asset('storage/' . $t->photo) }}"
                                     style="width:42px;height:42px;border-radius:50%;object-fit:cover;border:2px solid rgba(200,151,58,.4);"
                                     alt="{{ $t->name }}">
                            @else
                                <div style="width:42px;height:42px;border-radius:50%;background:rgba(200,151,58,.25);display:flex;align-items:center;justify-content:center;color:var(--secondary-light);font-weight:700;font-family:'Fraunces',serif;font-size:1.1rem;flex-shrink:0;">
                                    {{ strtoupper(substr($t->name,0,1)) }}
                                </div>
                            @endif
                            <div>
                                <strong style="color:#fff;font-size:.9rem;display:block;">{{ $t->name }}</strong>
                                @if($t->course)
                                    <small style="color:var(--secondary-light);font-size:.78rem;">{{ $t->course }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ══════════════════════════════════════════════════
     ADMISSION CTA
═════════════════════════════════════════════════════ --}}
<section class="cta-section py-5 py-lg-6">
    <div class="container text-center" style="position:relative;z-index:1;" data-aos="fade-up">
        <span style="display:inline-block;background:rgba(200,151,58,.2);color:var(--secondary-light);font-size:11.5px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:5px 14px;border-radius:20px;margin-bottom:16px;">Admissions {{ date('Y') }}-{{ date('Y')+1 }}</span>
        <h2 style="font-family:'Fraunces',serif;font-size:clamp(1.8rem,4vw,2.8rem);font-weight:700;color:#fff;line-height:1.25;margin-bottom:14px;">
            Begin Your <span style="color:var(--secondary-light)">Legal Career</span> Journey Today
        </h2>
        <p style="color:rgba(255,255,255,.7);font-size:1rem;max-width:520px;margin:0 auto 36px;line-height:1.75;">
            Limited seats available for {{ date('Y') }}-{{ date('Y')+1 }} academic year.
            Take the first step towards a rewarding career in law.
        </p>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            <a href="{{ route('admissions.index') }}" class="hero-cta-primary" style="padding:14px 32px;font-size:.95rem;">
                <i class="fas fa-graduation-cap"></i> Apply for Admission
            </a>
            <a href="{{ route('contact') }}" class="hero-cta-secondary" style="padding:12px 30px;font-size:.95rem;">
                <i class="fas fa-phone-alt"></i> Contact Us
            </a>
        </div>
        <div class="d-flex flex-wrap gap-3 justify-content-center mt-4">
            <span style="color:rgba(255,255,255,.45);font-size:.8rem;display:flex;align-items:center;gap:6px;">
                <i class="fas fa-check-circle" style="color:var(--secondary-light)"></i> No Donation
            </span>
            <span style="color:rgba(255,255,255,.45);font-size:.8rem;display:flex;align-items:center;gap:6px;">
                <i class="fas fa-check-circle" style="color:var(--secondary-light)"></i> Merit Based Admission
            </span>
            <span style="color:rgba(255,255,255,.45);font-size:.8rem;display:flex;align-items:center;gap:6px;">
                <i class="fas fa-check-circle" style="color:var(--secondary-light)"></i> BCI Approved Degree
            </span>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
// Animated counters
function animateCounter(el) {
    const target = parseInt(el.dataset.target) || 0;
    if (target === 0) { el.textContent = '0'; return; }
    const duration = 1800;
    const step = Math.ceil(target / (duration / 16));
    let current = 0;
    const timer = setInterval(() => {
        current = Math.min(current + step, target);
        el.textContent = current;
        if (current >= target) clearInterval(timer);
    }, 16);
}

// Trigger counters when stats bar enters viewport
const counters = document.querySelectorAll('.counter-num');
if (counters.length) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.dataset.done) {
                entry.target.dataset.done = '1';
                animateCounter(entry.target);
            }
        });
    }, { threshold: 0.5 });
    counters.forEach(c => observer.observe(c));
}
</script>
@endpush
