@extends('layouts.front')

@php $title = 'K.T.S.P. Mandal'; @endphp

@section('content')

<div class="page-banner">
    <div class="container">
        <h1>K.T.S.P. Mandal</h1>
        <p class="lead mb-2" style="color:rgba(255,255,255,.8)">Khalapur Taluka Shikshan Prasarak Mandal, Khopoli</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">K.T.S.P. Mandal</li>
            </ol>
        </nav>
    </div>
</div>

{{-- About Section --}}
<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7" data-aos="fade-right">
                <h2 class="section-title text-maroon">About K.T.S.P. Mandal</h2>
                <h5 class="text-gold mb-3">Khalapur Taluka Shikshan Prasarak Mandal</h5>
                <p class="lead" style="border-left:4px solid var(--secondary);padding-left:16px;font-style:italic;">
                    "Striving to achieve transformations in the educational, cultural and social fields of Maharashtra since 1957."
                </p>
                <p>K.T.S.P. Mandal, a renowned educational institution in Raigad District, was established in the year <strong>1957</strong>. Being registered as a public trust and society, K.T.S.P. Mandal has been striving to achieve the objectives of bringing transformations in the educational, cultural and social fields in Maharashtra.</p>
                <p>Over six decades of dedicated service, the Mandal has grown from a small educational initiative into one of the most respected educational trusts in Raigad District. It has consistently worked towards making quality education accessible to the students of the Khalapur region and beyond.</p>
                <p>The Mandal is committed to the all-round development of students — academic, cultural, social, and professional — and continues to expand its educational footprint with new programs and institutions.</p>
            </div>
            <div class="col-lg-5" data-aos="fade-left">
                <div class="card border-0 shadow" style="border-radius:16px;overflow:hidden;">
                    <div class="card-header text-white py-4 text-center" style="background:var(--primary);">
                        <div style="font-size:4rem;margin-bottom:8px;">🏛️</div>
                        <h4 class="mb-0">K.T.S.P. Mandal</h4>
                        <small class="opacity-75">Est. 1957 | Khopoli, Raigad</small>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3 text-center">
                            <div class="col-6">
                                <div class="p-3 rounded" style="background:#fff7f7;">
                                    <h3 class="text-maroon mb-0 fw-bold">67+</h3>
                                    <small class="text-muted">Years of Service</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 rounded" style="background:#fff7f7;">
                                    <h3 class="text-maroon mb-0 fw-bold">11</h3>
                                    <small class="text-muted">Schools</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 rounded" style="background:#fff7f7;">
                                    <h3 class="text-maroon mb-0 fw-bold">3</h3>
                                    <small class="text-muted">Junior Colleges</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 rounded" style="background:#fff7f7;">
                                    <h3 class="text-maroon mb-0 fw-bold">16+</h3>
                                    <small class="text-muted">Institutions</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Institutions --}}
