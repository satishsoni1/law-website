@extends('layouts.front')
@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Downloads</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Downloads</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @php
            $categoryLabels = ['prospectus'=>'Prospectus','admission_form'=>'Admission Forms','circular'=>'Circulars','timetable'=>'Timetables','syllabus'=>'Syllabus','other'=>'Other Documents'];
            $icons = ['prospectus'=>'fa-book','admission_form'=>'fa-file-alt','circular'=>'fa-bullhorn','timetable'=>'fa-clock','syllabus'=>'fa-list-alt','other'=>'fa-file'];
        @endphp
        @forelse($downloads as $category => $files)
            <div class="mb-5">
                <h4 class="section-title text-maroon"><i class="fas {{ $icons[$category] ?? 'fa-file' }} me-2"></i>{{ $categoryLabels[$category] ?? ucfirst($category) }}</h4>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead style="background:var(--primary);color:#fff">
                            <tr><th>Title</th><th>Description</th><th>Type</th><th>Downloads</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td><i class="fas fa-file-{{ $file->file_type === 'pdf' ? 'pdf text-danger' : 'word text-primary' }} me-2"></i>{{ $file->title }}</td>
                                    <td><small class="text-muted">{{ $file->description ?? '—' }}</small></td>
                                    <td><span class="badge bg-secondary">{{ strtoupper($file->file_type ?? 'FILE') }}</span></td>
                                    <td>{{ $file->download_count }}</td>
                                    <td>
                                        <a href="{{ route('downloads.file', $file) }}" class="btn btn-sm" style="background:var(--primary);color:#fff">
                                            <i class="fas fa-download me-1"></i>Download
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
                <p class="text-muted">No downloads available at the moment.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection
