@extends('layouts.front')

@php $title = 'Toppers'; @endphp

@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Our Toppers</h1>
        <p class="mb-2" style="color:rgba(255,255,255,.8)">Celebrating academic excellence — {{ config('toppers.session') }}</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Toppers</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5" style="background:linear-gradient(180deg,var(--light) 0%,#fff 100%);">
    <div class="container">
        @foreach(config('toppers.batches') as $batch)
            <div class="text-center mb-5 {{ $loop->first ? '' : 'mt-5 pt-4' }}" data-aos="fade-up">
                <span class="section-label">Batch {{ $batch['admitted'] }}</span>
                <h2 class="section-title mt-2">{{ $batch['label'] }} <span class="highlight">Toppers</span></h2>
                <div class="title-divider center mt-3"></div>
                <p class="section-subtitle mt-3">Academic Year {{ config('toppers.session') }}</p>
            </div>
            <div class="pt-5">
                @include('front.partials.toppers-podium', ['batch' => $batch])
            </div>
        @endforeach
    </div>
</section>

@endsection
