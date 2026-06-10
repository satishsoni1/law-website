@extends('layouts.admin')
@section('title', 'Application Details')
@section('page-title', 'Application: ' . $admission->application_no)
@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between">
                <h6 class="mb-0"><i class="fas fa-user me-2"></i>{{ $admission->student_name }}</h6>
                <span class="badge badge-{{ $admission->status }} fs-6">{{ ucfirst(str_replace('_',' ',$admission->status)) }}</span>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @php $fields = [
                        'Application No' => $admission->application_no,
                        "Father's Name"  => $admission->father_name,
                        "Mother's Name"  => $admission->mother_name,
                        'Date of Birth'  => $admission->dob?->format('d M Y'),
                        'Gender'         => ucfirst($admission->gender),
                        'Category'       => strtoupper($admission->category),
                        'Mobile'         => $admission->mobile,
                        'Email'          => $admission->email,
                        'Course'         => $admission->course->name ?? '—',
                        'Academic Year'  => $admission->academic_year,
                        'Qualification'  => $admission->qualification,
                        'Board/University' => $admission->board_university,
                        'Passing Year'   => $admission->passing_year,
                        'Percentage'     => $admission->percentage ? $admission->percentage . '%' : null,
                        'Address'        => trim(implode(', ', array_filter([$admission->address, $admission->city, $admission->state, $admission->pincode]))),
                    ]; @endphp
                    @foreach($fields as $label => $value)
                        @if($value)
                        <div class="col-md-6">
                            <small class="text-muted d-block">{{ $label }}</small>
                            <strong>{{ $value }}</strong>
                        </div>
                        @endif
                    @endforeach
                </div>
                <h6 class="mt-4 mb-3 text-maroon">Uploaded Documents</h6>
                <div class="row g-2">
                    @foreach(['photo'=>'Passport Photo','document_10th'=>'10th Marksheet','document_12th'=>'12th Marksheet','document_graduation'=>'Graduation','document_tc'=>'TC'] as $field => $label)
                        @if($admission->$field)
                        <div class="col-md-4">
                            <a href="{{ asset('storage/'.$admission->$field) }}" target="_blank" class="btn btn-sm btn-outline-secondary w-100">
                                <i class="fas fa-file me-1"></i>{{ $label }}
                            </a>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @if($admission->photo)
            <div class="card border-0 shadow-sm mb-4 text-center p-3">
                <img src="{{ asset('storage/'.$admission->photo) }}" style="width:130px;height:160px;object-fit:cover;border-radius:8px;" class="mx-auto" alt="{{ $admission->student_name }}">
                <p class="mt-2 mb-0 text-muted">Passport Photo</p>
            </div>
        @endif
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white"><h6 class="mb-0">Update Status</h6></div>
            <div class="card-body">
                <form action="{{ route('admin.admissions.status', $admission) }}" method="POST">
                    @csrf @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            @foreach(['pending','under_review','approved','rejected'] as $s)
                                <option value="{{ $s }}" {{ $admission->status === $s ? 'selected' : '' }}>{{ ucfirst(str_replace('_',' ',$s)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Remarks</label>
                        <textarea name="remarks" class="form-control" rows="3">{{ $admission->remarks }}</textarea>
                    </div>
                    <button type="submit" class="btn w-100" style="background:var(--primary);color:#fff">Update Status</button>
                </form>
                <form action="{{ route('admin.admissions.destroy', $admission) }}" method="POST" class="mt-3" onsubmit="return confirm('Delete this application?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger w-100"><i class="fas fa-trash me-2"></i>Delete Application</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
