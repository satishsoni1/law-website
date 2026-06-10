@extends('layouts.front')
@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Notice Board</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Notices</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <form action="{{ route('notices.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search notices..." value="{{ request('search') }}">
                <button class="btn" type="submit" style="background:var(--primary);color:#fff"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <div class="list-group shadow-sm">
            @forelse($notices as $notice)
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                    <div>
                        @if($notice->is_pinned)
                            <span class="badge" style="background:var(--secondary);color:#fff">Pinned</span>
                        @endif
                        <h6 class="mb-1 mt-1">{{ $notice->title }}</h6>
                        <small class="text-muted"><i class="fas fa-calendar me-1"></i>{{ $notice->publish_date->format('d F Y') }}</small>
                        @if($notice->expiry_date)
                            <small class="text-danger ms-2"><i class="fas fa-clock me-1"></i>Expires: {{ $notice->expiry_date->format('d F Y') }}</small>
                        @endif
                    </div>
                    @if($notice->attachment)
                        <a href="{{ route('notices.download', $notice) }}" class="btn btn-sm" style="background:var(--primary);color:#fff;white-space:nowrap;">
                            <i class="fas fa-download me-1"></i>Download
                        </a>
                    @endif
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fas fa-bell-slash fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No notices found.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-4">{{ $notices->links() }}</div>
    </div>
</section>
@endsection
