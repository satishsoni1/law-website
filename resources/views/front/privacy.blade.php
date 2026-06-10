@extends('layouts.front')
@section('content')
<div class="page-banner"><div class="container"><h1>Privacy Policy</h1></div></div>
<section class="py-5">
    <div class="container" style="max-width:800px">
        <h3 class="text-maroon">Privacy Policy</h3>
        <p>K.T.S.P.M's Law College, Khopoli is committed to protecting your privacy. This policy explains how we collect, use, and safeguard your information.</p>
        <h5 class="mt-4">Information We Collect</h5>
        <p>We collect information you provide when applying for admission, contacting us, or using our services — including name, email, phone number, and academic details.</p>
        <h5 class="mt-4">How We Use Your Information</h5>
        <ul><li>Processing admission applications</li><li>Communicating about admission status</li><li>Sending important notices and updates</li><li>Improving our services</li></ul>
        <h5 class="mt-4">Data Security</h5>
        <p>We implement appropriate security measures to protect your information from unauthorized access, alteration, or disclosure.</p>
        <h5 class="mt-4">Contact</h5>
        <p>For privacy concerns, contact us at: {{ \App\Models\Setting::get('email', 'info@ktspmlawcollege.edu.in') }}</p>
    </div>
</section>
@endsection
