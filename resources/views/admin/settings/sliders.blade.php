@extends('layouts.admin')
@section('title', 'Sliders')
@section('page-title', 'Homepage Sliders')
@section('content')
<div class="row g-4">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white"><h6 class="mb-0">Current Sliders</h6></div>
            <div class="row g-3 p-3">
                @forelse($sliders as $s)
                <div class="col-md-6">
                    <div class="card border">
                        <img src="{{ asset('storage/'.$s->image) }}" class="card-img-top" style="height:130px;object-fit:cover">
                        <div class="card-body p-2">
                            <strong style="font-size:.85rem">{{ $s->title }}</strong>
                            <p class="text-muted mb-1" style="font-size:.75rem">{{ Str::limit($s->subtitle, 40) }}</p>
                        </div>
                        <div class="card-footer p-2">
                            <form action="{{ route('admin.settings.sliders.destroy', $s) }}" method="POST" onsubmit="return confirm('Delete slide?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger w-100"><i class="fas fa-trash me-1"></i>Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-muted py-4">No slides. Add below.</div>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white"><h6 class="mb-0"><i class="fas fa-plus me-2"></i>Add New Slide</h6></div>
            <div class="card-body">
                <form action="{{ route('admin.settings.sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slide Image <span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                        <small class="text-muted">Recommended: 1920x580px</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Button Text</label>
                        <input type="text" name="button_text" class="form-control" placeholder="Apply Now">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Button URL</label>
                        <input type="text" name="button_url" class="form-control" placeholder="/admissions">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" class="form-control" value="0">
                    </div>
                    <button type="submit" class="btn w-100" style="background:var(--primary);color:#fff"><i class="fas fa-plus me-2"></i>Add Slide</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
