@extends('layouts.admin')
@section('title', 'Activity Logs')
@section('page-title', 'Admin Activity Logs')
@section('content')
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>User</th><th>Action</th><th>Description</th><th>IP</th><th>Date</th></tr></thead>
            <tbody>
                @forelse($logs as $log)
                <tr>
                    <td>{{ $log->user?->name ?? 'System' }}</td>
                    <td><span class="badge bg-secondary">{{ $log->action }}</span></td>
                    <td>{{ Str::limit($log->description, 60) }}</td>
                    <td><code>{{ $log->ip_address }}</code></td>
                    <td>{{ $log->created_at->format('d M Y H:i') }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">No activity logs.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white">{{ $logs->links() }}</div>
</div>
@endsection
