@extends('layouts.admin')
@section('title', 'Add Course')
@section('page-title', 'Add New Course')

@section('content')
<div class="card border-0 shadow-sm" style="max-width:800px">
    <div class="card-body p-4">
        <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Course Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="e.g., Bachelor of Laws" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Short Name</label>
                    <input type="text" name="short_name" class="form-control" value="{{ old('short_name') }}" placeholder="e.g., LL.B.">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Duration <span class="text-danger">*</span></label>
                    <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration') }}" placeholder="e.g., 3 Years" required>
                    @error('duration') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Intake (Seats)</label>
                    <input type="number" name="intake" class="form-control" value="{{ old('intake') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Fees</label>
                    <input type="text" name="fees" class="form-control" value="{{ old('fees') }}" placeholder="e.g., ₹15,000/year">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Medium</label>
                    <input type="text" name="medium" class="form-control" value="{{ old('medium') }}" placeholder="e.g., Marathi & English">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Affiliation</label>
                    <input type="text" name="affiliation" class="form-control" value="{{ old('affiliation') }}" placeholder="e.g., University of Mumbai">
                </div>
                <div class="col-12">
                    <label class="form-label">Eligibility</label>
                    <textarea name="eligibility" class="form-control" rows="2">{{ old('eligibility') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Brochure (PDF)</label>
                    <input type="file" name="brochure" class="form-control" accept=".pdf">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description') }}</textarea>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-save me-2"></i>Save Course</button>
                <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
