@extends('layouts.front')
@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Photo Gallery</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Gallery</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($albums as $album)
                <div class="col-md-4 col-lg-3" data-aos="zoom-in">
                    <a href="{{ route('gallery.show', $album->slug) }}" class="d-block text-decoration-none">
                        <div class="card border-0 shadow-sm overflow-hidden">
                            <div class="position-relative" style="height:200px;">
                                @if($album->cover_image)
                                    <img src="{{ asset('storage/' . $album->cover_image) }}" class="w-100 h-100" style="object-fit:cover;" alt="{{ $album->title }}">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background:var(--primary)">
                                        <i class="fas fa-images fa-3x text-white opacity-50"></i>
                                    </div>
                                @endif
                                <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background:linear-gradient(transparent,rgba(0,0,0,.8))">
                                    <h6 class="text-white mb-0">{{ $album->title }}</h6>
                                    <small class="text-white opacity-75">{{ $album->images_count }} photos</small>
                                </div>
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge {{ $album->type === 'video' ? 'bg-danger' : 'bg-primary' }}">{{ ucfirst($album->type) }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fas fa-images fa-4x text-muted mb-3"></i>
                    <p class="text-muted">No albums available.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
