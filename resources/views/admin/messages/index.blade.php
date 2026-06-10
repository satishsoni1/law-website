@extends('layouts.admin')
@section('title', 'Messages')
@section('page-title', 'Contact Messages')
@section('content')
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Subject</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($messages as $m)
                <tr class="{{ !$m->is_read ? 'table-warning' : '' }}">
                    <td><strong>{{ $m->name }}</strong></td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->phone ?? '—' }}</td>
                    <td>{{ Str::limit($m->subject ?? $m->message, 40) }}</td>
                    <td>{{ $m->created_at->format('d M Y H:i') }}</td>
                    <td>@if(!$m->is_read)<span class="badge bg-warning text-dark">New</span>@else<span class="badge bg-success">Read</span>@endif</td>
                    <td>
                        <a href="{{ route('admin.messages.show', $m) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('admin.messages.destroy', $m) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">No messages.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white">{{ $messages->links() }}</div>
</div>
@endsection
