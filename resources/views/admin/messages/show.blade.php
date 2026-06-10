@extends('layouts.admin')
@section('title', 'Message')
@section('page-title', 'Message Details')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between">
                <h6 class="mb-0"><i class="fas fa-envelope me-2"></i>From: {{ $message->name }}</h6>
                <span class="text-muted">{{ $message->created_at->format('d M Y H:i') }}</span>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Email</dt><dd class="col-sm-9"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></dd>
                    <dt class="col-sm-3">Phone</dt><dd class="col-sm-9">{{ $message->phone ?? '—' }}</dd>
                    <dt class="col-sm-3">Subject</dt><dd class="col-sm-9">{{ $message->subject ?? '—' }}</dd>
                    <dt class="col-sm-3">Message</dt><dd class="col-sm-9"><p class="bg-light p-3 rounded">{{ $message->message }}</p></dd>
                </dl>
            </div>
            <div class="card-footer bg-white d-flex gap-2">
                <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-reply me-2"></i>Reply via Email</a>
                <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
