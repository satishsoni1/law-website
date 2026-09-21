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

@php
    $photo = fn ($m) => $m->photo
        ? '<img src="' . e(asset('storage/' . $m->photo)) . '" alt="' . e($m->name) . '" class="faculty-avatar">'
        : '<div class="faculty-avatar-placeholder">' . e(strtoupper(substr($m->name, 0, 1))) . '</div>';
@endphp

<section class="py-5">
    <div class="container">

        {{-- Head of the institution --}}
        @if($principal)
        <div class="row justify-content-center mb-5">
            <div class="col-md-4 col-8" data-aos="zoom-in">
                <div class="faculty-card card h-100 d-flex flex-column text-center" style="border-top:5px solid var(--primary);">
                    {!! $photo($principal) !!}
                    <div class="p-3 flex-grow-1">
                        <h5 class="mb-1">{{ $principal->name }}</h5>
                        <span class="badge mb-2 px-3 py-2" style="background:var(--primary);">{{ $principal->designation }}</span>
                        <small class="text-muted d-block">{{ $principal->qualification }}</small>
                        @if($principal->specialization)
                            <small class="text-muted d-block"><i class="fas fa-tag me-1"></i>{{ $principal->specialization }}</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($teaching->count())
        <h3 class="section-title text-maroon mb-4">Teaching Faculty</h3>
        <div class="row g-4 mb-5">
            @foreach($teaching as $member)
                <div class="col-md-3 col-6" data-aos="fade-up">
                    <div class="faculty-card card h-100 d-flex flex-column">
                        {!! $photo($member) !!}
                        <div class="p-3 flex-grow-1">
                            <h6 class="mb-1">{{ $member->name }}</h6>
                            <small class="text-maroon d-block fw-semibold">{{ $member->designation }}</small>
                            <small class="text-muted">{{ $member->qualification }}</small>
                            @if($member->specialization)
                                <br><small class="text-muted"><i class="fas fa-tag me-1"></i>{{ $member->specialization }}</small>
                            @endif
                            @if($member->experience)
                                <br><small class="text-muted"><i class="fas fa-clock me-1"></i>{{ $member->experience }} yrs experience</small>
                            @endif
                            @if($member->category === 'visiting')
                                <br><span class="badge bg-warning text-dark mt-1" style="font-size:10px">Visiting</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif

        @if($nonTeaching->count())
        <h3 class="section-title text-maroon mb-4">Non-Teaching Staff</h3>
        <div class="row g-4">
            @foreach($nonTeaching as $member)
                <div class="col-md-3 col-6" data-aos="fade-up">
                    <div class="faculty-card card h-100 d-flex flex-column">
                        {!! $photo($member) !!}
                        <div class="p-3 flex-grow-1">
                            <h6 class="mb-1">{{ $member->name }}</h6>
                            <small class="text-muted d-block fw-semibold">{{ $member->designation }}</small>
                            <small class="text-muted">{{ $member->qualification }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection
