@extends('layouts.admin')
@section('title', 'Admissions')
@section('page-title', 'Admission Applications')
@section('content')

<form class="row g-2 mb-4" method="GET">
    <div class="col-md-3">
        <input type="text" name="search" class="form-control" placeholder="Search name/mobile/appno..." value="{{ request('search') }}">
    </div>
    <div class="col-md-2">
        <select name="status" class="form-select">
            <option value="">All Status</option>
            @foreach($statuses as $s) <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ ucfirst(str_replace('_',' ',$s)) }}</option> @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select name="course_id" class="form-select">
            <option value="">All Courses</option>
            @foreach($courses as $c) <option value="{{ $c->id }}" {{ request('course_id') == $c->id ? 'selected' : '' }}>{{ $c->short_name ?? $c->name }}</option> @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}" placeholder="From Date">
    </div>
    <div class="col-md-2">
        <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}" placeholder="To Date">
    </div>
    <div class="col-md-1">
        <button class="btn btn-outline-secondary w-100"><i class="fas fa-search"></i></button>
    </div>
</form>

<div class="d-flex justify-content-between mb-3">
    <span class="text-muted">{{ $admissions->total() }} applications found</span>
    <a href="{{ route('admin.admissions.export') . '?' . http_build_query(request()->all()) }}" class="btn btn-sm btn-outline-success"><i class="fas fa-file-csv me-1"></i>Export CSV</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>App No.</th><th>Name</th><th>Mobile</th><th>Course</th><th>Category</th><th>Status</th><th>Applied On</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($admissions as $a)
                <tr>
                    <td><code>{{ $a->application_no }}</code></td>
                    <td>{{ $a->student_name }}</td>
                    <td>{{ $a->mobile }}</td>
                    <td><small>{{ $a->course->name ?? '—' }}</small></td>
                    <td>{{ strtoupper($a->category) }}</td>
                    <td><span class="badge badge-{{ $a->status }}">{{ ucfirst(str_replace('_',' ',$a->status)) }}</span></td>
                    <td>{{ $a->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.admissions.show', $a) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center text-muted py-4">No applications found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white">{{ $admissions->links() }}</div>
</div>
@endsection
