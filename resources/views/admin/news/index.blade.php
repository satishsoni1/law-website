@extends('layouts.admin')
@section('title', 'News & Events')
@section('page-title', 'News & Events Management')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">All News & Events</h5>
    <a href="{{ route('admin.news.create') }}" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-plus me-2"></i>Add News/Event</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Title</th><th>Type</th><th>Event Date</th><th>Published</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($news as $n)
                <tr>
                    <td>{{ Str::limit($n->title, 60) }}</td>
                    <td><span class="badge {{ $n->type === 'event' ? 'bg-warning text-dark' : 'bg-info text-dark' }}">{{ ucfirst($n->type) }}</span></td>
                    <td>{{ $n->event_date?->format('d M Y') ?? '—' }}</td>
                    <td>{{ $n->published_at?->format('d M Y') ?? '—' }}</td>
                    <td><span class="badge {{ $n->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $n->is_active ? 'Active' : 'Draft' }}</span></td>
                    <td>
                        <a href="{{ route('admin.news.edit', $n) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.news.destroy', $n) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No news or events added.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white">{{ $news->links() }}</div>
</div>
@endsection
