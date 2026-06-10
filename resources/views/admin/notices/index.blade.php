@extends('layouts.admin')
@section('title', 'Notices')
@section('page-title', 'Notice Board Management')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">All Notices</h5>
    <a href="{{ route('admin.notices.create') }}" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-plus me-2"></i>Add Notice</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Title</th><th>Publish Date</th><th>Expiry</th><th>Pinned</th><th>Attachment</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($notices as $n)
                <tr>
                    <td>{{ Str::limit($n->title, 60) }}</td>
                    <td>{{ $n->publish_date->format('d M Y') }}</td>
                    <td>{{ $n->expiry_date?->format('d M Y') ?? '—' }}</td>
                    <td>@if($n->is_pinned)<span class="badge bg-warning text-dark"><i class="fas fa-thumbtack"></i> Pinned</span>@else—@endif</td>
                    <td>@if($n->attachment)<a href="{{ asset('storage/'.$n->attachment) }}" target="_blank" class="btn btn-xs btn-outline-secondary py-0 px-2"><i class="fas fa-file-pdf"></i></a>@else—@endif</td>
                    <td><span class="badge {{ $n->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $n->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.notices.edit', $n) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.notices.destroy', $n) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">No notices added.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white">{{ $notices->links() }}</div>
</div>
@endsection
