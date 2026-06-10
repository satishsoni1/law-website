@extends('layouts.front')
@section('content')

<div class="page-banner">
    <div class="container">
        <h1>{{ $course->name }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>
                <li class="breadcrumb-item active text-white">{{ $course->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <h2 class="text-maroon">{{ $course->name }}</h2>
                @if($course->description)
                    <div class="mt-3">{!! nl2br(e($course->description)) !!}</div>
                @endif
                @if($course->eligibility)
                    <h5 class="mt-4 text-maroon">Eligibility Criteria</h5>
                    <p>{{ $course->eligibility }}</p>
                @endif
                @if($course->syllabus)
                    <h5 class="mt-4 text-maroon">Syllabus Overview</h5>
                    <div>{!! nl2br(e($course->syllabus)) !!}</div>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm sticky-top" style="top:90px">
                    <div class="card-header" style="background:var(--primary);color:#fff">
                        <h5 class="mb-0">Course Details</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span><i class="fas fa-clock text-maroon me-2"></i>Duration</span><strong>{{ $course->duration }}</strong></li>
                        @if($course->intake) <li class="list-group-item d-flex justify-content-between"><span><i class="fas fa-users text-maroon me-2"></i>Intake</span><strong>{{ $course->intake }} Seats</strong></li> @endif
                        @if($course->fees) <li class="list-group-item d-flex justify-content-between"><span><i class="fas fa-rupee-sign text-maroon me-2"></i>Fees</span><strong>{{ $course->fees }}</strong></li> @endif
                        @if($course->medium) <li class="list-group-item d-flex justify-content-between"><span><i class="fas fa-language text-maroon me-2"></i>Medium</span><strong>{{ $course->medium }}</strong></li> @endif
                        @if($course->affiliation) <li class="list-group-item d-flex justify-content-between"><span><i class="fas fa-university text-maroon me-2"></i>Affiliation</span><strong>{{ $course->affiliation }}</strong></li> @endif
                    </ul>
                    <div class="card-footer">
                        <a href="{{ route('admissions.index') }}" class="btn w-100 mb-2" style="background:var(--primary);color:#fff">Apply Now</a>
                        @if($course->brochure)
                            <a href="{{ asset('storage/' . $course->brochure) }}" download class="btn btn-outline-secondary w-100"><i class="fas fa-download me-2"></i>Download Brochure</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
