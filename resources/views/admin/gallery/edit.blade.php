@extends('layouts.admin')
@section('title', 'Edit Album')
@section('page-title', 'Edit Album')
@section('content')
<div class="card border-0 shadow-sm" style="max-width:600px">
    <div class="card-body p-4">
        <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-select">
                        <option value="photo" {{ $gallery->type === 'photo' ? 'selected' : '' }}>Photo</option>
                        <option value="video" {{ $gallery->type === 'video' ? 'selected' : '' }}>Video</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="2">{{ old('description', $gallery->description) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cover Image</label>
                    @if($gallery->cover_image) <img src="{{ asset('storage/'.$gallery->cover_image) }}" style="height:60px" class="mb-2 d-block rounded"> @endif
                    <input type="file" name="cover_image" class="form-control" accept="image/*">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $gallery->order) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ $gallery->is_active ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn" style="background:var(--primary);color:#fff">Update Album</button>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
