@extends('layouts.admin')
@section('title', 'Edit Notice')
@section('page-title', 'Edit Notice')
@section('content')
<div class="card border-0 shadow-sm" style="max-width:700px">
    <div class="card-body p-4">
        <form action="{{ route('admin.notices.update', $notice) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Notice Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $notice->title) }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Content</label>
                    <textarea name="content" class="form-control" rows="4">{{ old('content', $notice->content) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Publish Date <span class="text-danger">*</span></label>
                    <input type="date" name="publish_date" class="form-control" value="{{ old('publish_date', $notice->publish_date->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Expiry Date</label>
                    <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date', $notice->expiry_date?->format('Y-m-d')) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Attachment</label>
                    @if($notice->attachment) <a href="{{ asset('storage/'.$notice->attachment) }}" target="_blank" class="d-block mb-1 small">Current File</a> @endif
                    <input type="file" name="attachment" class="form-control" accept=".pdf,.doc,.docx">
                </div>
                <div class="col-md-6">
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_pinned" value="1" {{ old('is_pinned', $notice->is_pinned) ? 'checked' : '' }}>
                        <label class="form-check-label">Pinned</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $notice->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-save me-2"></i>Update</button>
                <a href="{{ route('admin.notices.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
