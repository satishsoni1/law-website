@extends('layouts.front')
@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Our Faculty</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Faculty</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if($permanent->count())
        <h3 class="section-title text-maroon mb-4">Permanent Faculty</h3>
        <div class="row g-4 mb-5">
            @foreach($permanent as $member)
                <div class="col-md-3 col-6" data-aos="fade-up">
                    <div class="faculty-card card">
                        @if($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}">
                        @else
                            <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center text-white mt-4" style="width:110px;height:110px;background:var(--primary);font-size:2.5rem;font-weight:700;">{{ strtoupper(substr($member->name,0,1)) }}</div>
                        @endif
                        <div class="p-3">
                            <h6 class="mb-1">{{ $member->name }}</h6>
                            <small class="text-maroon d-block fw-semibold">{{ $member->designation }}</small>
                            <small class="text-muted">{{ $member->qualification }}</small>
                            @if($member->specialization)
                                <br><small class="text-muted"><i class="fas fa-tag me-1"></i>{{ $member->specialization }}</small>
                            @endif
                            @if($member->experience)
                                <br><small class="text-muted"><i class="fas fa-clock me-1"></i>{{ $member->experience }} yrs experience</small>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif

        @if($visiting->count())
        <h3 class="section-title text-maroon mb-4">Visiting Faculty</h3>
        <div class="row g-4">
            @foreach($visiting as $member)
                <div class="col-md-3 col-6" data-aos="fade-up">
                    <div class="faculty-card card">
                        @if($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}">
                        @else
                            <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center text-white mt-4" style="width:110px;height:110px;background:var(--secondary);font-size:2.5rem;font-weight:700;">{{ strtoupper(substr($member->name,0,1)) }}</div>
                        @endif
                        <div class="p-3">
                            <h6 class="mb-1">{{ $member->name }}</h6>
                            <small class="text-muted d-block fw-semibold">{{ $member->designation }}</small>
                            <small class="text-muted">{{ $member->qualification }}</small>
                            <br><span class="badge bg-warning text-dark mt-1" style="font-size:10px">Visiting</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection
