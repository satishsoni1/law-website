@extends('layouts.front')

@php $title = 'Governing Body'; @endphp

@section('content')

<div class="page-banner">
    <div class="container">
        <h1>Governing Body</h1>
        <p class="mb-2" style="color:rgba(255,255,255,.8)">K.T.S.P. Mandal, Khopoli — Khalapur Taluka Shikshan Prasarak Mandal</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('mandal') }}">K.T.S.P. Mandal</a></li>
                <li class="breadcrumb-item active text-white">Governing Body</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="text-maroon">K.T.S.P. Mandal's Governing Body</h2>
            <p class="text-muted">Distinguished members who guide the Mandal's educational mission</p>
        </div>

        {{-- Executive Members --}}
        <div class="row g-4 justify-content-center mb-5">
            @foreach([
                ['sr'=>'01','name'=>'Shri. Santosh Gurunath Jangam','role'=>'Chairman','icon'=>'fa-crown','color'=>'var(--primary)','route'=>'mandal.chairman'],
                ['sr'=>'02','name'=>'Shri. Abubakar Aadam Jalgaonkar','role'=>'Vice-Chairman','icon'=>'fa-star','color'=>'var(--secondary)','route'=>'mandal.vice-chairman'],
                ['sr'=>'03','name'=>'Shri. Kishor Balkrushna Patil','role'=>'Secretary','icon'=>'fa-feather-alt','color'=>'#1a1a2e','route'=>'mandal.secretary'],
            ] as $exec)
            <div class="col-md-4" data-aos="zoom-in">
                <div class="card border-0 shadow text-center p-4" style="border-top:5px solid {{ $exec['color'] }};border-radius:16px;">
                    <div class="mb-3">
                        <div style="width:80px;height:80px;background:{{ $exec['color'] }};border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto;">
                            <i class="fas {{ $exec['icon'] }} fa-2x text-white"></i>
                        </div>
                    </div>
                    <span class="badge mb-2 px-3 py-2" style="background:{{ $exec['color'] }};font-size:.85rem;">{{ $exec['role'] }}</span>
                    <h5 class="mb-1">{{ $exec['name'] }}</h5>
                    <small class="text-muted d-block mb-3">K.T.S.P. Mandal, Khopoli</small>
                    <a href="{{ route($exec['route']) }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-quote-left me-1"></i> Read Message
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Full Governing Body Table --}}
        <div class="card border-0 shadow-sm" data-aos="fade-up">
            <div class="card-header py-3 text-white text-center" style="background:var(--primary);">
                <h5 class="mb-0"><i class="fas fa-users me-2"></i>Complete Governing Body — K.T.S.P. Mandal</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead>
                        <tr style="background:var(--dark);color:#fff;">
                            <th class="text-center py-3" style="width:80px;background:var(--dark);color:#fff;">Sr.No.</th>
                            <th class="py-3" style="background:var(--dark);color:#fff;">Name</th>
                            <th class="py-3" style="background:var(--dark);color:#fff;">Designation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $members = [
                            ['01', 'Shri. Santosh Gurunath Jangam',          'Chairman'],
                            ['02', 'Shri. Abubakar Aadam Jalgaonkar',        'Vice-Chairman'],
                            ['03', 'Shri. Kishor Balkrushna Patil',           'Secretary'],
                            ['04', 'Shri. Sanjay Hiraman Patil',              'Member'],
                            ['05', 'Shri. Dattatraya Shankar Masurkar',       'Member'],
                            ['06', 'Shri. Dilip Umedmal Porwal',              'Member'],
                            ['07', 'Dr. Shri. Hemant Anant Patil',            'Member'],
                            ['08', 'Shri. Jitendra Mulshankar Rawal',         'Member'],
                            ['09', 'Shri. Dinesh Ramakant Gurav',             'Member'],
                            ['10', 'Shri. Bhaskar Laxman Landage',            'Member'],
                            ['11', 'Shri. Chandrakant Mahadev Kedari',        'Member'],
                            ['12', 'Shri. Vinod Jagdishprasad Jakhotia',      'Member'],
                            ['13', 'Shri. Rajesh Prabhulal Abhani',           'Member'],
                            ['14', 'Shri. Neeraj Prakash Oswal',              'Member'],
                            ['15', 'Shri. Jitesh Natwarlal Thakkar',          'Member'],
                            ['16', 'Shri. Narendra Chandulal Shah',           'Member'],
                            ['17', 'Shri. Vipul Vijay Mhatre',               'Member'],
                            ['18', 'Shri. Ananta Dundaji Hadap',              'Member'],
                            ['19', 'Shri. Yeshwant Laxman Sable',            'Member'],
                            ['20', 'Shri. Kailas Maruti Gaikwad',            'Member'],
                            ['21', 'Shri. Vijay Sakharam Churi',             'Member'],
                            ['22', 'Shri. Rahul Gajanan Mahakal',            'Member'],
                            ['23', 'Mr. Pradeep Deshmukh',                   'Ex-Officio Secretary'],
                        ];
                        @endphp
                        @foreach($members as [$sr, $name, $role])
                        <tr>
                            <td class="text-center fw-semibold" style="color:var(--primary);">{{ $sr }}</td>
                            <td class="fw-semibold py-3">
                                @if(in_array($role, ['Chairman','Vice-Chairman','Secretary','Ex-Officio Secretary']))
                                    <i class="fas fa-{{ $role === 'Chairman' ? 'crown' : ($role === 'Vice-Chairman' ? 'star' : 'feather-alt') }} me-2" style="color:var(--secondary);font-size:.85rem;"></i>
                                @endif
                                {{ $name }}
                            </td>
                            <td>
                                @if($role === 'Chairman')
                                    <span class="badge px-3 py-2" style="background:var(--primary);font-size:.85rem;">{{ $role }}</span>
                                @elseif($role === 'Vice-Chairman')
                                    <span class="badge px-3 py-2" style="background:var(--secondary);font-size:.85rem;">{{ $role }}</span>
                                @elseif(in_array($role, ['Secretary','Ex-Officio Secretary']))
                                    <span class="badge px-3 py-2" style="background:var(--dark);font-size:.85rem;">{{ $role }}</span>
                                @else
                                    <span class="text-muted">{{ $role }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('mandal') }}" class="btn btn-outline-danger me-2"><i class="fas fa-arrow-left me-2"></i>About Mandal</a>
            <a href="{{ route('about') }}" class="btn btn-outline-secondary">About College</a>
        </div>
    </div>
</section>

@endsection
