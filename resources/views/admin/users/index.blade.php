@extends('layouts.admin')
@section('title', 'Users')
@section('page-title', 'User Management')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Admin Users</h5>
    <a href="{{ route('admin.users.create') }}" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-plus me-2"></i>Add User</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Created</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($users as $u)
                <tr>
                    <td><strong>{{ $u->name }}</strong></td>
                    <td>{{ $u->email }}</td>
                    <td><span class="badge {{ $u->user_type === 'super_admin' ? 'bg-danger' : ($u->user_type === 'staff_admin' ? 'bg-primary' : 'bg-secondary') }}">{{ ucwords(str_replace('_',' ',$u->user_type)) }}</span></td>
                    <td><span class="badge {{ $u->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $u->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td>{{ $u->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $u) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                        @if($u->id !== auth()->id())
                        <form action="{{ route('admin.users.destroy', $u) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete user?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No users found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white">{{ $users->links() }}</div>
</div>
@endsection
