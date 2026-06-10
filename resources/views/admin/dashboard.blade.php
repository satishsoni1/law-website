@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    @php
        $cards = [
            ['icon'=>'fa-file-alt','label'=>'Total Applications','value'=> $stats['total_admissions'],'color'=>'#7B1C1C','link'=>route('admin.admissions.index')],
            ['icon'=>'fa-clock','label'=>'Pending Review','value'=> $stats['pending_admissions'],'color'=>'#ffc107','link'=>route('admin.admissions.index').'?status=pending'],
            ['icon'=>'fa-check-circle','label'=>'Approved','value'=> $stats['approved_admissions'],'color'=>'#198754','link'=>route('admin.admissions.index').'?status=approved'],
            ['icon'=>'fa-graduation-cap','label'=>'Courses','value'=> $stats['total_courses'],'color'=>'#0d6efd','link'=>route('admin.courses.index')],
            ['icon'=>'fa-chalkboard-teacher','label'=>'Faculty Members','value'=> $stats['total_faculty'],'color'=>'#6f42c1','link'=>route('admin.faculty.index')],
            ['icon'=>'fa-bell','label'=>'Notices','value'=> $stats['total_notices'],'color'=>'#fd7e14','link'=>route('admin.notices.index')],
            ['icon'=>'fa-envelope','label'=>'Unread Messages','value'=> $stats['unread_messages'],'color'=>'#dc3545','link'=>route('admin.messages.index')],
            ['icon'=>'fa-newspaper','label'=>'News & Events','value'=> $stats['total_news'],'color'=>'#20c997','link'=>route('admin.news.index')],
        ];
    @endphp
    @foreach($cards as $card)
        <div class="col-6 col-md-3">
            <a href="{{ $card['link'] }}" class="text-decoration-none">
                <div class="stat-card card p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:50px;height:50px;background:{{ $card['color'] }}20;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                            <i class="fas {{ $card['icon'] }}" style="color:{{ $card['color'] }};font-size:1.4rem;"></i>
                        </div>
                        <div>
                            <h4 class="mb-0 fw-bold" style="color:{{ $card['color'] }}">{{ $card['value'] }}</h4>
                            <small class="text-muted">{{ $card['label'] }}</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                <h6 class="mb-0"><i class="fas fa-file-alt me-2 text-maroon"></i>Recent Applications</h6>
                <a href="{{ route('admin.admissions.index') }}" class="btn btn-sm btn-outline-danger">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead><tr><th>App No.</th><th>Name</th><th>Course</th><th>Status</th><th>Date</th><th></th></tr></thead>
                    <tbody>
                        @forelse($recent_admissions as $a)
                            <tr>
                                <td><code>{{ $a->application_no }}</code></td>
                                <td>{{ $a->student_name }}</td>
                                <td>{{ $a->course->name ?? '—' }}</td>
                                <td><span class="badge badge-{{ $a->status }}">{{ ucfirst(str_replace('_',' ',$a->status)) }}</span></td>
                                <td>{{ $a->created_at->format('d M Y') }}</td>
                                <td><a href="{{ route('admin.admissions.show', $a) }}" class="btn btn-xs btn-outline-secondary py-0 px-2">View</a></td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center text-muted py-4">No applications yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                <h6 class="mb-0"><i class="fas fa-envelope me-2 text-danger"></i>Unread Messages</h6>
                <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-danger">View All</a>
            </div>
            <div class="list-group list-group-flush">
                @forelse($recent_messages as $msg)
                    <a href="{{ route('admin.messages.show', $msg) }}" class="list-group-item list-group-item-action py-3">
                        <div class="d-flex justify-content-between">
                            <strong style="font-size:.85rem">{{ $msg->name }}</strong>
                            <small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-0 text-muted" style="font-size:.8rem">{{ Str::limit($msg->message, 60) }}</p>
                    </a>
                @empty
                    <div class="text-center text-muted py-4"><i class="fas fa-inbox fa-2x mb-2 d-block"></i>No unread messages</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
