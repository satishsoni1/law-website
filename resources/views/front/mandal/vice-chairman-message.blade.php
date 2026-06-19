@extends('layouts.front')

@php $title = "Vice-Chairman's Message"; @endphp

@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Vice-Chairman's Message</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('mandal') }}">K.T.S.P. Mandal</a></li>
                <li class="breadcrumb-item active text-white">Vice-Chairman's Message</li>
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
                    <div class="py-5 px-4" style="background:linear-gradient(135deg,#8a6200 0%,#C8973A 100%);">
                        <div style="width:130px;height:130px;border-radius:50%;background:rgba(255,255,255,.15);border:4px solid #fff;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                            <img src="https://kmccollege.in/storage/Jalgaonkar%20sir.jpg" alt="Vice-Chairman" style="width:110px;height:110px;border-radius:50%;object-fit:cover;">
                        </div>
                        <h4 class="text-white mb-1">Shri. Abubakar Aadam Jalgaonkar</h4>
                        <span class="badge px-3 py-2 mt-1" style="background:var(--primary);font-size:.9rem;">Vice-Chairman</span>
                        <p class="mt-2 mb-0" style="color:rgba(255,255,255,.8);font-size:.85rem;">K.T.S.P. Mandal, Khopoli</p>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted mb-0" style="font-size:.85rem;line-height:1.7;">
                            Instrumental in expanding the Mandal's reach and ensuring inclusive education for all communities in Khalapur Taluka.
                        </p>
                        <hr>
                        <a href="{{ route('mandal.governing-body') }}" class="btn btn-outline-warning btn-sm w-100">
                            <i class="fas fa-users me-2"></i>View Governing Body
                        </a>
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="col-lg-8" data-aos="fade-left">
                <div class="mb-4">
                    <span style="font-size:4rem;color:var(--secondary);line-height:1;font-family:Georgia,serif;">"</span>
                    <h2 class="text-maroon mt-n2">Vice-Chairman's Message</h2>
                </div>

                <div class="message-content" style="line-height:1.9;font-size:1.05rem;">
                    <p><strong>Dear Students, Parents, and Distinguished Guests,</strong></p>

                    <p>It fills my heart with joy and a profound sense of responsibility to address you as the Vice-Chairman of the K.T.S.P. Mandal. Since its inception in 1957, this institution has been a beacon of educational progress in the Khalapur Taluka, and I am honoured to contribute to this legacy.</p>

                    <p>Education, at its core, is about building people — shaping minds, nurturing values, and creating opportunities. The K.T.S.P. Mandal has always believed that every student, regardless of their social or economic background, deserves access to quality education. This belief has driven us to establish institutions across multiple disciplines — from primary schools to professional colleges.</p>

                    <p>The founding of <strong>K.T.S.P.M's Law College, Khopoli</strong>, is a proud achievement that brings legal education within reach of students from rural and semi-urban areas of Raigad District. For too long, students who aspired to pursue law had to travel to distant cities. With this college, we have brought that dream home.</p>

                    <p>The legal profession is among the most significant careers one can choose. Lawyers are the guardians of the Constitution, the voice of the unheard, and the instruments of justice. I encourage every student who joins this institution to embrace these responsibilities with sincerity and passion.</p>

                    <p>Our Mandal is committed to ensuring that K.T.S.P.M's Law College maintains the highest standards of education. We will continue to invest in experienced faculty, a well-equipped library, moot court facilities, and student development programs. We believe that infrastructure and mentorship together shape the best legal minds.</p>

                    <p>I also wish to recognize the tireless dedication of our teaching and non-teaching staff. Your commitment to the students' success is the backbone of this institution. And to our students — I want you to know that the Mandal stands behind you every step of the way.</p>

                    <p>Let us together work towards building a community of justice, equality, and integrity — one student at a time.</p>

                    <p style="margin-top:2rem;">With sincere regards,</p>
                    <div class="mt-3 p-4 rounded-3 d-inline-block" style="background:linear-gradient(135deg,#8a6200,#C8973A);color:#fff;min-width:280px;">
                        <h5 class="mb-1">Shri. Abubakar Aadam Jalgaonkar</h5>
                        <p class="mb-0 opacity-85">Vice-Chairman, K.T.S.P. Mandal</p>
                        <small class="opacity-75">Khalapur Taluka Shikshan Prasarak Mandal, Khopoli</small>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-3 flex-wrap">
                    <a href="{{ route('mandal.chairman') }}" class="btn btn-outline-danger">
                        <i class="fas fa-arrow-left me-2"></i>Chairman's Message
                    </a>
                    <a href="{{ route('mandal.secretary') }}" class="btn btn-outline-dark">
                        <i class="fas fa-arrow-right me-2"></i>Secretary's Message
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
