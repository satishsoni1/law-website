@extends('layouts.front')

@section('content')

{{-- Hero Slider --}}
<div id="heroSlider" class="carousel slide hero-slider" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($sliders as $i => $slide)
            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @forelse($sliders as $i => $slide)
            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $slide->image) }}" class="d-block w-100" alt="{{ $slide->title }}">
                <div class="carousel-caption">
                    <h1 data-aos="fade-right">{{ $slide->title }}</h1>
                    @if($slide->subtitle)
                        <p class="lead" data-aos="fade-right" data-aos-delay="200">{{ $slide->subtitle }}</p>
                    @endif
                    @if($slide->button_text)
                        <a href="{{ $slide->button_url ?? route('admissions.index') }}" class="btn btn-lg mt-2" style="background:var(--secondary);color:#fff" data-aos="fade-up" data-aos-delay="400">
                            {{ $slide->button_text }}
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="carousel-item active">
                <div style="height:580px;background:linear-gradient(135deg,var(--primary) 0%,var(--dark) 100%);display:flex;align-items:center;justify-content:center;">
                    <div class="text-center text-white px-4">
                        <h1 style="font-size:3rem;font-family:'Playfair Display',serif;">K.T.S.P.M's Law College, Khopoli</h1>
                        <p class="lead mt-3">Affiliated to University of Mumbai | Approved by Bar Council of India</p>
                        <a href="{{ route('admissions.index') }}" class="btn btn-lg mt-3" style="background:var(--secondary);color:#fff">Apply for Admission</a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

{{-- Quick Stats --}}
<section style="background:var(--primary);padding:20px 0;">
    <div class="container">
        <div class="row text-white text-center">
            <div class="col-6 col-md-3 py-3 border-end border-secondary">
                <h3 class="mb-0" style="color:var(--secondary);font-size:2rem;">{{ \App\Models\Admission::where('status','approved')->count() }}+</h3>
                <small>Students Enrolled</small>
            </div>
            <div class="col-6 col-md-3 py-3 border-end border-secondary">
                <h3 class="mb-0" style="color:var(--secondary);font-size:2rem;">{{ \App\Models\Faculty::active()->count() }}+</h3>
                <small>Faculty Members</small>
            </div>
            <div class="col-6 col-md-3 py-3 border-end border-secondary">
                <h3 class="mb-0" style="color:var(--secondary);font-size:2rem;">{{ \App\Models\Course::active()->count() }}</h3>
                <small>Courses Offered</small>
            </div>
            <div class="col-6 col-md-3 py-3">
                <h3 class="mb-0" style="color:var(--secondary);font-size:2rem;">{{ date('Y') - 2010 }}+</h3>
                <small>Years of Excellence</small>
            </div>
        </div>
    </div>
</section>

{{-- About + Notice Board --}}
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8" data-aos="fade-right">
                <h2 class="section-title text-maroon">Welcome to K.T.S.P.M's Law College</h2>
                <p class="lead">Established under the K.T.S.P. Mandal, Khopoli, our Law College is affiliated to the University of Mumbai and approved by the Bar Council of India. We are committed to shaping the future legal professionals of India.</p>
                <p>Our college provides a comprehensive legal education combining theoretical knowledge with practical skills. With experienced faculty, a well-equipped library, and modern infrastructure, we offer students an environment conducive to learning.</p>
                <div class="row mt-4 g-3">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3 p-3 rounded" style="background:#fff7f7;border-left:4px solid var(--primary)">
                            <i class="fas fa-university text-maroon fa-2x"></i>
                            <div><strong>Affiliated to</strong><br><small>University of Mumbai</small></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3 p-3 rounded" style="background:#fff7f7;border-left:4px solid var(--secondary)">
                            <i class="fas fa-balance-scale text-gold fa-2x"></i>
                            <div><strong>Approved by</strong><br><small>Bar Council of India</small></div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('about') }}" class="btn btn-outline-danger mt-4">Read More About Us</a>
            </div>
            <div class="col-lg-4" data-aos="fade-left">
                <div class="notice-board p-4 h-100">
                    <h5 class="mb-3" style="color:var(--secondary);"><i class="fas fa-bullhorn me-2"></i>Notice Board</h5>
                    @forelse($notices as $notice)
                        <div class="notice-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    @if($notice->is_pinned)
                                        <span class="badge bg-warning text-dark mb-1">Pinned</span>
                                    @endif
                                    <p class="mb-1" style="font-size:.9rem;">{{ Str::limit($notice->title, 70) }}</p>
                                    <small class="text-warning opacity-75">{{ $notice->publish_date->format('d M Y') }}</small>
                                </div>
                                @if($notice->attachment)
                                    <a href="{{ route('notices.download', $notice) }}" class="text-warning ms-2" title="Download"><i class="fas fa-download"></i></a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-center opacity-75 mt-4">No notices available.</p>
                    @endforelse
                    <a href="{{ route('notices.index') }}" class="btn btn-sm btn-outline-warning mt-3 w-100">View All Notices</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Leadership Messages --}}
<section class="py-5" style="background:#f8f9fa">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title text-maroon">Messages from Leadership</h2>
            <p class="text-muted">Guiding words from K.T.S.P. Mandal's leadership and our Principal</p>
        </div>
        <div class="row g-4">
            @foreach([
                [
                    'name'    => 'Shri. Santosh Gurunath Jangam',
                    'title'   => 'Chairman, K.T.S.P. Mandal',
                    'icon'    => 'fa-crown',
                    'color'   => 'var(--primary)',
                    'route'   => 'mandal.chairman',
                    'excerpt' => 'Education is the most powerful instrument for social transformation. The establishment of K.T.S.P.M\'s Law College represents a significant milestone in our mission to make quality education accessible to all.',
                    'delay'   => 0,
                ],
                [
                    'name'    => 'Shri. Abubakar Aadam Jalgaonkar',
                    'title'   => 'Vice-Chairman, K.T.S.P. Mandal',
                    'icon'    => 'fa-star',
                    'color'   => 'var(--secondary)',
                    'route'   => 'mandal.vice-chairman',
                    'excerpt' => 'With this college, we have brought legal education home for students of Raigad District who aspired to enter the legal field but were constrained by distance and resources.',
                    'delay'   => 100,
                ],
                [
                    'name'    => 'Shri. Kishor Balkrushna Patil',
                    'title'   => 'Secretary, K.T.S.P. Mandal',
                    'icon'    => 'fa-feather-alt',
                    'color'   => '#1a1a2e',
                    'route'   => 'mandal.secretary',
                    'excerpt' => 'Transparency, accountability, and student welfare are the pillars of our approach. We are committed to ensuring every student has access to the best possible academic environment.',
                    'delay'   => 200,
                ],
                [
                    'name'    => 'Principal',
                    'title'   => 'K.T.S.P.M\'s Law College, Khopoli',
                    'icon'    => 'fa-balance-scale',
                    'color'   => '#1a5c35',
                    'route'   => 'mandal.principal',
                    'excerpt' => 'Law is not merely about knowing statutes — it is about understanding society, advocating for fairness, and standing up for those who cannot stand up for themselves.',
                    'delay'   => 300,
                ],
            ] as $leader)
            <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="{{ $leader['delay'] }}">
                <div class="card h-100 border-0 shadow-sm" style="border-radius:16px;overflow:hidden;">
                    <div class="py-4 px-3 text-center" style="background:{{ $leader['color'] }};">
                        <div style="width:72px;height:72px;border-radius:50%;background:rgba(255,255,255,.15);border:3px solid rgba(255,255,255,.4);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
                            <i class="fas {{ $leader['icon'] }} fa-2x" style="color:var(--secondary);"></i>
                        </div>
                        <h6 class="mb-1 text-white" style="font-size:.95rem;">{{ $leader['name'] }}</h6>
                        <small style="color:rgba(255,255,255,.75);">{{ $leader['title'] }}</small>
                    </div>
                    <div class="card-body p-4 d-flex flex-column">
                        <p class="text-muted fst-italic mb-3" style="font-size:.9rem;line-height:1.75;">
                            <i class="fas fa-quote-left me-1" style="color:var(--secondary);font-size:.75rem;"></i>
                            {{ $leader['excerpt'] }}
                            <i class="fas fa-quote-right ms-1" style="color:var(--secondary);font-size:.75rem;"></i>
                        </p>
                        <div class="mt-auto">
                            <a href="{{ route($leader['route']) }}" class="btn btn-sm w-100 text-white" style="background:{{ $leader['color'] }};border-radius:8px;">
                                <i class="fas fa-book-open me-2"></i>Read Full Message
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="{{ route('mandal') }}" class="btn btn-outline-danger">
                <i class="fas fa-building me-2"></i>About K.T.S.P. Mandal
            </a>
        </div>
    </div>
</section>

{{-- Courses --}}
@if($courses->count())
<section class="py-5" style="background:#f8f9fa">
    <div class="container">
        <h2 class="section-title text-center text-maroon">Courses Offered</h2>
        <p class="text-center text-muted mb-4">Explore our professionally designed legal programs</p>
        <div class="row g-4">
            @foreach($courses as $course)
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="course-card card h-100">
                        <div class="card-header">
                            <i class="fas fa-graduation-cap fa-2x mb-2"></i>
                            <h5 class="mb-0">{{ $course->name }}</h5>
                            @if($course->short_name) <small class="opacity-75">{{ $course->short_name }}</small> @endif
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-3">
                                <li><i class="fas fa-clock text-gold me-2"></i><strong>Duration:</strong> {{ $course->duration }}</li>
                                @if($course->intake) <li><i class="fas fa-users text-gold me-2"></i><strong>Intake:</strong> {{ $course->intake }} seats</li> @endif
                                @if($course->fees) <li><i class="fas fa-rupee-sign text-gold me-2"></i><strong>Fees:</strong> {{ $course->fees }}</li> @endif
                                @if($course->medium) <li><i class="fas fa-language text-gold me-2"></i><strong>Medium:</strong> {{ $course->medium }}</li> @endif
                            </ul>
                            @if($course->description)
                                <p class="text-muted" style="font-size:.9rem;">{{ Str::limit($course->description, 100) }}</p>
                            @endif
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="d-flex gap-2">
                                <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-outline-danger btn-sm flex-fill">Learn More</a>
                                <a href="{{ route('admissions.index') }}" class="btn btn-sm flex-fill" style="background:var(--secondary);color:#fff">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Faculty Highlights --}}
@if($faculty->count())
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center text-maroon">Our Faculty</h2>
        <p class="text-center text-muted mb-4">Experienced legal educators shaping tomorrow's lawyers</p>
        <div class="row g-4">
            @foreach($faculty as $member)
                <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in">
                    <div class="faculty-card card p-3">
                        @if($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="d-block">
                        @else
                            <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center text-white" style="width:110px;height:110px;background:var(--primary);font-size:2.5rem;font-weight:700;margin-top:20px;">
                                {{ strtoupper(substr($member->name, 0, 1)) }}
                            </div>
                        @endif
                        <div class="p-2">
                            <h6 class="mb-0" style="font-size:.9rem;">{{ $member->name }}</h6>
                            <small class="text-muted">{{ $member->designation }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('faculty.index') }}" class="btn btn-outline-danger">View All Faculty</a>
        </div>
    </div>
</section>
@endif

{{-- News & Events --}}
@if($news->count() || $events->count())
<section class="py-5" style="background:#f8f9fa">
    <div class="container">
        <h2 class="section-title text-center text-maroon">News & Events</h2>
        <div class="row g-4">
            @foreach($news->merge($events)->sortByDesc('published_at')->take(3) as $item)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="card h-100 border-0 shadow-sm">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" style="height:200px;object-fit:cover" alt="{{ $item->title }}">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height:200px;background:linear-gradient(135deg,var(--primary),var(--dark))">
                                <i class="fas fa-{{ $item->type === 'event' ? 'calendar-alt' : 'newspaper' }} fa-3x text-white opacity-50"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <span class="badge mb-2 {{ $item->type === 'event' ? 'bg-warning text-dark' : 'bg-danger' }}">{{ ucfirst($item->type) }}</span>
                            <h6>{{ Str::limit($item->title, 60) }}</h6>
                            <p class="text-muted" style="font-size:.85rem;">{{ Str::limit($item->excerpt ?? strip_tags($item->content), 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('news.show', $item->slug) }}" class="btn btn-sm btn-outline-danger">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('news.index') }}" class="btn btn-outline-danger">View All News & Events</a>
        </div>
    </div>
</section>
@endif

{{-- Gallery Preview --}}
@if($galleries->count())
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center text-maroon">Photo Gallery</h2>
        <div class="row g-3">
            @foreach($galleries->take(6) as $album)
                <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in">
                    <a href="{{ route('gallery.show', $album->slug) }}" class="d-block position-relative rounded overflow-hidden" style="height:150px;">
                        @if($album->cover_image)
                            <img src="{{ asset('storage/' . $album->cover_image) }}" class="w-100 h-100" style="object-fit:cover;" alt="{{ $album->title }}">
                        @else
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background:var(--primary)">
                                <i class="fas fa-images fa-2x text-white"></i>
                            </div>
                        @endif
                        <div class="position-absolute bottom-0 start-0 end-0 p-2" style="background:linear-gradient(transparent,rgba(0,0,0,.7));color:#fff;font-size:.8rem;">
                            {{ Str::limit($album->title, 25) }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('gallery.index') }}" class="btn btn-outline-danger">View Full Gallery</a>
        </div>
    </div>
</section>
@endif

{{-- Testimonials --}}
@if($testimonials->count())
<section class="py-5" style="background:var(--primary)">
    <div class="container">
        <h2 class="section-title text-center text-white">What Our Students Say</h2>
        <div class="row g-4 mt-2">
            @foreach($testimonials as $t)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="card h-100 border-0 p-4" style="background:rgba(255,255,255,.08);">
                        <div class="d-flex gap-1 mb-3" style="color:var(--secondary)">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star{{ $i > $t->rating ? '-o' : '' }}"></i>
                            @endfor
                        </div>
                        <p class="text-white fst-italic">"{{ $t->content }}"</p>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            @if($t->photo)
                                <img src="{{ asset('storage/' . $t->photo) }}" style="width:45px;height:45px;border-radius:50%;object-fit:cover;" alt="{{ $t->name }}">
                            @else
                                <div style="width:45px;height:45px;border-radius:50%;background:var(--secondary);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">{{ strtoupper(substr($t->name,0,1)) }}</div>
                            @endif
                            <div>
                                <strong class="text-white">{{ $t->name }}</strong><br>
                                @if($t->course) <small style="color:var(--secondary)">{{ $t->course }}</small> @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Admission CTA --}}
<section class="py-5" style="background:linear-gradient(135deg,var(--dark) 0%,#2d1b00 100%)">
    <div class="container text-center text-white">
        <h2 style="color:var(--secondary)">Start Your Legal Career Journey Today</h2>
        <p class="lead mt-2 mb-4">Admissions open for {{ date('Y') }}-{{ date('Y')+1 }}. Limited seats available.</p>
        <a href="{{ route('admissions.index') }}" class="btn btn-lg me-3" style="background:var(--secondary);color:#fff">Apply for Admission</a>
        <a href="{{ route('contact') }}" class="btn btn-lg btn-outline-light">Contact Us</a>
    </div>
</section>

@endsection
