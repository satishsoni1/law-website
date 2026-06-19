@extends('layouts.front')
@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Admissions {{ date('Y') }}-{{ date('Y')+1 }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Admissions</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <h3 class="text-maroon mb-4">Online Application Form</h3>

                @if(session('success'))
                    <div class="alert alert-success"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}</div>
                @endif

                <form action="{{ route('admissions.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf

                    {{-- Personal Information --}}
                    <div class="card mb-4">
                        <div class="card-header" style="background:var(--primary);color:#fff"><h6 class="mb-0"><i class="fas fa-user me-2"></i>Personal Information</h6></div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label">Student Name <span class="text-danger">*</span></label>
                                    <input type="text" name="student_name" class="form-control @error('student_name') is-invalid @enderror" value="{{ old('student_name') }}" required>
                                    @error('student_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Father's Name</label>
                                    <input type="text" name="father_name" class="form-control @error('father_name') is-invalid @enderror" value="{{ old('father_name') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mother's Name</label>
                                    <input type="text" name="mother_name" class="form-control" value="{{ old('mother_name') }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" required>
                                    @error('dob') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                        <option value="">Select</option>
                                        <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Category <span class="text-danger">*</span></label>
                                    <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                                        <option value="">Select</option>
                                        @foreach(['general'=>'General','obc'=>'OBC','sc'=>'SC','st'=>'ST','nt'=>'NT','sbc'=>'SBC'] as $val => $label)
                                            <option value="{{ $val }}" {{ old('category') === $val ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Contact Information --}}
                    <div class="card mb-4">
                        <div class="card-header" style="background:var(--primary);color:#fff"><h6 class="mb-0"><i class="fas fa-phone me-2"></i>Contact Information</h6></div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" pattern="[0-9]{10}" maxlength="10" required>
                                    @error('mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control" rows="2">{{ old('address') }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">City</label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">State</label>
                                    <input type="text" name="state" class="form-control" value="{{ old('state') }}" placeholder="Maharashtra">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Pincode</label>
                                    <input type="text" name="pincode" class="form-control" value="{{ old('pincode') }}" maxlength="6">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Academic Information --}}
                    <div class="card mb-4">
                        <div class="card-header" style="background:var(--primary);color:#fff"><h6 class="mb-0"><i class="fas fa-graduation-cap me-2"></i>Academic Information</h6></div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Highest Qualification <span class="text-danger">*</span></label>
                                    <input type="text" name="qualification" class="form-control @error('qualification') is-invalid @enderror" value="{{ old('qualification') }}" placeholder="e.g., B.A., B.Com" required>
                                    @error('qualification') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Board/University</label>
                                    <input type="text" name="board_university" class="form-control" value="{{ old('board_university') }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Year of Passing</label>
                                    <input type="text" name="passing_year" class="form-control" value="{{ old('passing_year') }}" placeholder="{{ date('Y') - 1 }}" maxlength="4">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Percentage</label>
                                    <input type="number" name="percentage" class="form-control" value="{{ old('percentage') }}" step="0.01" min="0" max="100">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Course Applied For <span class="text-danger">*</span></label>
                                    <select name="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
                                        <option value="">Select Course</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Documents --}}
                    <div class="card mb-4">
                        <div class="card-header" style="background:var(--primary);color:#fff"><h6 class="mb-0"><i class="fas fa-file-upload me-2"></i>Documents Upload</h6></div>
                        <div class="card-body">
                            <div class="alert alert-info py-2 mb-3"><i class="fas fa-info-circle me-2"></i>Upload files in JPG/PNG (images) or PDF format. Max 2MB each.</div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Passport Photo <span class="text-danger">*</span></label>
                                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/jpg,image/jpeg,image/png" required>
                                    @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">10th Marksheet</label>
                                    <input type="file" name="document_10th" class="form-control" accept=".pdf,image/jpg,image/jpeg">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">12th Marksheet</label>
                                    <input type="file" name="document_12th" class="form-control" accept=".pdf,image/jpg,image/jpeg">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Graduation Marksheet</label>
                                    <input type="file" name="document_graduation" class="form-control" accept=".pdf,image/jpg,image/jpeg">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Transfer Certificate</label>
                                    <input type="file" name="document_tc" class="form-control" accept=".pdf,image/jpg,image/jpeg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-lg" style="background:var(--primary);color:#fff">
                            <i class="fas fa-paper-plane me-2"></i>Submit Application
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">

                {{-- Eligibility Criteria --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header text-white" style="background:var(--primary)">
                        <h6 class="mb-0"><i class="fas fa-check-circle me-2"></i>Eligibility Criteria</h6>
                    </div>
                    <div class="card-body p-4">
                        <ol class="ps-3 mb-0" style="font-size:.9rem;">
                            <li class="mb-3">The basic requirement for admission to the Three-Year Law Course is that the candidate has to appear in the <strong>Common Entrance Test (CET)</strong> Examination.</li>
                            <li class="mb-3">CET examination is conducted by <strong>State Common Entrance Test Cell, Government of Maharashtra</strong> on the specified dates. Students are required to follow instructions published on the official CET Cell website.</li>
                            <li class="mb-0">A candidate who has successfully completed the <strong>Bachelor's Degree</strong> from Mumbai University or equivalent, with:
                                <ul class="mt-2" style="list-style:disc;padding-left:1.2rem;">
                                    <li class="mb-1"><strong>45%</strong> marks — Open Category</li>
                                    <li class="mb-1"><strong>42%</strong> marks — OBC / NT Category</li>
                                    <li><strong>40%</strong> marks — SC Category</li>
                                </ul>
                                is eligible for admission to First Year LL.B.
                            </li>
                        </ol>
                    </div>
                </div>

                {{-- Admission Procedure --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header text-white" style="background:var(--primary)">
                        <h6 class="mb-0"><i class="fas fa-list-ol me-2"></i>Admission Procedure</h6>
                    </div>
                    <div class="card-body p-4">
                        <ol class="ps-3 mb-0" style="font-size:.88rem;line-height:1.75;">
                            <li class="mb-3">Admission procedure starts after declaration of CET results by the State Common Entrance Test Cell.</li>
                            <li class="mb-3">CET Cell publishes a <strong>merit list</strong> based on CET score and details submitted in the online form. Students must give college options in preferential order.</li>
                            <li class="mb-3">CET Cell makes <strong>college allotment</strong>; students must take admission within the prescribed time.</li>
                            <li class="mb-3">If the chosen college is not allotted in any CAP Round, admission can be secured in the <strong>Institutional Round</strong> (vacant seats after CAP + Institution quota), subject to seat availability and merit.</li>
                            <li class="mb-3">Documents uploaded at online form stage are <strong>verified at college admission</strong>. Students must submit true and authenticated documents. The college has the right to reject incorrect documents.</li>
                            <li class="mb-0">Confirmation of admission is subject to <strong>ARA (Admission Regulatory Authority)</strong> approval. If documents are rejected by ARA, the college will not be liable for cancellation.</li>
                        </ol>
                    </div>
                </div>

                {{-- Syllabus Download --}}
                <div class="card border-0 shadow-sm mb-4" style="border-left:4px solid var(--secondary) !important;">
                    <div class="card-body p-4">
                        <h6 class="text-maroon mb-2"><i class="fas fa-file-word me-2"></i>Course Syllabus</h6>
                        <p class="text-muted mb-3" style="font-size:.875rem;">Download the complete LL.B. 3-Year programme syllabus.</p>
                        <a href="{{ route('downloads.index') }}" class="btn btn-sm w-100" style="background:var(--primary);color:#fff;">
                            <i class="fas fa-download me-2"></i>Download Syllabus
                        </a>
                    </div>
                </div>

                {{-- Help --}}
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="text-maroon mb-3">Need Help?</h5>
                        <p class="text-muted">Contact our admissions office:</p>
                        <p><i class="fas fa-phone text-maroon me-2"></i>{{ \App\Models\Setting::get('phone', '+91 02192 000000') }}</p>
                        <p><i class="fas fa-envelope text-maroon me-2"></i>{{ \App\Models\Setting::get('email', 'admissions@ktspmlawcollege.edu.in') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