<section class="py-5" style="background:#f8f9fa;">
    <div class="container">
        <h2 class="section-title text-center text-maroon">Institutions Under K.T.S.P. Mandal</h2>
        <div class="row g-4 mt-2">
            @foreach([
                ['icon'=>'fa-school','count'=>'11','label'=>'Schools','desc'=>'English & Marathi medium schools providing primary and secondary education across Khalapur Taluka.','color'=>'#7B1C1C'],
                ['icon'=>'fa-graduation-cap','count'=>'3','label'=>'Junior Colleges','desc'=>'Junior colleges offering Arts, Science, and Commerce streams for 11th and 12th standard.','color'=>'#C8973A'],
                ['icon'=>'fa-tools','count'=>'1','label'=>'Polytechnic','desc'=>'A polytechnic institute offering diploma-level technical and vocational programs.','color'=>'#1a1a2e'],
                ['icon'=>'fa-university','count'=>'1','label'=>'Senior College','desc'=>'K.M.C.C. Senior College offering undergraduate programs in Arts, Commerce, and Science.','color'=>'#2d6a4f'],
                ['icon'=>'fa-balance-scale','count'=>'1','label'=>'Law College','desc'=>'K.T.S.P.M\'s Law College, Khopoli — offering LL.B. (3 Years) affiliated to University of Mumbai.','color'=>'#7B1C1C'],
            ] as $inst)
            <div class="col-md-4 col-lg" data-aos="fade-up">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="mb-3">
                        <div style="width:70px;height:70px;background:{{ $inst['color'] }}15;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto;">
                            <i class="fas {{ $inst['icon'] }} fa-2x" style="color:{{ $inst['color'] }}"></i>
                        </div>
                    </div>
                    <h2 class="fw-bold mb-0" style="color:{{ $inst['color'] }}">{{ $inst['count'] }}</h2>
                    <h6 class="mb-2">{{ $inst['label'] }}</h6>
                    <p class="text-muted mb-0" style="font-size:.85rem;">{{ $inst['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Message Blocks --}}
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center text-maroon">Messages from Leadership</h2>
        <div class="row g-4 mt-2">
            @foreach([
                ['name'=>'Shri. Santosh Gurunath Jangam','role'=>'Chairman, K.T.S.P. Mandal','route'=>'mandal.chairman','icon'=>'fa-crown','color'=>'var(--primary)','msg'=>'The K.T.S.P. Mandal has always believed that education is the most powerful tool for social transformation. We continue to strive for excellence in every institution under our umbrella, ensuring that students from all sections of society get the best possible education.'],
                ['name'=>'Shri. Abubakar Aadam Jalgaonkar','role'=>'Vice-Chairman, K.T.S.P. Mandal','route'=>'mandal.vice-chairman','icon'=>'fa-star','color'=>'var(--secondary)','msg'=>'Our mandate has always been to bridge the gap between aspiration and opportunity. By establishing quality institutions including the Law College, we are opening new doors for youth who wish to serve society through the legal profession.'],
                ['name'=>'Shri. Kishor Balkrushna Patil','role'=>'Secretary, K.T.S.P. Mandal','route'=>'mandal.secretary','icon'=>'fa-feather-alt','color'=>'var(--dark)','msg'=>'The administrative strength of the Mandal lies in its dedication to transparency, accountability, and educational excellence. We ensure that every institution under the Mandal operates to the highest standards of academic and ethical integrity.'],
                ['name'=>'Principal','role'=>'Principal, K.T.S.P.M\'s Law College','route'=>'mandal.principal','icon'=>'fa-balance-scale','color'=>'#2d6a4f','msg'=>'Welcome to K.T.S.P.M\'s Law College, Khopoli. Our mission is to produce not just lawyers, but legal professionals who are ethical, articulate, and committed to justice. We provide a holistic environment where students can grow academically and professionally.'],
            ] as $leader)
            <div class="col-md-6 col-lg-3" data-aos="fade-up">
                <div class="card border-0 shadow h-100" style="border-top:4px solid {{ $leader['color'] }};border-radius:12px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div style="width:55px;height:55px;background:{{ $leader['color'] }}15;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fas {{ $leader['icon'] }} fa-lg" style="color:{{ $leader['color'] }}"></i>
                            </div>
                            <div>
                                <h6 class="mb-0" style="font-size:.9rem;">{{ $leader['name'] }}</h6>
                                <small style="color:{{ $leader['color'] }}">{{ $leader['role'] }}</small>
                            </div>
                        </div>
                        <p class="text-muted fst-italic" style="font-size:.85rem;line-height:1.6;">"{{ Str::limit($leader['msg'], 160) }}"</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 pb-3 px-4">
                        <a href="{{ route($leader['route']) }}" class="btn btn-sm w-100" style="border:2px solid {{ $leader['color'] }};color:{{ $leader['color'] }}">Read Full Message</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Governing Body CTA --}}
<section class="py-4" style="background:var(--primary);">
    <div class="container text-center">
        <h4 class="text-white mb-2">K.T.S.P. Mandal Governing Body</h4>
        <p style="color:rgba(255,255,255,.8)">Meet the distinguished members who guide the Mandal's mission and vision.</p>
        <a href="{{ route('mandal.governing-body') }}" class="btn btn-lg" style="background:var(--secondary);color:#fff">
            <i class="fas fa-users me-2"></i>View Governing Body
        </a>
    </div>
</section>

@endsection
