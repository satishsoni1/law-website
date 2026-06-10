@extends('layouts.front')
@section('content')
<div class="page-banner">
    <div class="container">
        <h1>Infrastructure</h1>
        <nav aria-label="breadcrumb"><ol class="breadcrumb mb-0"><li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li><li class="breadcrumb-item active text-white">Infrastructure</li></ol></nav>
    </div>
</div>
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-maroon">World-Class Infrastructure</h2>
        <div class="row g-4 mt-2">
            @foreach([
                ['icon'=>'fa-building','title'=>'College Building','desc'=>'Spacious, well-ventilated building with modern classrooms equipped with projectors and smart boards.'],
                ['icon'=>'fa-book','title'=>'Library','desc'=>'Extensive collection of legal texts, journals, bare acts, case laws, and online legal databases.'],
                ['icon'=>'fa-gavel','title'=>'Moot Court Hall','desc'=>'State-of-the-art moot court facility replicating a real courtroom for practical training.'],
                ['icon'=>'fa-computer','title'=>'Computer Lab','desc'=>'Well-equipped computer lab with high-speed internet for legal research and e-learning.'],
                ['icon'=>'fa-users','title'=>'Seminar Hall','desc'=>'Large seminar hall for guest lectures, workshops, conferences, and student events.'],
                ['icon'=>'fa-parking','title'=>'Facilities','desc'=>'Separate facilities for boys and girls, canteen, parking, and disability-friendly infrastructure.'],
            ] as $item)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="card border-0 shadow-sm p-4 h-100 text-center">
                        <div class="mb-3"><i class="fas {{ $item['icon'] }} fa-3x text-maroon"></i></div>
                        <h5>{{ $item['title'] }}</h5>
                        <p class="text-muted">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
