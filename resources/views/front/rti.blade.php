@extends('layouts.front')
@section('content')
<div class="page-banner"><div class="container"><h1>Right to Information (RTI)</h1></div></div>
<section class="py-5">
    <div class="container">
        <h3 class="text-maroon">RTI Act, 2005</h3>
        <p>As per the Right to Information Act, 2005, citizens may seek information from K.T.S.P.M's Law College. The Public Information Officer (PIO) is designated to handle all RTI requests.</p>
        <h5 class="mt-4">Public Information Officer</h5>
        <p><strong>Name:</strong> Principal / Designated PIO<br>
        <strong>Address:</strong> {{ \App\Models\Setting::get('address', 'K.T.S.P.M\'s Law College, Khopoli, Raigad') }}<br>
        <strong>Phone:</strong> {{ \App\Models\Setting::get('phone', '+91 02192 000000') }}<br>
        <strong>Email:</strong> {{ \App\Models\Setting::get('email', 'info@ktspmlawcollege.edu.in') }}</p>
        <h5 class="mt-4">How to File an RTI Application</h5>
        <ol><li>Submit a written application to the PIO</li><li>Pay the prescribed fee of ₹10</li><li>Information shall be provided within 30 days</li></ol>
    </div>
</section>
@endsection
