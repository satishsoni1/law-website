@extends('layouts.admin')
@section('title', 'SEO: ' . $pageName)
@section('page-title', 'SEO Settings: ' . $pageName)
@section('content')
<div class="card border-0 shadow-sm" style="max-width:700px">
    <div class="card-body p-4">
        <form action="{{ route('admin.seo.update', $page) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Meta Title <span class="text-danger">*</span></label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $seo->meta_title) }}" required maxlength="60">
                    <small class="text-muted">Recommended: 50-60 characters</small>
                </div>
                <div class="col-12">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" maxlength="160">{{ old('meta_description', $seo->meta_description) }}</textarea>
                    <small class="text-muted">Recommended: 150-160 characters</small>
                </div>
                <div class="col-12">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $seo->meta_keywords) }}" placeholder="law college, llb, khopoli">
                </div>
                <div class="col-12"><hr><h6>Open Graph (Social Sharing)</h6></div>
                <div class="col-md-6">
                    <label class="form-label">OG Title</label>
                    <input type="text" name="og_title" class="form-control" value="{{ old('og_title', $seo->og_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">OG Image</label>
                    <input type="file" name="og_image" class="form-control" accept="image/*">
                </div>
                <div class="col-12">
                    <label class="form-label">OG Description</label>
                    <textarea name="og_description" class="form-control" rows="2">{{ old('og_description', $seo->og_description) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Canonical URL</label>
                    <input type="url" name="canonical_url" class="form-control" value="{{ old('canonical_url', $seo->canonical_url) }}">
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-save me-2"></i>Save SEO</button>
                <a href="{{ route('admin.seo.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
