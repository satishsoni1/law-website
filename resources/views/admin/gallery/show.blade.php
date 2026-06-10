@extends('layouts.admin')
@section('title', 'Manage Album')
@section('page-title', 'Album: ' . $gallery->title)
@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white"><h6 class="mb-0"><i class="fas fa-upload me-2"></i>Upload Photos</h6></div>
            <div class="card-body">
                <form action="{{ route('admin.gallery.upload-images', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="file" name="images[]" class="form-control" accept="image/*" multiple required>
                        <small class="text-muted">Select multiple images (JPG/PNG, max 3MB each)</small>
                    </div>
                    <button type="submit" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-upload me-2"></i>Upload Images</button>
                </form>
            </div>
        </div>
        <div class="row g-3">
            @forelse($gallery->images as $img)
            <div class="col-md-3">
                <div class="position-relative">
                    <img src="{{ asset('storage/'.$img->image) }}" class="w-100 rounded" style="height:130px;object-fit:cover" alt="{{ $img->caption }}">
                    <form action="{{ route('admin.gallery.destroy-image', $img) }}" method="POST" onsubmit="return confirm('Remove?')" style="position:absolute;top:5px;right:5px">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger py-0 px-2"><i class="fas fa-times"></i></button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted py-4">No images. Upload above.</div>
            @endforelse
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6>Album Info</h6>
                <p><strong>Title:</strong> {{ $gallery->title }}</p>
                <p><strong>Type:</strong> {{ ucfirst($gallery->type) }}</p>
                <p><strong>Images:</strong> {{ $gallery->images->count() }}</p>
                <p><strong>Status:</strong> <span class="badge {{ $gallery->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $gallery->is_active ? 'Active' : 'Inactive' }}</span></p>
                <a href="{{ route('admin.gallery.edit', $gallery) }}" class="btn btn-outline-primary w-100 mt-2"><i class="fas fa-edit me-2"></i>Edit Album</a>
            </div>
        </div>
    </div>
</div>
@endsection
