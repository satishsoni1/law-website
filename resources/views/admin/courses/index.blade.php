@extends('layouts.admin')
@section('title', 'Courses')
@section('page-title', 'Course Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">All Courses</h5>
    <a href="{{ route('admin.courses.create') }}" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-plus me-2"></i>Add Course</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>#</th><th>Name</th><th>Duration</th><th>Intake</th><th>Fees</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($courses as $c)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $c->name }}</strong>@if($c->short_name) <small class="text-muted">({{ $c->short_name }})</small>@endif</td>
                        <td>{{ $c->duration }}</td>
                        <td>{{ $c->intake ?? '—' }}</td>
                        <td>{{ $c->fees ?? '—' }}</td>
                        <td><span class="badge {{ $c->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $c->is_active ? 'Active' : 'Inactive' }}</span></td>
                        <td>
                            <a href="{{ route('admin.courses.edit', $c) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.courses.destroy', $c) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this course?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">No courses added.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white">{{ $courses->links() }}</div>
</div>
@endsection
