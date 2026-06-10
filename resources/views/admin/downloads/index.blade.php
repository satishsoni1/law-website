@extends('layouts.admin')
@section('title', 'Downloads')
@section('page-title', 'Downloads Management')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">All Downloads</h5>
    <a href="{{ route('admin.downloads.create') }}" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-plus me-2"></i>Add File</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Title</th><th>Category</th><th>Type</th><th>Downloads</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($downloads as $d)
                <tr>
                    <td>{{ Str::limit($d->title, 50) }}</td>
                    <td><span class="badge bg-secondary">{{ str_replace('_',' ',ucfirst($d->category)) }}</span></td>
                    <td>{{ strtoupper($d->file_type ?? '—') }}</td>
                    <td>{{ $d->download_count }}</td>
                    <td><span class="badge {{ $d->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $d->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ asset('storage/'.$d->file) }}" target="_blank" class="btn btn-sm btn-outline-info me-1"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.downloads.edit', $d) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.downloads.destroy', $d) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No files uploaded.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white">{{ $downloads->links() }}</div>
</div>
@endsection
