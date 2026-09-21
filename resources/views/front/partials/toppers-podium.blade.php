{{-- Podium for one batch: expects $batch (see config/toppers.php) --}}
@once
@push('styles')
<style>
    .topper-podium { display:grid; grid-template-columns:repeat(3,1fr); gap:24px; align-items:end; max-width:960px; margin:0 auto; }
    .topper-card {
        position:relative; background:#fff; border-radius:22px; text-align:center;
        padding:64px 20px 0; box-shadow:0 14px 40px rgba(18,12,9,.12);
        transition:transform .3s ease, box-shadow .3s ease;
    }
    .topper-card:hover { transform:translateY(-8px); box-shadow:0 22px 50px rgba(18,12,9,.2); }
    .topper-card.rank-1 { --medal:#D99A1E; padding-top:78px; background:linear-gradient(180deg,#FFF3D1 0%,#fff 65%); box-shadow:0 22px 55px rgba(217,154,30,.35); }
    .topper-card.rank-2 { --medal:#8E97A3; }
    .topper-card.rank-3 { --medal:#B0763B; }
    .topper-card .crown { position:absolute; top:-30px; left:50%; transform:translateX(-50%); font-size:1.9rem; color:#D99A1E; filter:drop-shadow(0 3px 6px rgba(217,154,30,.5)); }
    .topper-avatar {
        position:absolute; top:-38px; left:50%; transform:translateX(-50%);
        width:80px; height:80px; border-radius:50%; display:flex; align-items:center; justify-content:center;
        font-family:'Fraunces',serif; font-size:1.7rem; font-weight:700; color:#fff; letter-spacing:1px;
        background:linear-gradient(135deg, var(--medal), color-mix(in srgb, var(--medal) 55%, #000));
        border:4px solid #fff; box-shadow:0 8px 22px rgba(0,0,0,.22);
    }
    .topper-card.rank-1 .topper-avatar { width:96px; height:96px; top:-30px; font-size:2rem; }
    .topper-card.rank-1 .crown { top:-62px; }
    .topper-tag { display:inline-block; font-size:.72rem; font-weight:700; letter-spacing:1.6px; text-transform:uppercase; color:var(--medal); margin-bottom:10px; }
    .topper-tag i { margin-right:5px; }
    .topper-step {
        margin:26px -20px 0; padding:14px 10px 16px; color:#fff; border-radius:0 0 22px 22px;
        background:linear-gradient(135deg, var(--medal), color-mix(in srgb, var(--medal) 60%, #000));
        display:flex; align-items:center; justify-content:center; gap:6px; min-height:70px;
    }
    .topper-card.rank-1 .topper-step { min-height:110px; }
    .topper-card.rank-3 .topper-step { min-height:56px; }
    .topper-step b { font-family:'Fraunces',serif; font-size:2.6rem; line-height:1; }
    .topper-card.rank-1 .topper-step b { font-size:3.4rem; }
    .topper-step sup { font-size:.9rem; font-weight:700; margin-right:8px; }
    .topper-step span { font-size:.72rem; letter-spacing:2px; text-transform:uppercase; font-weight:700; opacity:.9; }
    .topper-name { font-family:'Fraunces',serif; font-size:1.15rem; font-weight:700; color:var(--primary); line-height:1.3; margin:0 0 6px; }
    .topper-class { font-size:.82rem; color:#8a8378; margin:0; }
    .topper-card.rank-1 .topper-name { font-size:1.3rem; }
    @media (min-width:768px) {
        .topper-card.rank-1 { order:2; } .topper-card.rank-2 { order:1; } .topper-card.rank-3 { order:3; }
    }
    @media (max-width:767.98px) {
        .topper-podium { grid-template-columns:1fr; gap:56px; padding-top:40px; }
        .topper-card.rank-1 .crown { top:-58px; }
    }
</style>
@endpush
@endonce

@php
    $medalNames = [1 => 'Gold', 2 => 'Silver', 3 => 'Bronze'];
    $suffixes   = [1 => 'st', 2 => 'nd', 3 => 'rd'];
@endphp
<div class="topper-podium">
    @foreach($batch['students'] as $i => $student)
        @php
            $rank  = $i + 1;
            $name  = \Illuminate\Support\Str::title(mb_strtolower($student));
            $parts = preg_split('/\s+/', $name);
            $init  = mb_substr($parts[0], 0, 1) . mb_substr($parts[1] ?? '', 0, 1);
        @endphp
        <div class="topper-card rank-{{ $rank }}" data-aos="fade-up" data-aos-delay="{{ [1 => 0, 2 => 120, 3 => 240][$rank] }}">
            @if($rank === 1)<i class="fas fa-crown crown"></i>@endif
            <div class="topper-avatar">{{ strtoupper($init) }}</div>
            <span class="topper-tag"><i class="fas fa-medal"></i>{{ $medalNames[$rank] }}</span>
            <h3 class="topper-name">{{ $name }}</h3>
            <p class="topper-class">{{ $batch['label'] }} LL.B. &middot; Batch {{ $batch['admitted'] }}</p>
            <div class="topper-step"><b>{{ $rank }}</b><sup>{{ $suffixes[$rank] }}</sup><span>Rank</span></div>
        </div>
    @endforeach
</div>
