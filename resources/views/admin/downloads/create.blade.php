@extends('layouts.admin')
@section('title', 'Upload File')
@section('page-title', 'Upload Download File')
@section('content')
<div class="card border-0 shadow-sm" style="max-width:600px">
    <div class="card-body p-4">
        <form action="{{ route('admin.downloads.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="2">{{ old('description') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        @foreach($categories as $k => $v) <option value="{{ $k }}" {{ old('category') === $k ? 'selected' : '' }}>{{ $v }}</option> @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">File <span class="text-danger">*</span></label>
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept=".pdf,.doc,.docx,.xls,.xlsx" required>
                    @error('file') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <small class="text-muted">PDF, DOC, XLS — Max 10MB</small>
                </div>
                <div class="col-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                        <label class="form-check-label">Active (visible on website)</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-upload me-2"></i>Upload File</button>
                <a href="{{ route('admin.downloads.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
