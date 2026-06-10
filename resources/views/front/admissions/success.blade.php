@extends('layouts.front')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center py-5">
                <div class="mb-4" style="font-size:5rem;color:var(--secondary)"><i class="fas fa-check-circle"></i></div>
                <h2 class="text-maroon">Application Submitted!</h2>
                <p class="lead mt-3">Your application has been received. Please note your application number:</p>
                <div class="my-4 p-3 rounded-3" style="background:var(--primary);color:#fff;font-size:2rem;letter-spacing:4px;font-weight:700;">
                    {{ $admission->application_no }}
                </div>
                <p class="text-muted">We will review your application and contact you on <strong>{{ $admission->mobile }}</strong> and <strong>{{ $admission->email }}</strong>.</p>
                <a href="{{ route('home') }}" class="btn btn-lg mt-3" style="background:var(--primary);color:#fff">Go to Home</a>
            </div>
        </div>
    </div>
</section>
@endsection
