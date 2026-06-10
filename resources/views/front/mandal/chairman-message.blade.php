@extends('layouts.front')

@php $title = "Chairman's Message"; @endphp

@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Chairman's Message</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('mandal') }}">K.T.S.P. Mandal</a></li>
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
                        <div style="width:130px;height:130px;border-radius:50%;background:rgba(255,255,255,.15);border:4px solid var(--secondary);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                            <i class="fas fa-crown fa-4x" style="color:var(--secondary);"></i>
                        </div>
                        <h4 class="text-white mb-1">Shri. Santosh Gurunath Jangam</h4>
                        <span class="badge px-3 py-2 mt-1" style="background:var(--secondary);font-size:.9rem;">Chairman</span>
                        <p class="mt-2 mb-0" style="color:rgba(255,255,255,.75);font-size:.85rem;">K.T.S.P. Mandal, Khopoli</p>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted mb-0" style="font-size:.85rem;line-height:1.7;">
                            Providing visionary leadership to the K.T.S.P. Mandal and guiding educational transformation in Khalapur Taluka and Raigad District since decades.
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

                    <p>It is with immense pride and a deep sense of responsibility that I address you as the Chairman of the Khalapur Taluka Shikshan Prasarak Mandal (K.T.S.P. Mandal). Since our establishment in 1957, we have been steadfast in our commitment to providing quality education to the students of Khalapur Taluka and the wider Raigad District.</p>

                    <p>The K.T.S.P. Mandal was founded on the belief that education is the most powerful instrument for social transformation. Over the past six-and-a-half decades, we have worked tirelessly to translate this belief into action — building schools, colleges, polytechnic institutes, and now a Law College — all dedicated to the holistic development of our students.</p>

                    <p>The establishment of <strong>K.T.S.P.M's Law College, Khopoli</strong>, affiliated to the University of Mumbai and approved by the Bar Council of India, represents a significant milestone in our educational journey. Law is not merely a profession — it is a calling to serve justice, uphold rights, and contribute to a fair and equitable society. We envisioned this college as a platform where young minds from our region could pursue this noble calling without having to travel far from home.</p>

                    <p>I urge every student to make the most of the opportunities provided by this institution. Be diligent in your studies, be ethical in your conduct, and be bold in your aspirations. The legal profession offers immense scope — in courts, in corporate sectors, in judiciary, in academia, and in public service. The world needs lawyers who are not just knowledgeable, but who are also compassionate and committed to justice.</p>

                    <p>To our faculty and staff, I extend my gratitude for your dedication and hard work. The strength of any institution lies in its people, and we are fortunate to have a committed team that places the student's interest first.</p>

                    <p>To the parents who have placed their trust in us — we honour that trust with our deepest commitment. We will ensure that your children receive the best possible education in a safe, supportive, and inspiring environment.</p>

                    <p>As we move forward, the Mandal will continue to invest in infrastructure, faculty development, and student welfare. Our goal is not just to produce graduates, but to build the future leaders, advocates, and citizens of a better India.</p>

                    <p style="margin-top:2rem;">With warm regards and best wishes,</p>
                    <div class="mt-3 p-4 rounded-3" style="background:var(--primary);color:#fff;display:inline-block;min-width:280px;">
                        <h5 class="mb-1">Shri. Santosh Gurunath Jangam</h5>
                        <p class="mb-0 opacity-75">Chairman, K.T.S.P. Mandal</p>
                        <small class="opacity-60">Khalapur Taluka Shikshan Prasarak Mandal, Khopoli</small>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-3 flex-wrap">
                    <a href="{{ route('mandal.vice-chairman') }}" class="btn btn-outline-warning">
                        <i class="fas fa-arrow-right me-2"></i>Vice-Chairman's Message
                    </a>
                    <a href="{{ route('mandal') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-building me-2"></i>About Mandal
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
