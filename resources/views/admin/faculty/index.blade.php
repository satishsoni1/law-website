@extends('layouts.admin')
@section('title', 'Faculty')
@section('page-title', 'Faculty Management')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">All Faculty Members</h5>
    <a href="{{ route('admin.faculty.create') }}" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-plus me-2"></i>Add Faculty</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Photo</th><th>Name</th><th>Designation</th><th>Qualification</th><th>Category</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($faculty as $f)
                <tr>
                    <td>@if($f->photo)<img src="{{ asset('storage/'.$f->photo) }}" style="width:45px;height:45px;border-radius:50%;object-fit:cover">@else<div style="width:45px;height:45px;border-radius:50%;background:var(--primary);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">{{ strtoupper(substr($f->name,0,1)) }}</div>@endif</td>
                    <td><strong>{{ $f->name }}</strong></td>
                    <td>{{ $f->designation }}</td>
                    <td><small>{{ $f->qualification }}</small></td>
                    <td><span class="badge {{ $f->category === 'permanent' ? 'bg-primary' : 'bg-warning text-dark' }}">{{ ucfirst($f->category) }}</span></td>
                    <td><span class="badge {{ $f->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $f->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.faculty.edit', $f) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.faculty.destroy', $f) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">No faculty members added.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white">{{ $faculty->links() }}</div>
</div>
@endsection
