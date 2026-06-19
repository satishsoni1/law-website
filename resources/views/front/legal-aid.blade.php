@extends('layouts.front')

@php $title = "Legal Aid Committee"; @endphp

@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Legal Aid Committee</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Legal Aid Committee</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-5">

            {{-- About Legal Aid --}}
            <div class="col-lg-7" data-aos="fade-right">
                <span class="section-label">Social Responsibility</span>
                <h2 class="section-title text-maroon mt-2">Legal Aid Services</h2>
                <div class="title-divider mb-4"></div>

                <p class="lead" style="font-size:1.05rem;line-height:1.85;">
                    <strong>K.T.S.P.M's Law College</strong> provides <strong>free legal aid services</strong> to create legal awareness among the poor and needy people of society.
                </p>
                <p style="line-height:1.85;">
                    The Legal Aid Committee of K.T.S.P.M's Law College organises workshops and legal aid camps to give information to law students and the poor and needy people about their legal rights, available remedies, and the legal aid system in India.
                </p>
                <p style="line-height:1.85;">
                    Through these initiatives, the college fulfils its social responsibility by bridging the gap between law and the common man, ensuring that lack of financial resources is never a barrier to accessing justice.
                </p>

                {{-- Activities --}}
                <div class="mt-4">
                    <h5 class="text-maroon mb-3"><i class="fas fa-hands-helping me-2"></i>Key Activities</h5>
                    <div class="row g-3">
                        @foreach([
                            ['icon'=>'fa-campground','title'=>'Legal Aid Camps','desc'=>'Organising camps in local communities to provide free legal guidance.'],
                            ['icon'=>'fa-chalkboard','title'=>'Workshops','desc'=>'Conducting workshops on legal rights for students and needy people.'],
                            ['icon'=>'fa-balance-scale','title'=>'Awareness Drives','desc'=>'Creating awareness about rights, remedies, and legal aid provisions.'],
                            ['icon'=>'fa-hands','title'=>'Free Legal Help','desc'=>'Providing free legal assistance to poor and marginalised sections.'],
                        ] as $act)
                            <div class="col-sm-6">
                                <div class="d-flex gap-3 p-3 rounded-3" style="background:#f8f9fa;">
                                    <div class="flex-shrink-0" style="width:44px;height:44px;background:var(--primary);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                                        <i class="fas {{ $act['icon'] }} text-white" style="font-size:.95rem;"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1" style="font-size:.9rem;">{{ $act['title'] }}</h6>
                                        <p class="mb-0 text-muted" style="font-size:.8rem;">{{ $act['desc'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Committee Members --}}
            <div class="col-lg-5" data-aos="fade-left">
                <div class="card border-0 shadow" style="border-radius:16px;overflow:hidden;">
                    <div class="card-header py-3 px-4" style="background:var(--primary);">
                        <h5 class="text-white mb-0">
                            <i class="fas fa-users me-2" style="color:var(--secondary);"></i>Committee Members
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        @php
                            $members = [
                                ['name'=>'Varsha Ghare','role'=>'I/C Principal','type'=>'faculty','icon'=>'fa-user-tie'],
                                ['name'=>'Meghana Polekar','role'=>'Assist. Professor','type'=>'faculty','icon'=>'fa-chalkboard-teacher'],
                                ['name'=>'Kevina Gaikwad','role'=>'Student Member','type'=>'student','icon'=>'fa-user-graduate'],
                                ['name'=>'Sandeep Ovhal','role'=>'Student Member','type'=>'student','icon'=>'fa-user-graduate'],
                                ['name'=>'Anushree Kalambkar','role'=>'Student Member','type'=>'student','icon'=>'fa-user-graduate'],
                            ];
                        @endphp
                        <ul class="list-unstyled mb-0">
                            @foreach($members as $i => $m)
                                <li class="d-flex align-items-center gap-3 px-4 py-3 {{ $i < count($members)-1 ? 'border-bottom' : '' }}">
                                    <div style="width:42px;height:42px;border-radius:50%;background:{{ $m['type']==='faculty' ? 'var(--primary)' : 'var(--secondary)' }};display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <i class="fas {{ $m['icon'] }} text-white" style="font-size:.95rem;"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-semibold" style="font-size:.9rem;">{{ $m['name'] }}</p>
                                        <small class="{{ $m['type']==='faculty' ? 'text-maroon' : 'text-muted' }} fw-semibold">{{ $m['role'] }}</small>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge" style="background:{{ $m['type']==='faculty' ? 'rgba(22,36,80,.1)' : 'rgba(200,151,58,.15)' }};color:{{ $m['type']==='faculty' ? 'var(--primary)' : 'var(--secondary)' }};font-size:.7rem;">
                                            {{ ucfirst($m['type']) }}
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Contact / Info box --}}
                <div class="mt-4 p-4 rounded-3 text-white" style="background:linear-gradient(135deg,var(--primary),var(--primary-dark));">
                    <h6 class="mb-3" style="color:var(--secondary);"><i class="fas fa-info-circle me-2"></i>About Legal Aid in India</h6>
                    <p style="font-size:.875rem;line-height:1.75;opacity:.9;margin-bottom:0;">
                        Under the <strong style="color:var(--secondary)">Legal Services Authorities Act, 1987</strong>, every citizen has the right to free legal aid. NALSA (National Legal Services Authority) and DLSA (District Legal Services Authority) work to provide free legal services to eligible persons.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Quote Strip --}}
<section class="py-4 mt-3" style="background:var(--primary);">
    <div class="container text-center text-white">
        <p class="mb-0 fst-italic" style="font-size:1.1rem;">
            <i class="fas fa-quote-left me-2" style="color:var(--secondary)"></i>
            "Equal Justice Under Law — access to justice is a fundamental right, not a privilege."
            <i class="fas fa-quote-right ms-2" style="color:var(--secondary)"></i>
        </p>
    </div>
</section>

@endsection
