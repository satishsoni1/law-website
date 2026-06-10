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
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- AOS Animations -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- GLightbox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

    <style>
        :root {
            --primary: #7B1C1C;
            --secondary: #C8973A;
            --dark: #1a1a2e;
            --light: #f8f9fa;
        }
        * { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; color: #333; }
        h1,h2,h3,h4,h5 { font-family: 'Playfair Display', serif; }

        /* Navbar */
        .navbar { background: var(--dark) !important; padding: 0; }
        .navbar-top { background: var(--primary); padding: 5px 0; font-size: 13px; color: #fff; }
        .navbar-brand img { height: 60px; }
        .navbar-brand .college-name { color: #fff; font-family: 'Playfair Display', serif; font-size: 1.1rem; line-height: 1.2; }
        .navbar-nav .nav-link { color: rgba(255,255,255,.85) !important; font-weight: 500; padding: 18px 14px !important; transition: .2s; }
        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active { color: var(--secondary) !important; }
        .navbar-nav .dropdown-menu { border-radius: 0; border: none; box-shadow: 0 4px 20px rgba(0,0,0,.15); }
        .navbar-nav .dropdown-item:hover { background: var(--primary); color: #fff; }
        .btn-admission { background: var(--secondary); color: #fff !important; border-radius: 4px; padding: 8px 20px !important; margin: 8px; }
        .btn-admission:hover { background: #a57a2a; }

        /* Hero */
        .hero-slider .carousel-item { height: 580px; }
        .hero-slider .carousel-item img { height: 100%; object-fit: cover; filter: brightness(.6); }
        .hero-slider .carousel-caption { bottom: 30%; text-align: left; }
        .hero-slider .carousel-caption h1 { font-size: 3rem; font-weight: 700; text-shadow: 2px 2px 8px rgba(0,0,0,.5); }
        .hero-slider .carousel-caption p { font-size: 1.2rem; }

        /* Section styles */
        .section-title { position: relative; padding-bottom: 15px; margin-bottom: 30px; }
        .section-title::after { content: ''; position: absolute; bottom: 0; left: 0; width: 60px; height: 3px; background: var(--secondary); }
        .section-title.text-center::after { left: 50%; transform: translateX(-50%); }
        .bg-maroon { background: var(--primary); }
        .bg-gold { background: var(--secondary); }
        .text-maroon { color: var(--primary); }
        .text-gold { color: var(--secondary); }

        /* Notice board */
        .notice-board { background: var(--primary); color: #fff; border-radius: 8px; }
        .notice-item { border-bottom: 1px solid rgba(255,255,255,.15); padding: 10px 0; }
        .notice-item:last-child { border-bottom: none; }

        /* Course cards */
        .course-card { border: none; border-radius: 12px; box-shadow: 0 2px 20px rgba(0,0,0,.08); transition: .3s; overflow: hidden; }
        .course-card:hover { transform: translateY(-5px); box-shadow: 0 8px 30px rgba(0,0,0,.15); }
        .course-card .card-header { background: var(--primary); color: #fff; padding: 20px; }

        /* Faculty card */
        .faculty-card { text-align: center; border: none; border-radius: 12px; box-shadow: 0 2px 15px rgba(0,0,0,.08); transition: .3s; }
        .faculty-card:hover { transform: translateY(-5px); }
        .faculty-card img { width: 110px; height: 110px; object-fit: cover; border-radius: 50%; border: 4px solid var(--secondary); margin: 20px auto 10px; }

        /* Footer */
        footer { background: var(--dark); color: #aaa; }
        footer h5 { color: #fff; border-bottom: 2px solid var(--secondary); padding-bottom: 8px; margin-bottom: 15px; }
        footer a { color: #aaa; text-decoration: none; transition: .2s; }
        footer a:hover { color: var(--secondary); }

        /* WhatsApp */
        .whatsapp-float { position: fixed; bottom: 30px; right: 30px; z-index: 9999; }
        .whatsapp-float a { background: #25D366; color: #fff; width: 55px; height: 55px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px; box-shadow: 0 4px 15px rgba(0,0,0,.3); text-decoration: none; animation: pulse 2s infinite; }
        @keyframes pulse { 0%,100%{transform:scale(1)} 50%{transform:scale(1.05)} }

        /* Misc */
        .page-banner { background: linear-gradient(135deg, var(--primary) 0%, #4a0f0f 100%); color: #fff; padding: 60px 0; }
        .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,.6); }
        .breadcrumb-item a { color: var(--secondary); text-decoration: none; }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Top Bar -->
    <div class="navbar-top d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <i class="fas fa-phone me-2"></i>{{ \App\Models\Setting::get('phone', '+91 02192 000000') }}
                    <span class="mx-3">|</span>
                    <i class="fas fa-envelope me-2"></i>{{ \App\Models\Setting::get('email', 'info@ktspmlawcollege.edu.in') }}
                </div>
                <div class="col-md-5 text-end">
                    @php $fb = \App\Models\Setting::get('facebook_url'); $ig = \App\Models\Setting::get('instagram_url'); $yt = \App\Models\Setting::get('youtube_url'); @endphp
                    @if($fb) <a href="{{ $fb }}" class="text-white me-2"><i class="fab fa-facebook"></i></a> @endif
                    @if($ig) <a href="{{ $ig }}" class="text-white me-2"><i class="fab fa-instagram"></i></a> @endif
                    @if($yt) <a href="{{ $yt }}" class="text-white"><i class="fab fa-youtube"></i></a> @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                @php $logo = \App\Models\Setting::get('logo'); @endphp
                @if($logo)
                    <img src="{{ asset('storage/' . $logo) }}" alt="Logo">
                @else
                    <div style="width:55px;height:55px;background:var(--secondary);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:22px;font-weight:700;color:#fff;">K</div>
                @endif
                <div class="college-name">
                    K.T.S.P.M's<br><small style="font-size:.85rem;opacity:.8">Law College, Khopoli</small>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">About</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about') }}">About College</a></li>
                            <li><a class="dropdown-item" href="{{ route('infrastructure') }}">Infrastructure</a></li>
                            <li><a class="dropdown-item" href="{{ route('affiliation') }}">Affiliation & Approval</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('mandal*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">K.T.S.P. Mandal</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('mandal') }}"><i class="fas fa-building me-2 text-maroon"></i>About Mandal</a></li>
                            <li><a class="dropdown-item" href="{{ route('mandal.governing-body') }}"><i class="fas fa-users me-2 text-maroon"></i>Governing Body</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header">Messages</h6></li>
                            <li><a class="dropdown-item" href="{{ route('mandal.chairman') }}"><i class="fas fa-crown me-2" style="color:var(--secondary)"></i>Chairman's Message</a></li>
                            <li><a class="dropdown-item" href="{{ route('mandal.vice-chairman') }}"><i class="fas fa-star me-2" style="color:var(--secondary)"></i>Vice-Chairman's Message</a></li>
                            <li><a class="dropdown-item" href="{{ route('mandal.secretary') }}"><i class="fas fa-feather-alt me-2" style="color:var(--secondary)"></i>Secretary's Message</a></li>
                            <li><a class="dropdown-item" href="{{ route('mandal.principal') }}"><i class="fas fa-balance-scale me-2" style="color:var(--secondary)"></i>Principal's Message</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}" href="{{ route('courses.index') }}">Courses</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('faculty.*') ? 'active' : '' }}" href="{{ route('faculty.index') }}">Faculty</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('notices.*') ? 'active' : '' }}" href="{{ route('notices.index') }}">Notices</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">News & Events</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('downloads.*') ? 'active' : '' }}" href="{{ route('downloads.index') }}">Downloads</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                    <li class="nav-item"><a class="nav-link btn-admission" href="{{ route('admissions.index') }}"><i class="fas fa-graduation-cap me-1"></i>Apply Now</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Admission Open Banner -->
    @if(\App\Models\Setting::get('admission_open'))
        <div class="text-center py-2" style="background:var(--secondary);color:#fff;font-weight:600;">
            <i class="fas fa-bell me-2"></i>Admissions Open for {{ date('Y') }}-{{ date('Y')+1 }} — <a href="{{ route('admissions.index') }}" class="text-white text-decoration-underline">Apply Now</a>
        </div>
    @endif

    @yield('content')

    <!-- Footer -->
    <footer class="pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>{{ \App\Models\Setting::get('college_name', "K.T.S.P.M's Law College") }}</h5>
                    <p style="font-size:.9rem;">{{ \App\Models\Setting::get('about_short', 'Affiliated to University of Mumbai. Approved by Bar Council of India.') }}</p>
                    <p><i class="fas fa-map-marker-alt me-2 text-gold"></i>{{ \App\Models\Setting::get('address', 'Khopoli, Raigad, Maharashtra') }}</p>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right me-1" style="font-size:11px;color:var(--secondary)"></i>About Us</a></li>
                        <li><a href="{{ route('courses.index') }}"><i class="fas fa-chevron-right me-1" style="font-size:11px;color:var(--secondary)"></i>Courses</a></li>
                        <li><a href="{{ route('faculty.index') }}"><i class="fas fa-chevron-right me-1" style="font-size:11px;color:var(--secondary)"></i>Faculty</a></li>
                        <li><a href="{{ route('admissions.index') }}"><i class="fas fa-chevron-right me-1" style="font-size:11px;color:var(--secondary)"></i>Admissions</a></li>
                        <li><a href="{{ route('notices.index') }}"><i class="fas fa-chevron-right me-1" style="font-size:11px;color:var(--secondary)"></i>Notices</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right me-1" style="font-size:11px;color:var(--secondary)"></i>Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>More</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('anti-ragging') }}">Anti-Ragging</a></li>
                        <li><a href="{{ route('rti') }}">RTI</a></li>
                        <li><a href="{{ route('affiliation') }}">Affiliation</a></li>
                        <li><a href="{{ route('downloads.index') }}">Downloads</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Contact Us</h5>
                    <p><i class="fas fa-phone me-2 text-gold"></i>{{ \App\Models\Setting::get('phone', '+91 02192 000000') }}</p>
                    <p><i class="fas fa-envelope me-2 text-gold"></i>{{ \App\Models\Setting::get('email', 'info@ktspmlawcollege.edu.in') }}</p>
                    @php $map = \App\Models\Setting::get('google_map_embed'); @endphp
                    @if($map)
                        <div class="mt-2">{!! $map !!}</div>
                    @endif
                </div>
            </div>
            <hr style="border-color:rgba(255,255,255,.1)">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start" style="font-size:.85rem;">
                    {!! \App\Models\Setting::get('footer_text', '&copy; ' . date('Y') . " K.T.S.P.M's Law College, Khopoli. All rights reserved.") !!}
                </div>
                <div class="col-md-6 text-center text-md-end" style="font-size:.85rem;">
                    Affiliated to <strong style="color:#fff">University of Mumbai</strong> | Approved by <strong style="color:#fff">Bar Council of India</strong>
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
        AOS.init({ duration: 700, once: true });
        const lightbox = GLightbox({ selector: '.glightbox' });
    </script>
    @stack('scripts')
</body>
</html>
