@extends('layouts.front')
@section('content')

<div class="page-banner">
    <div class="container">
        <h1>{{ Str::limit($item->title, 60) }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News & Events</a></li>
                <li class="breadcrumb-item active text-white">{{ Str::limit($item->title, 30) }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded-3 w-100 mb-4" style="max-height:400px;object-fit:cover" alt="{{ $item->title }}">
                @endif
                <div class="d-flex gap-3 mb-3">
                    <span class="badge {{ $item->type === 'event' ? 'bg-warning text-dark' : 'bg-danger' }} fs-6">{{ ucfirst($item->type) }}</span>
                    <span class="text-muted"><i class="fas fa-calendar me-1"></i>{{ $item->published_at->format('d F Y') }}</span>
                    @if($item->event_date) <span class="text-muted"><i class="fas fa-calendar-check me-1"></i>Event: {{ $item->event_date->format('d F Y') }}</span> @endif
                </div>
                <h2 class="text-maroon mb-4">{{ $item->title }}</h2>
                <div class="content-body lh-lg">{!! nl2br(e($item->content)) !!}</div>

                @if($related->count())
                    <div class="mt-5">
                        <h5 class="section-title text-maroon">Related Articles</h5>
                        <div class="row g-3 mt-2">
                            @foreach($related as $r)
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm">
                                        @if($r->image)
                                            <img src="{{ asset('storage/' . $r->image) }}" class="card-img-top" style="height:120px;object-fit:cover">
                                        @endif
                                        <div class="card-body p-2">
                                            <a href="{{ route('news.show', $r->slug) }}" class="text-dark text-decoration-none">
                                                <small class="d-block">{{ Str::limit($r->title, 60) }}</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header" style="background:var(--primary);color:#fff"><h6 class="mb-0">Quick Links</h6></div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('admissions.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-graduation-cap me-2 text-maroon"></i>Apply for Admission</a>
                        <a href="{{ route('notices.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-bell me-2 text-maroon"></i>Notice Board</a>
                        <a href="{{ route('downloads.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-download me-2 text-maroon"></i>Downloads</a>
                        <a href="{{ route('contact') }}" class="list-group-item list-group-item-action"><i class="fas fa-envelope me-2 text-maroon"></i>Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
