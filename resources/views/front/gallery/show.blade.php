@extends('layouts.front')
@section('content')

<div class="page-banner">
    <div class="container">
        <h1>{{ $album->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Gallery</a></li>
                <li class="breadcrumb-item active text-white">{{ $album->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if($album->description)
            <p class="text-muted mb-4">{{ $album->description }}</p>
        @endif
        <div class="row g-3">
            @forelse($album->images as $img)
                <div class="col-6 col-md-4 col-lg-3" data-aos="zoom-in">
                    @if($album->type === 'video' && $img->video_url)
                        <a href="{{ $img->video_url }}" class="glightbox d-block" data-gallery="album" data-title="{{ $img->caption }}">
                            <div class="position-relative" style="height:180px;background:#000;border-radius:8px;overflow:hidden;">
                                <img src="https://img.youtube.com/vi/{{ basename(parse_url($img->video_url, PHP_URL_PATH)) }}/hqdefault.jpg" class="w-100 h-100" style="object-fit:cover;opacity:.7">
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <i class="fas fa-play-circle text-white fa-3x"></i>
                                </div>
                            </div>
                        </a>
                    @else
                        <a href="{{ asset('storage/' . $img->image) }}" class="glightbox d-block" data-gallery="album" data-title="{{ $img->caption }}">
                            <div style="height:180px;border-radius:8px;overflow:hidden;">
                                <img src="{{ asset('storage/' . $img->image) }}" class="w-100 h-100" style="object-fit:cover;transition:.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" alt="{{ $img->caption }}">
                            </div>
                        </a>
                    @endif
                    @if($img->caption)
                        <p class="text-muted text-center mt-1" style="font-size:.8rem;">{{ $img->caption }}</p>
                    @endif
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fas fa-images fa-4x text-muted mb-3"></i>
                    <p class="text-muted">No photos in this album.</p>
                </div>
            @endforelse
        </div>
        <a href="{{ route('gallery.index') }}" class="btn btn-outline-danger mt-4"><i class="fas fa-arrow-left me-2"></i>Back to Gallery</a>
    </div>
</section>
@endsection
