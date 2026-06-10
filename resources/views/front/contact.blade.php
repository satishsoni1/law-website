@extends('layouts.front')
@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Contact Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Contact</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <h3 class="text-maroon mb-4">Get In Touch</h3>
                <div class="d-flex gap-3 mb-4">
                    <div style="width:50px;height:50px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-map-marker-alt text-white"></i></div>
                    <div><h6>Address</h6><p class="text-muted mb-0">{{ \App\Models\Setting::get('address', 'Khopoli, Raigad, Maharashtra - 410203') }}</p></div>
                </div>
                <div class="d-flex gap-3 mb-4">
                    <div style="width:50px;height:50px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-phone text-white"></i></div>
                    <div><h6>Phone</h6><p class="text-muted mb-0">{{ \App\Models\Setting::get('phone', '+91 02192 000000') }}</p></div>
                </div>
                <div class="d-flex gap-3 mb-4">
                    <div style="width:50px;height:50px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-envelope text-white"></i></div>
                    <div><h6>Email</h6><p class="text-muted mb-0">{{ \App\Models\Setting::get('email', 'info@ktspmlawcollege.edu.in') }}</p></div>
                </div>
                @php $map = \App\Models\Setting::get('google_map_embed'); @endphp
                @if($map)
                    <div class="rounded overflow-hidden mt-3" style="height:250px">{!! $map !!}</div>
                @else
                    <div class="rounded overflow-hidden mt-3" style="height:250px">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.5!2d73.34!3d18.78!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTjCsDA3JzAwLjAiTiA3M8KwMjAnMjQuMCJF!5e0!3m2!1sen!2sin!4v1" width="100%" height="100%" style="border:0" allowfullscreen loading="lazy"></iframe>
                    </div>
                @endif
            </div>
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm p-4">
                    <h3 class="text-maroon mb-4">Send a Message</h3>
                    @if(session('success'))
                        <div class="alert alert-success"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Message <span class="text-danger">*</span></label>
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="5" required>{{ old('message') }}</textarea>
                                @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-lg w-100" style="background:var(--primary);color:#fff">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
