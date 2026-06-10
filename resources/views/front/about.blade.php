@extends('layouts.front')
@section('content')

<div class="page-banner">
    <div class="container">
        <h1>About Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">About</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title text-maroon">About K.T.S.P.M's Law College</h2>
                <p>K.T.S.P.M's Law College, Khopoli is established under the aegis of K.T.S.P. Mandal (Khopoli Taluka Shikshan Prasarak Mandal). The college is affiliated to the University of Mumbai and approved by the Bar Council of India.</p>
                <p>The college offers the LL.B. (3-Year) degree program designed to provide students with a comprehensive understanding of law and legal practice. Our mission is to cultivate legal professionals who are not only knowledgeable but also ethical and socially responsible.</p>
                <div class="row mt-4 g-3">
                    <div class="col-6">
                        <div class="text-center p-3 rounded" style="background:#fff7f7;">
                            <i class="fas fa-university fa-2x text-maroon mb-2"></i>
                            <p class="mb-0 fw-bold">University of Mumbai</p>
                            <small class="text-muted">Affiliated</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center p-3 rounded" style="background:#fff7f7;">
                            <i class="fas fa-balance-scale fa-2x text-maroon mb-2"></i>
                            <p class="mb-0 fw-bold">Bar Council of India</p>
                            <small class="text-muted">Approved</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="p-4 rounded-3" style="background:var(--primary);color:#fff;">
                    <h4 style="color:var(--secondary)"><i class="fas fa-eye me-2"></i>Vision</h4>
                    <p>To become a premier institution of legal education in Maharashtra, producing competent, ethical, and socially committed legal professionals.</p>
                    <hr style="border-color:rgba(255,255,255,.2)">
                    <h4 style="color:var(--secondary)"><i class="fas fa-bullseye me-2"></i>Mission</h4>
                    <ul>
                        <li>Provide quality legal education accessible to students from all backgrounds.</li>
                        <li>Foster critical thinking, research aptitude, and professional skills.</li>
                        <li>Inculcate ethical values and social responsibility among future lawyers.</li>
                        <li>Bridge the gap between legal theory and practical application.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8f9fa">
    <div class="container">
        <h2 class="section-title text-center text-maroon">Why Choose Us?</h2>
        <div class="row g-4 mt-2">
            @foreach([
                ['icon'=>'fa-chalkboard-teacher','title'=>'Experienced Faculty','desc'=>'Highly qualified permanent and visiting faculty with practical legal experience.'],
                ['icon'=>'fa-book','title'=>'Well-Equipped Library','desc'=>'Extensive collection of law books, journals, and online legal databases.'],
                ['icon'=>'fa-gavel','title'=>'Moot Court','desc'=>'State-of-the-art moot court facility for practical legal training.'],
                ['icon'=>'fa-graduation-cap','title'=>'University Affiliation','desc'=>'Affiliated to University of Mumbai with recognized degree programs.'],
                ['icon'=>'fa-handshake','title'=>'Career Support','desc'=>'Placement assistance and career counseling for legal professionals.'],
                ['icon'=>'fa-users','title'=>'Student Activities','desc'=>'Legal aid camps, seminars, workshops, and cultural programs.'],
            ] as $item)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="d-flex gap-3 p-3">
                        <div class="flex-shrink-0">
                            <div style="width:55px;height:55px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                <i class="fas {{ $item['icon'] }} text-white fa-lg"></i>
                            </div>
                        </div>
                        <div>
                            <h6>{{ $item['title'] }}</h6>
                            <p class="text-muted mb-0">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
