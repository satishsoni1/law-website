@extends('layouts.front')
@section('content')
<div class="page-banner">
    <div class="container">
        <h1>Anti-Ragging</h1>
        <nav aria-label="breadcrumb"><ol class="breadcrumb mb-0"><li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li><li class="breadcrumb-item active text-white">Anti-Ragging</li></ol></nav>
    </div>
</div>
<section class="py-5">
    <div class="container">
        <div class="alert alert-danger"><i class="fas fa-exclamation-triangle me-2"></i><strong>RAGGING IS A CRIMINAL OFFENCE.</strong> Strict action will be taken against perpetrators.</div>
        <h3 class="text-maroon mt-4">Anti-Ragging Policy</h3>
        <p>K.T.S.P.M's Law College strictly adheres to the UGC Regulations on Curbing the Menace of Ragging in Higher Educational Institutions, 2009 and all subsequent amendments.</p>
        <h5 class="mt-4">What Constitutes Ragging?</h5>
        <p>Any act that causes or is likely to cause physical or psychological harm, embarrassment, shame, disgrace, fear, or apprehension in a fresher or junior student.</p>
        <h5 class="mt-4">Anti-Ragging Committee</h5>
        <p>The college has a constituted Anti-Ragging Committee and Squad that monitors the campus and hostel to prevent any act of ragging.</p>
        <h5 class="mt-4">Report Ragging</h5>
        <ul>
            <li>National Anti-Ragging Helpline: <strong>1800-180-5522</strong></li>
            <li>Email: <strong>helpline@antiragging.in</strong></li>
            <li>College Anti-Ragging Cell: <strong>{{ \App\Models\Setting::get('phone', 'Contact Office') }}</strong></li>
        </ul>
    </div>
</section>
@endsection
