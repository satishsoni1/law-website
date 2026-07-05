@extends('layouts.front')

@php $title = "Chairman's Message"; @endphp

@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Chairman's Message</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Chairman's Message</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-start">

            {{-- Profile Card --}}
            <div class="col-lg-4" data-aos="fade-right">
                <div class="card border-0 shadow text-center" style="border-radius:16px;overflow:hidden;position:sticky;top:90px;">
                    <div class="py-5 px-4" style="background:linear-gradient(135deg,var(--primary) 0%,#4a0f0f 100%);">
                        <div style="width:130px;height:130px;border-radius:50%;background:rgba(255,255,255,.15);border:4px solid var(--secondary);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;overflow:hidden;">
                            <img src="{{ asset('images/leadership/narendra-shah.svg') }}" alt="Mr. Narendra Shah" style="width:110px;height:110px;border-radius:50%;object-fit:cover;">
                        </div>
                        <h4 class="text-white mb-1">Mr. Narendra Shah</h4>
                        <span class="badge px-3 py-2 mt-1" style="background:var(--secondary);font-size:.9rem;">Chairman</span>
                        <p class="mt-2 mb-0" style="color:rgba(255,255,255,.75);font-size:.85rem;">K.T.S.P.M's Law College, Khopoli</p>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted mb-0" style="font-size:.85rem;line-height:1.7;">
                            Providing dedicated leadership to K.T.S.P.M's Law College and guiding its growth as a centre of quality legal education in Raigad District.
                        </p>
                        <hr>
                        <a href="{{ route('mandal.governing-body') }}" class="btn btn-outline-danger btn-sm w-100">
                            <i class="fas fa-users me-2"></i>View Governing Body
                        </a>
                    </div>
                </div>
            </div>

            {{-- Message Content --}}
            <div class="col-lg-8" data-aos="fade-left">
                <div class="mb-4">
                    <span style="font-size:4rem;color:var(--secondary);line-height:1;font-family:Georgia,serif;">"</span>
                    <h2 class="text-maroon mt-n2">Chairman's Message</h2>
                </div>

                <div class="message-content" style="line-height:1.9;font-size:1.05rem;">
                    <p><strong>Dear Students, Parents, Faculty, and Well-Wishers,</strong></p>

                    <p>It gives me great pleasure and a deep sense of responsibility to serve as Chairman of K.T.S.P.M's Law College, Khopoli. Our college was established with a clear purpose — to bring quality, affordable legal education to the doorstep of students in Khalapur Taluka and the wider Raigad District, so that talent is never held back by distance or circumstance.</p>

                    <p>Legal education today calls for more than just command over statutes and case law. It calls for integrity, clarity of thought, and a genuine commitment to justice. At our college, we strive to nurture these qualities in every student, alongside a strong academic foundation, so that they are ready to serve as capable and ethical professionals in courts, in corporate practice, in public service, and beyond.</p>

                    <p>We continue to invest in our infrastructure, our library, and the development of our faculty, with one goal in mind — creating an environment where students can learn, question, and grow with confidence. None of this would be possible without the tireless efforts of our teaching and non-teaching staff, whose dedication forms the backbone of this institution.</p>

                    <p>To our students, I say this: approach your studies with discipline and your conduct with integrity. The legal profession will test both, and it rewards those who hold firmly to their principles. To the parents who have entrusted us with their children's futures, I assure you that this institution will remain committed to their all-round development.</p>

                    <p>I look forward to working alongside our faculty, students, and the K.T.S.P. Mandal leadership to take this college to greater heights in the years ahead.</p>

                    <p style="margin-top:2rem;">With warm regards and best wishes,</p>
                    <div class="mt-3 p-4 rounded-3" style="background:var(--primary);color:#fff;display:inline-block;min-width:280px;">
                        <h5 class="mb-1">Mr. Narendra Shah</h5>
                        <p class="mb-0 opacity-75">Chairman, K.T.S.P.M's Law College</p>
                        <small class="opacity-60">K.T.S.P.M's Law College, Khopoli</small>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-3 flex-wrap">
                    <a href="{{ route('mandal.principal') }}" class="btn btn-outline-warning">
                        <i class="fas fa-arrow-right me-2"></i>Principal's Message
                    </a>
                    <a href="{{ route('mandal') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-building me-2"></i>About K.T.S.P. Mandal
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
