@extends('layouts.admin')
@section('title', 'Add Faculty')
@section('page-title', 'Add Faculty Member')
@section('content')
<div class="card border-0 shadow-sm" style="max-width:800px">
    <div class="card-body p-4">
        <form action="{{ route('admin.faculty.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Category <span class="text-danger">*</span></label>
                    <select name="category" class="form-select" required>
                        <option value="permanent" {{ old('category') === 'permanent' ? 'selected' : '' }}>Permanent</option>
                        <option value="visiting" {{ old('category') === 'visiting' ? 'selected' : '' }}>Visiting</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Designation <span class="text-danger">*</span></label>
                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Qualification <span class="text-danger">*</span></label>
                    <input type="text" name="qualification" class="form-control @error('qualification') is-invalid @enderror" value="{{ old('qualification') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Specialization</label>
                    <input type="text" name="specialization" class="form-control" value="{{ old('specialization') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Experience (Years)</label>
                    <input type="number" name="experience" class="form-control" value="{{ old('experience') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" class="form-control" rows="3">{{ old('bio') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-control" accept="image/*">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-save me-2"></i>Save Faculty</button>
                <a href="{{ route('admin.faculty.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
