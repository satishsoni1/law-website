@extends('layouts.front')
@section('content')
<div class="page-banner">
    <div class="container">
        <h1>Affiliation & Approval</h1>
        <nav aria-label="breadcrumb"><ol class="breadcrumb mb-0"><li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li><li class="breadcrumb-item active text-white">Affiliation</li></ol></nav>
    </div>
</div>
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <div class="text-center mb-3"><i class="fas fa-university fa-3x text-maroon"></i></div>
                    <h4 class="text-center text-maroon">University of Mumbai</h4>
                    <p class="text-muted text-center">K.T.S.P.M's Law College, Khopoli is affiliated to the University of Mumbai (Fort, Mumbai) under the Faculty of Law.</p>
                    <ul class="mt-3">
                        <li>The LL.B. degree awarded is recognized across India.</li>
                        <li>Examination conducted as per University norms.</li>
                        <li>Regular inspection and compliance maintained.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <div class="text-center mb-3"><i class="fas fa-balance-scale fa-3x text-maroon"></i></div>
                    <h4 class="text-center text-maroon">Bar Council of India</h4>
                    <p class="text-muted text-center">The college is approved by the Bar Council of India (BCI) as required under the Advocates Act, 1961.</p>
                    <ul class="mt-3">
                        <li>Degree holders are eligible to enroll as advocates.</li>
                        <li>BCI norms for infrastructure and faculty are fully met.</li>
                        <li>Regular renewal of recognition maintained.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
