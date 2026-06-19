@extends('layouts.front')

@php $title = "Secretary's Message"; @endphp

@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Secretary's Message</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('mandal') }}">K.T.S.P. Mandal</a></li>
                <li class="breadcrumb-item active text-white">Secretary's Message</li>
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
                    <div class="py-5 px-4" style="background:linear-gradient(135deg,#1a1a2e 0%,#2d2d50 100%);">
                        <div style="width:130px;height:130px;border-radius:50%;background:rgba(255,255,255,.1);border:4px solid var(--secondary);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                            <img src="https://kmccollege.in/storage/secretary.png" alt="Secretary" style="width:110px;height:110px;border-radius:50%;object-fit:cover;">
                        </div>
                        <h4 class="text-white mb-1">Shri. Kishor Balkrushna Patil</h4>
                        <span class="badge px-3 py-2 mt-1" style="background:var(--secondary);font-size:.9rem;">Secretary</span>
                        <p class="mt-2 mb-0" style="color:rgba(255,255,255,.75);font-size:.85rem;">K.T.S.P. Mandal, Khopoli</p>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted mb-0" style="font-size:.85rem;line-height:1.7;">
                            Overseeing the administrative and operational excellence of the Mandal's institutions with diligence and transparency.
                        </p>
                        <hr>
                        <a href="{{ route('mandal.governing-body') }}" class="btn btn-outline-dark btn-sm w-100">
                            <i class="fas fa-users me-2"></i>View Governing Body
                        </a>
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="col-lg-8" data-aos="fade-left">
                <div class="mb-4">
                    <span style="font-size:4rem;color:var(--secondary);line-height:1;font-family:Georgia,serif;">"</span>
                    <h2 class="text-maroon mt-n2">Secretary's Message</h2>
                </div>

                <div class="message-content" style="line-height:1.9;font-size:1.05rem;">
                    <p><strong>Dear Students, Parents, Teachers, and Well-Wishers,</strong></p>

                    <p>As the Secretary of the K.T.S.P. Mandal, I am deeply grateful for the trust and faith reposed in this institution by thousands of students and families over the years. Managing the administrative backbone of an educational trust requires both vision and precision, and it is a responsibility I carry with utmost dedication.</p>

                    <p>The K.T.S.P. Mandal was born out of a desire to educate — not just to transfer knowledge, but to instill values, build character, and empower individuals. From our very first school established in 1957 to the present-day Law College, every step has been guided by this central philosophy.</p>

                    <p>The establishment of <strong>K.T.S.P.M's Law College, Khopoli</strong> is the result of careful planning, extensive collaboration, and a firm belief in the potential of our students. We saw the need in our community — young people aspiring to enter the legal field but constrained by distance and resources. This college is our answer to that need.</p>

                    <p>As Secretary, I have personally overseen that all administrative, regulatory, and compliance requirements are met — the affiliation with the University of Mumbai, the recognition by the Bar Council of India, the recruitment of qualified faculty, and the provision of necessary infrastructure. We have ensured that every student who walks through our doors has access to the best possible resources.</p>

                    <p>Transparency, accountability, and student welfare are the pillars of our administrative approach. We maintain open lines of communication between students, parents, and management, and we are always receptive to feedback that helps us improve.</p>

                    <p>I urge students to take full advantage of the academic environment here. The LL.B. degree is a gateway to numerous career opportunities — litigation, corporate law, judiciary, legal advisory, NGOs, civil services, and academia. Be focused, be disciplined, and never lose sight of the ethical responsibilities that come with being a member of the legal fraternity.</p>

                    <p>To our team of dedicated educators and staff — your contribution is invaluable. The trust functions because of your commitment and sincerity.</p>

                    <p>I look forward to seeing our students grow into distinguished legal professionals who will make not just K.T.S.P. Mandal, but all of Maharashtra proud.</p>

                    <p style="margin-top:2rem;">With regards and warm wishes,</p>
                    <div class="mt-3 p-4 rounded-3 d-inline-block" style="background:var(--dark);color:#fff;min-width:280px;">
                        <h5 class="mb-1">Shri. Kishor Balkrushna Patil</h5>
                        <p class="mb-0 opacity-85">Secretary, K.T.S.P. Mandal</p>
                        <small style="color:var(--secondary)">Khalapur Taluka Shikshan Prasarak Mandal, Khopoli</small>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-3 flex-wrap">
                    <a href="{{ route('mandal.vice-chairman') }}" class="btn btn-outline-warning">
                        <i class="fas fa-arrow-left me-2"></i>Vice-Chairman's Message
                    </a>
                    <a href="{{ route('mandal.principal') }}" class="btn btn-outline-success">
                        <i class="fas fa-arrow-right me-2"></i>Principal's Message
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
