@extends('layouts.admin')
@section('title', 'Testimonials')
@section('page-title', 'Student Testimonials')
@section('content')
<div class="row g-4">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead><tr><th>Name</th><th>Course</th><th>Rating</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                        @forelse($testimonials as $t)
                        <tr>
                            <td><strong>{{ $t->name }}</strong><br><small class="text-muted">{{ $t->designation }}</small></td>
                            <td>{{ $t->course ?? '—' }}</td>
                            <td>@for($i=1;$i<=5;$i++) <i class="fas fa-star{{ $i > $t->rating ? ' text-muted' : ' text-warning' }}" style="font-size:.75rem"></i> @endfor</td>
                            <td><span class="badge {{ $t->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $t->is_active ? 'Active' : 'Inactive' }}</span></td>
                            <td>
                                <form action="{{ route('admin.settings.testimonials.destroy', $t) }}" method="POST" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">No testimonials.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white">{{ $testimonials->links() }}</div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white"><h6 class="mb-0"><i class="fas fa-plus me-2"></i>Add Testimonial</h6></div>
            <div class="card-body">
                <form action="{{ route('admin.settings.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2"><label class="form-label">Name <span class="text-danger">*</span></label><input type="text" name="name" class="form-control" required></div>
                    <div class="mb-2"><label class="form-label">Designation</label><input type="text" name="designation" class="form-control" placeholder="Alumni, LL.B. 2023"></div>
                    <div class="mb-2"><label class="form-label">Course</label><input type="text" name="course" class="form-control"></div>
                    <div class="mb-2"><label class="form-label">Rating</label>
                        <select name="rating" class="form-select">
                            <option value="5">5 Stars</option><option value="4">4 Stars</option><option value="3">3 Stars</option>
                        </select>
                    </div>
                    <div class="mb-2"><label class="form-label">Testimonial <span class="text-danger">*</span></label><textarea name="content" class="form-control" rows="3" required></textarea></div>
                    <div class="mb-3"><label class="form-label">Photo</label><input type="file" name="photo" class="form-control" accept="image/*"></div>
                    <button type="submit" class="btn w-100" style="background:var(--primary);color:#fff">Add Testimonial</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
