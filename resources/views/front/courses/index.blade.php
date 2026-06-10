@extends('layouts.front')
@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Courses Offered</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Courses</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($courses as $course)
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="course-card card h-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0">{{ $course->name }}</h4>
                                @if($course->short_name) <small class="opacity-75">({{ $course->short_name }})</small> @endif
                            </div>
                            <i class="fas fa-graduation-cap fa-3x opacity-25"></i>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 mb-3">
                                <div class="col-6">
                                    <div class="d-flex align-items-center gap-2 p-2 rounded" style="background:#fff7f7">
                                        <i class="fas fa-clock text-maroon"></i>
                                        <div><small class="text-muted d-block">Duration</small><strong>{{ $course->duration }}</strong></div>
                                    </div>
                                </div>
                                @if($course->intake)
                                <div class="col-6">
                                    <div class="d-flex align-items-center gap-2 p-2 rounded" style="background:#fff7f7">
                                        <i class="fas fa-users text-maroon"></i>
                                        <div><small class="text-muted d-block">Intake</small><strong>{{ $course->intake }} Seats</strong></div>
                                    </div>
                                </div>
                                @endif
                                @if($course->fees)
                                <div class="col-6">
                                    <div class="d-flex align-items-center gap-2 p-2 rounded" style="background:#fff7f7">
                                        <i class="fas fa-rupee-sign text-maroon"></i>
                                        <div><small class="text-muted d-block">Fees</small><strong>{{ $course->fees }}</strong></div>
                                    </div>
                                </div>
                                @endif
                                @if($course->medium)
                                <div class="col-6">
                                    <div class="d-flex align-items-center gap-2 p-2 rounded" style="background:#fff7f7">
                                        <i class="fas fa-language text-maroon"></i>
                                        <div><small class="text-muted d-block">Medium</small><strong>{{ $course->medium }}</strong></div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @if($course->eligibility)
                                <h6>Eligibility:</h6>
                                <p class="text-muted">{{ $course->eligibility }}</p>
                            @endif
                        </div>
                        <div class="card-footer bg-transparent d-flex gap-2">
                            <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-outline-danger flex-fill">View Details</a>
                            @if($course->brochure)
                                <a href="{{ asset('storage/' . $course->brochure) }}" download class="btn btn-outline-secondary"><i class="fas fa-download"></i> Brochure</a>
                            @endif
                            <a href="{{ route('admissions.index') }}" class="btn flex-fill" style="background:var(--secondary);color:#fff">Apply Now</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fas fa-graduation-cap fa-4x text-muted mb-3"></i>
                    <p class="text-muted">No courses available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
