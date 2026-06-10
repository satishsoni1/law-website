@extends('layouts.admin')
@section('title', 'SEO Management')
@section('page-title', 'SEO Management')
@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <p class="text-muted mb-4">Manage meta titles, descriptions, and Open Graph tags for each page.</p>
        <div class="list-group">
            @foreach($pages as $key => $name)
            <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                <div>
                    <strong>{{ $name }}</strong>
                    @if(isset($seoMetas[$key]))
                        <br><small class="text-muted">{{ Str::limit($seoMetas[$key]->meta_title, 60) }}</small>
                    @else
                        <br><small class="text-warning">No SEO settings configured</small>
                    @endif
                </div>
                <a href="{{ route('admin.seo.edit', $key) }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-{{ isset($seoMetas[$key]) ? 'edit' : 'plus' }}"></i>
                    {{ isset($seoMetas[$key]) ? 'Edit' : 'Set SEO' }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
