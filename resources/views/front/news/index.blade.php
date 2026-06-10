@extends('layouts.front')
@section('content')

<div class="page-banner">
    <div class="container">
        <h1>News & Events</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">News & Events</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <ul class="nav nav-tabs mb-4" id="newsTab">
            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#newsSection">Latest News</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#eventsSection">Events</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="newsSection">
                <div class="row g-4">
                    @forelse($news as $item)
                        <div class="col-md-4" data-aos="fade-up">
                            <div class="card h-100 border-0 shadow-sm">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" style="height:200px;object-fit:cover" alt="{{ $item->title }}">
                                @else
                                    <div class="d-flex align-items-center justify-content-center" style="height:200px;background:linear-gradient(135deg,var(--primary),var(--dark))">
                                        <i class="fas fa-newspaper fa-3x text-white opacity-50"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <p class="text-muted mb-1" style="font-size:.8rem;"><i class="fas fa-calendar me-1"></i>{{ $item->published_at->format('d M Y') }}</p>
                                    <h6>{{ Str::limit($item->title, 70) }}</h6>
                                    <p class="text-muted" style="font-size:.85rem;">{{ Str::limit($item->excerpt ?? strip_tags($item->content), 120) }}</p>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="{{ route('news.show', $item->slug) }}" class="btn btn-sm btn-outline-danger">Read More</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4"><p class="text-muted">No news available.</p></div>
                    @endforelse
                </div>
                <div class="mt-4">{{ $news->links() }}</div>
            </div>
            <div class="tab-pane fade" id="eventsSection">
                <div class="row g-4">
                    @forelse($events as $item)
                        <div class="col-md-4" data-aos="fade-up">
                            <div class="card h-100 border-0 shadow-sm">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" style="height:200px;object-fit:cover" alt="{{ $item->title }}">
                                @else
                                    <div class="d-flex align-items-center justify-content-center" style="height:200px;background:linear-gradient(135deg,#5a3e00,var(--dark))">
                                        <i class="fas fa-calendar-alt fa-3x text-white opacity-50"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    @if($item->event_date)
                                        <p class="text-muted mb-1" style="font-size:.8rem;"><i class="fas fa-calendar-check me-1"></i>{{ $item->event_date->format('d M Y') }}</p>
                                    @endif
                                    @if($item->event_venue)
                                        <p class="text-muted mb-1" style="font-size:.8rem;"><i class="fas fa-map-marker-alt me-1"></i>{{ $item->event_venue }}</p>
                                    @endif
                                    <h6>{{ Str::limit($item->title, 70) }}</h6>
                                    <p class="text-muted" style="font-size:.85rem;">{{ Str::limit($item->excerpt ?? strip_tags($item->content), 120) }}</p>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="{{ route('news.show', $item->slug) }}" class="btn btn-sm" style="background:var(--secondary);color:#fff">View Details</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4"><p class="text-muted">No events available.</p></div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
