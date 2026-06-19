<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon | K.T.S.P.M's Law College, Khopoli</title>
    <meta name="description" content="K.T.S.P.M's Law College, Khopoli – Our website is launching soon. Stay tuned for exciting updates.">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,600;0,9..144,700;1,9..144,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary:      #162450;
            --primary-dark: #0a1228;
            --secondary:    #C8973A;
            --secondary-light: #e0b057;
            --accent:       #8B1A1A;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html, body {
            height: 100%;
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        /* ── Background ── */
        .cs-bg {
            min-height: 100vh;
            background: radial-gradient(ellipse at 30% 50%, rgba(22,36,80,.95) 0%, #0a1020 70%),
                        linear-gradient(160deg, #0a1228 0%, #162450 55%, #0a1020 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 40px 20px;
        }

        /* animated radial rings */
        .cs-ring {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(200,151,58,.12);
            animation: ringExpand var(--d, 6s) ease-out var(--delay, 0s) infinite;
            pointer-events: none;
        }
        @keyframes ringExpand {
            0%   { transform: scale(.4); opacity: 0; }
            30%  { opacity: 1; }
            100% { transform: scale(1.6); opacity: 0; }
        }

        /* gold particles */
        .cs-particle {
            position: absolute;
            border-radius: 50%;
            background: var(--secondary);
            opacity: 0;
            animation: particleFloat var(--pd, 4s) ease-in-out var(--pdelay, 0s) infinite;
            pointer-events: none;
        }
        @keyframes particleFloat {
            0%   { transform: translateY(0) scale(1); opacity: 0; }
            20%  { opacity: .5; }
            80%  { opacity: .15; }
            100% { transform: translateY(-120px) scale(.2); opacity: 0; }
        }

        /* ── Logo ── */
        .cs-logo {
            width: 110px; height: 110px;
            object-fit: contain;
            filter: drop-shadow(0 0 28px rgba(200,151,58,.5));
            animation: logoPulse 3s ease-in-out infinite;
            position: relative; z-index: 2;
        }
        @keyframes logoPulse {
            0%, 100% { filter: drop-shadow(0 0 28px rgba(200,151,58,.5)); }
            50%       { filter: drop-shadow(0 0 48px rgba(200,151,58,.8)); }
        }

        /* ── Main text ── */
        .cs-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(200,151,58,.15);
            border: 1px solid rgba(200,151,58,.35);
            color: var(--secondary-light);
            font-size: 11px; font-weight: 700;
            letter-spacing: .14em; text-transform: uppercase;
            padding: 6px 18px; border-radius: 30px;
            position: relative; z-index: 2;
        }

        .cs-title {
            font-family: 'Fraunces', serif;
            font-size: clamp(2.5rem, 8vw, 5rem);
            font-weight: 700;
            color: #fff;
            line-height: 1.1;
            position: relative; z-index: 2;
        }
        .cs-title .gold { color: var(--secondary-light); }

        .cs-subtitle {
            color: rgba(255,255,255,.6);
            font-size: clamp(.9rem, 2.5vw, 1.1rem);
            max-width: 540px;
            line-height: 1.7;
            position: relative; z-index: 2;
        }

        /* ── Countdown ── */
        .countdown-wrap {
            display: flex; gap: 16px; flex-wrap: wrap; justify-content: center;
            position: relative; z-index: 2;
        }
        .countdown-box {
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(200,151,58,.22);
            border-radius: 16px;
            padding: 18px 22px;
            min-width: 90px;
            text-align: center;
            backdrop-filter: blur(8px);
            transition: border-color .3s;
        }
        .countdown-box:hover { border-color: rgba(200,151,58,.55); }
        .countdown-num {
            font-family: 'Fraunces', serif;
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 700;
            color: var(--secondary-light);
            line-height: 1;
            display: block;
        }
        .countdown-label {
            display: block;
            font-size: .68rem; font-weight: 700;
            letter-spacing: .12em; text-transform: uppercase;
            color: rgba(255,255,255,.45);
            margin-top: 6px;
        }

        /* ── Divider line ── */
        .cs-divider {
            display: flex; align-items: center; gap: 14px;
            position: relative; z-index: 2; width: 100%; max-width: 500px;
        }
        .cs-divider::before, .cs-divider::after {
            content: '';
            flex: 1; height: 1px;
            background: linear-gradient(90deg, transparent, rgba(200,151,58,.35), transparent);
        }
        .cs-divider span {
            color: var(--secondary); font-size: .7rem;
            font-weight: 700; letter-spacing: .16em; text-transform: uppercase;
        }

        /* ── Contact chips ── */
        .cs-contact-chip {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.12);
            color: rgba(255,255,255,.75);
            padding: 9px 18px; border-radius: 50px;
            font-size: .85rem; font-weight: 500;
            text-decoration: none;
            transition: all .3s ease;
            backdrop-filter: blur(6px);
        }
        .cs-contact-chip:hover {
            background: rgba(200,151,58,.2);
            border-color: rgba(200,151,58,.5);
            color: #fff;
        }
        .cs-contact-chip i { color: var(--secondary); font-size: 13px; }

        /* ── Accred badges ── */
        .cs-accred {
            display: inline-flex; align-items: center; gap: 7px;
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.1);
            color: rgba(255,255,255,.55);
            font-size: .75rem; font-weight: 600;
            padding: 6px 14px; border-radius: 8px;
        }
        .cs-accred i { color: var(--secondary); font-size: 11px; }

        /* ── Progress bar ── */
        .cs-progress-wrap {
            position: relative; z-index: 2;
            width: 100%; max-width: 420px;
        }
        .cs-progress-label {
            display: flex; justify-content: space-between;
            font-size: .78rem; color: rgba(255,255,255,.45); margin-bottom: 8px;
        }
        .cs-progress-bar {
            height: 4px; background: rgba(255,255,255,.08);
            border-radius: 4px; overflow: hidden;
        }
        .cs-progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--secondary), var(--secondary-light));
            border-radius: 4px;
            width: 75%;
            animation: progressShimmer 2s linear infinite;
            background-size: 200%;
        }
        @keyframes progressShimmer {
            0%   { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* ── Footer strip ── */
        .cs-footer {
            position: relative; z-index: 2;
            border-top: 1px solid rgba(255,255,255,.06);
            color: rgba(255,255,255,.3);
            font-size: .75rem;
            width: 100%; text-align: center;
            padding-top: 20px; margin-top: 10px;
        }

        @media (max-width: 576px) {
            .countdown-box { min-width: 70px; padding: 14px 14px; }
        }
    </style>
</head>
<body>

<div class="cs-bg">

    {{-- Animated rings --}}
    <div class="cs-ring" style="width:320px;height:320px;--d:5s;--delay:0s;"></div>
    <div class="cs-ring" style="width:520px;height:520px;--d:5s;--delay:1s;border-color:rgba(200,151,58,.07);"></div>
    <div class="cs-ring" style="width:740px;height:740px;--d:5s;--delay:2s;border-color:rgba(200,151,58,.04);"></div>

    {{-- Content --}}
    <div class="text-center d-flex flex-column align-items-center gap-4" style="max-width:680px;width:100%;">

        {{-- Logo --}}
        <img src="{{ asset('images/logo.png') }}" alt="K.T.S.P.M's Law College" class="cs-logo">

        {{-- College name --}}
        <div style="position:relative;z-index:2;">
            <p style="color:var(--secondary-light);font-size:.8rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;margin-bottom:4px;">
                K.T.S.P.M's Law College, Khopoli
            </p>
            <p style="color:rgba(255,255,255,.35);font-size:.72rem;letter-spacing:.08em;">
                Affiliated to University of Mumbai &nbsp;·&nbsp; Approved by Bar Council of India
            </p>
        </div>

        {{-- Badge --}}
        <div class="cs-badge">
            <i class="fas fa-circle" style="font-size:6px;color:var(--secondary);animation:blinkDot 1.4s ease-in-out infinite;"></i>
            Website Launching Soon
        </div>
        <style>@keyframes blinkDot{0%,100%{opacity:1}50%{opacity:.2}}</style>

        {{-- Headline --}}
        <h1 class="cs-title">
            We're <span class="gold">Coming</span><br>Soon
        </h1>

        <p class="cs-subtitle">
            Our new website is currently under construction. We are working hard to bring you an improved experience. Stay tuned!
        </p>

        {{-- Countdown --}}
        <div class="countdown-wrap" id="countdown">
            <div class="countdown-box">
                <span class="countdown-num" id="cd-days">00</span>
                <span class="countdown-label">Days</span>
            </div>
            <div class="countdown-box">
                <span class="countdown-num" id="cd-hours">00</span>
                <span class="countdown-label">Hours</span>
            </div>
            <div class="countdown-box">
                <span class="countdown-num" id="cd-minutes">00</span>
                <span class="countdown-label">Minutes</span>
            </div>
            <div class="countdown-box">
                <span class="countdown-num" id="cd-seconds">00</span>
                <span class="countdown-label">Seconds</span>
            </div>
        </div>

        {{-- Progress --}}
        <div class="cs-progress-wrap">
            <div class="cs-progress-label">
                <span><i class="fas fa-code me-1" style="color:var(--secondary)"></i>Website Progress</span>
                <span>75%</span>
            </div>
            <div class="cs-progress-bar">
                <div class="cs-progress-fill"></div>
            </div>
        </div>

        {{-- Divider --}}
        <div class="cs-divider"><span>Contact Us</span></div>

        {{-- Contact --}}
        <div class="d-flex flex-wrap gap-3 justify-content-center" style="position:relative;z-index:2;">
            @php
                $phone = \App\Models\Setting::get('phone', '+91 02192 282828');
                $email = \App\Models\Setting::get('email', 'info@ktspmlawcollege.edu.in');
                $addr  = \App\Models\Setting::get('address', 'Khopoli, Raigad, Maharashtra - 410203');
            @endphp
            <a href="tel:{{ $phone }}" class="cs-contact-chip">
                <i class="fas fa-phone-alt"></i> {{ $phone }}
            </a>
            <a href="mailto:{{ $email }}" class="cs-contact-chip">
                <i class="fas fa-envelope"></i> {{ $email }}
            </a>
            <span class="cs-contact-chip" style="cursor:default;">
                <i class="fas fa-map-marker-alt"></i> {{ $addr }}
            </span>
        </div>

        {{-- Accred badges --}}
        <div class="d-flex flex-wrap gap-2 justify-content-center" style="position:relative;z-index:2;">
            <span class="cs-accred"><i class="fas fa-university"></i> Affiliated – University of Mumbai</span>
            <span class="cs-accred"><i class="fas fa-balance-scale"></i> Approved – Bar Council of India</span>
        </div>

        {{-- Admin link (discreet) --}}
        <a href="{{ route('admin.login') }}" class="cs-footer text-decoration-none" style="color:rgba(255,255,255,.2);">
            &copy; {{ date('Y') }} K.T.S.P.M's Law College, Khopoli. All rights reserved.
            &nbsp;·&nbsp; <span style="color:rgba(255,255,255,.12);">Admin</span>
        </a>

    </div>
</div>

<script>
    // Countdown to launch date — change this date as needed
    const launchDate = new Date('{{ \App\Models\Setting::get('launch_date', date('Y-m-d', strtotime('+30 days'))) }}T00:00:00').getTime();

    function updateCountdown() {
        const now  = Date.now();
        const diff = launchDate - now;

        if (diff <= 0) {
            document.getElementById('cd-days').textContent    = '00';
            document.getElementById('cd-hours').textContent   = '00';
            document.getElementById('cd-minutes').textContent = '00';
            document.getElementById('cd-seconds').textContent = '00';
            return;
        }

        const days    = Math.floor(diff / 86400000);
        const hours   = Math.floor((diff % 86400000) / 3600000);
        const minutes = Math.floor((diff % 3600000) / 60000);
        const seconds = Math.floor((diff % 60000) / 1000);

        document.getElementById('cd-days').textContent    = String(days).padStart(2, '0');
        document.getElementById('cd-hours').textContent   = String(hours).padStart(2, '0');
        document.getElementById('cd-minutes').textContent = String(minutes).padStart(2, '0');
        document.getElementById('cd-seconds').textContent = String(seconds).padStart(2, '0');
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);

    // Generate gold particles
    (function () {
        const bg = document.querySelector('.cs-bg');
        for (let i = 0; i < 18; i++) {
            const p = document.createElement('div');
            p.className = 'cs-particle';
            const size = Math.random() * 3 + 2;
            p.style.cssText = [
                'width:' + size + 'px',
                'height:' + size + 'px',
                'left:' + (Math.random() * 100) + '%',
                'top:' + (50 + Math.random() * 45) + '%',
                '--pd:' + (3 + Math.random() * 3) + 's',
                '--pdelay:' + (Math.random() * 3) + 's',
            ].join(';');
            bg.appendChild(p);
        }
    })();
</script>

</body>
</html>
