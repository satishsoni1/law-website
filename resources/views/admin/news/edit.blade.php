@extends('layouts.admin')
@section('title', 'Edit News')
@section('page-title', 'Edit News / Event')
@section('content')
<div class="card border-0 shadow-sm" style="max-width:800px">
    <div class="card-body p-4">
        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $news->title) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-select">
                        <option value="news" {{ old('type', $news->type) === 'news' ? 'selected' : '' }}>News</option>
                        <option value="event" {{ old('type', $news->type) === 'event' ? 'selected' : '' }}>Event</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Excerpt</label>
                    <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $news->excerpt) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Content <span class="text-danger">*</span></label>
                    <textarea name="content" class="form-control" rows="8" required>{{ old('content', $news->content) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    @if($news->image) <img src="{{ asset('storage/'.$news->image) }}" style="height:60px;border-radius:4px" class="mb-2 d-block"> @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Event Date</label>
                    <input type="date" name="event_date" class="form-control" value="{{ old('event_date', $news->event_date?->format('Y-m-d')) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Event Venue</label>
                    <input type="text" name="event_venue" class="form-control" value="{{ old('event_venue', $news->event_venue) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $news->meta_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control" value="{{ old('meta_description', $news->meta_description) }}">
                </div>
                <div class="col-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $news->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label">Active / Published</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-save me-2"></i>Update</button>
                <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
