@extends('layouts.admin')
@section('title', 'Edit Faculty')
@section('page-title', 'Edit Faculty Member')
@section('content')
<div class="card border-0 shadow-sm" style="max-width:800px">
    <div class="card-body p-4">
        <form action="{{ route('admin.faculty.update', $faculty) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $faculty->name) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option value="permanent" {{ old('category', $faculty->category) === 'permanent' ? 'selected' : '' }}>Permanent</option>
                        <option value="visiting" {{ old('category', $faculty->category) === 'visiting' ? 'selected' : '' }}>Visiting</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Designation <span class="text-danger">*</span></label>
                    <input type="text" name="designation" class="form-control" value="{{ old('designation', $faculty->designation) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Qualification <span class="text-danger">*</span></label>
                    <input type="text" name="qualification" class="form-control" value="{{ old('qualification', $faculty->qualification) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Specialization</label>
                    <input type="text" name="specialization" class="form-control" value="{{ old('specialization', $faculty->specialization) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Experience (Yrs)</label>
                    <input type="number" name="experience" class="form-control" value="{{ old('experience', $faculty->experience) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $faculty->order) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $faculty->email) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $faculty->phone) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" class="form-control" rows="3">{{ old('bio', $faculty->bio) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Photo</label>
                    @if($faculty->photo) <img src="{{ asset('storage/'.$faculty->photo) }}" style="height:60px;border-radius:4px" class="mb-2 d-block"> @endif
                    <input type="file" name="photo" class="form-control" accept="image/*">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $faculty->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn" style="background:var(--primary);color:#fff"><i class="fas fa-save me-2"></i>Update</button>
                <a href="{{ route('admin.faculty.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
