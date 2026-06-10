@extends('layouts.admin')
@section('title', 'Gallery')
@section('page-title', 'Gallery Management')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Albums</h5>
    <a href="{{ route('admin.gallery.create') }}" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-plus me-2"></i>Create Album</a>
</div>
<div class="row g-4">
    @forelse($galleries as $g)
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="position-relative" style="height:160px;overflow:hidden;border-radius:8px 8px 0 0">
                @if($g->cover_image)
                    <img src="{{ asset('storage/'.$g->cover_image) }}" class="w-100 h-100" style="object-fit:cover">
                @else
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background:#e9ecef"><i class="fas fa-images fa-3x text-muted"></i></div>
                @endif
                <span class="position-absolute top-0 end-0 m-2 badge bg-dark">{{ $g->type }}</span>
            </div>
            <div class="card-body p-3">
                <h6 class="mb-1">{{ $g->title }}</h6>
                <small class="text-muted">{{ $g->images_count }} photos</small>
            </div>
            <div class="card-footer bg-white d-flex gap-1 p-2">
                <a href="{{ route('admin.gallery.show', $g) }}" class="btn btn-sm btn-outline-primary flex-fill"><i class="fas fa-images"></i> Manage</a>
                <a href="{{ route('admin.gallery.edit', $g) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></a>
                <form action="{{ route('admin.gallery.destroy', $g) }}" method="POST" onsubmit="return confirm('Delete album?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5 text-muted"><i class="fas fa-images fa-4x mb-3 d-block"></i>No albums created.</div>
    @endforelse
</div>
<div class="mt-4">{{ $galleries->links() }}</div>
@endsection
