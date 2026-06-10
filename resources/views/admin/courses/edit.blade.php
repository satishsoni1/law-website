@extends('layouts.admin')
@section('title', 'Edit Course')
@section('page-title', 'Edit Course')

@section('content')
<div class="card border-0 shadow-sm" style="max-width:800px">
    <div class="card-body p-4">
        <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Course Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Short Name</label>
                    <input type="text" name="short_name" class="form-control" value="{{ old('short_name', $course->short_name) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Duration <span class="text-danger">*</span></label>
                    <input type="text" name="duration" class="form-control" value="{{ old('duration', $course->duration) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Intake (Seats)</label>
                    <input type="number" name="intake" class="form-control" value="{{ old('intake', $course->intake) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Fees</label>
                    <input type="text" name="fees" class="form-control" value="{{ old('fees', $course->fees) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Medium</label>
                    <input type="text" name="medium" class="form-control" value="{{ old('medium', $course->medium) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Affiliation</label>
                    <input type="text" name="affiliation" class="form-control" value="{{ old('affiliation', $course->affiliation) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Eligibility</label>
                    <textarea name="eligibility" class="form-control" rows="2">{{ old('eligibility', $course->eligibility) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description', $course->description) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Brochure (PDF) — Leave blank to keep current</label>
                    @if($course->brochure) <p class="mb-1"><a href="{{ asset('storage/'.$course->brochure) }}" target="_blank">Current Brochure</a></p> @endif
                    <input type="file" name="brochure" class="form-control" accept=".pdf">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $course->order) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $course->meta_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $course->meta_description) }}</textarea>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-save me-2"></i>Update Course</button>
                <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
