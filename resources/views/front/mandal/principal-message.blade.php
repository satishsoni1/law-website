@extends('layouts.front')

@php $title = "Principal's Message"; @endphp

@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Principal's Message</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Principal's Message</li>
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
                    <div class="py-5 px-4" style="background:linear-gradient(135deg,#1a5c35 0%,#2d6a4f 100%);">
                        <div style="width:130px;height:130px;border-radius:50%;background:rgba(255,255,255,.15);border:4px solid var(--secondary);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                            <i class="fas fa-balance-scale fa-4x" style="color:var(--secondary);"></i>
                        </div>
                        <h4 class="text-white mb-1">Principal</h4>
                        <span class="badge px-3 py-2 mt-1" style="background:var(--secondary);font-size:.9rem;">Principal</span>
                        <p class="mt-2 mb-0" style="color:rgba(255,255,255,.75);font-size:.85rem;">K.T.S.P.M's Law College, Khopoli</p>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="fas fa-university text-maroon me-2"></i><small>Affiliated: University of Mumbai</small></li>
                            <li class="mb-2"><i class="fas fa-balance-scale text-maroon me-2"></i><small>Approved: Bar Council of India</small></li>
                            <li class="mb-2"><i class="fas fa-graduation-cap text-maroon me-2"></i><small>Program: LL.B. (3 Years)</small></li>
                            <li><i class="fas fa-map-marker-alt text-maroon me-2"></i><small>Khopoli, Raigad, Maharashtra</small></li>
                        </ul>
                        <hr>
                        <a href="{{ route('faculty.index') }}" class="btn btn-outline-success btn-sm w-100">
                            <i class="fas fa-chalkboard-teacher me-2"></i>Meet Our Faculty
                        </a>
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="col-lg-8" data-aos="fade-left">
                <div class="mb-4">
                    <span style="font-size:4rem;color:var(--secondary);line-height:1;font-family:Georgia,serif;">"</span>
                    <h2 class="text-maroon mt-n2">Principal's Message</h2>
                </div>

                <div class="message-content" style="line-height:1.9;font-size:1.05rem;">
                    <p><strong>Dear Students, Parents, and Esteemed Colleagues,</strong></p>

                    <p>It is my honour and privilege to welcome you to <strong>K.T.S.P.M's Law College, Khopoli</strong>, an institution dedicated to the noble pursuit of legal education and justice. As Principal, I am committed to fostering an academic environment where intellectual growth, ethical development, and professional excellence flourish together.</p>

                    <p>Law is one of the most profound professions. It is not merely about knowing statutes and case laws — it is about understanding society, advocating for fairness, and standing up for those who cannot stand up for themselves. The LL.B. program at our college is designed to instill in you not just legal knowledge, but also critical thinking, analytical reasoning, communication skills, and a deep sense of justice.</p>

                    <p>Our college, affiliated to the <strong>University of Mumbai</strong> and approved by the <strong>Bar Council of India</strong>, offers a rigorous three-year curriculum that covers all major areas of law — Constitutional Law, Criminal Law, Civil Law, Labour Law, Family Law, Jurisprudence, and more. Beyond the curriculum, we provide practical exposure through moot court competitions, legal aid camps, seminars, workshops, and interactions with practicing advocates and judges.</p>

                    <p>We are fortunate to have a faculty that combines academic excellence with practical experience. Our teachers bring the courtroom into the classroom, making legal education not just theoretical but deeply relevant and engaging. I encourage students to engage actively with their teachers, participate in discussions, and think beyond the textbook.</p>

                    <p>I firmly believe that a college is more than a place of instruction — it is a community. Here at K.T.S.P.M's Law College, we are building a community of learners who respect each other, collaborate, and grow together. I encourage you to participate in student activities, take on leadership roles, and develop those soft skills that will serve you well throughout your career.</p>

                    <p>To our students who are just beginning their legal journey — embrace the challenges ahead with courage. There will be demanding examinations, complex concepts to master, and long hours of reading. But every great lawyer has walked this path, and it is a path worth walking. Stay focused, stay ethical, and never forget why you chose law.</p>

                    <p>To parents — thank you for entrusting your children to us. We take this responsibility seriously and will do everything in our power to ensure your child's academic success and personal growth.</p>

                    <p>As an institution, we are committed to continuous improvement — enhancing our library resources, organizing more industry interactions, improving our infrastructure, and expanding our alumni network. We want K.T.S.P.M's Law College to be recognized not just in Raigad District, but across Maharashtra as a centre of excellence in legal education.</p>

                    <p>I invite you to be part of this journey — a journey towards justice, knowledge, and a better society.</p>

                    <p style="margin-top:2rem;">With warm regards and best wishes for your future,</p>
                    <div class="mt-3 p-4 rounded-3 d-inline-block" style="background:linear-gradient(135deg,#1a5c35,#2d6a4f);color:#fff;min-width:300px;">
                        <h5 class="mb-1">Principal</h5>
                        <p class="mb-0 opacity-85">K.T.S.P.M's Law College, Khopoli</p>
                        <small style="color:var(--secondary)">Affiliated to University of Mumbai</small>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-3 flex-wrap">
                    <a href="{{ route('mandal.secretary') }}" class="btn btn-outline-dark">
                        <i class="fas fa-arrow-left me-2"></i>Secretary's Message
                    </a>
                    <a href="{{ route('admissions.index') }}" class="btn" style="background:var(--primary);color:#fff">
                        <i class="fas fa-graduation-cap me-2"></i>Apply for Admission
                    </a>
                    <a href="{{ route('courses.index') }}" class="btn btn-outline-danger">
                        <i class="fas fa-book me-2"></i>View Courses
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Quote Strip --}}
<section class="py-4 mt-5" style="background:var(--primary);">
    <div class="container text-center text-white">
        <p class="mb-0 fst-italic" style="font-size:1.15rem;">
            <i class="fas fa-quote-left me-2" style="color:var(--secondary)"></i>
            "The good lawyer is not the man who has an eye to every side and angle of contingency, and qualifies all his qualifications, but who throws himself on your part so heartily, that he can get you out of a scrape."
            <i class="fas fa-quote-right ms-2" style="color:var(--secondary)"></i>
        </p>
        <small class="opacity-75 mt-2 d-block">— Ralph Waldo Emerson</small>
    </div>
</section>

@endsection
