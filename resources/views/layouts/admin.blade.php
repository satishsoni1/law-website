<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') | KTSPM Law College</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root { --primary: #162450; --secondary: #C8973A; --sidebar-width: 260px; }
        body { background: #f0f2f5; font-family: 'Inter', sans-serif; }
        .sidebar { width: var(--sidebar-width); background: #1a1a2e; min-height: 100vh; position: fixed; top: 0; left: 0; z-index: 1000; transition: .3s; overflow-y: auto; }
        .sidebar-brand { background: var(--primary); padding: 18px 20px; }
        .sidebar-brand h6 { color: #fff; margin: 0; font-size: .9rem; line-height: 1.4; }
        .sidebar .nav-link { color: rgba(255,255,255,.7); padding: 10px 20px; border-radius: 4px; margin: 2px 10px; font-size: .87rem; transition: .2s; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: rgba(255,255,255,.1); color: #fff; }
        .sidebar .nav-link i { width: 22px; }
        .sidebar-section { color: rgba(255,255,255,.35); font-size: .7rem; letter-spacing: 1px; text-transform: uppercase; padding: 12px 20px 4px; }
        .main-content { margin-left: var(--sidebar-width); min-height: 100vh; }
        .topbar { background: #fff; padding: 12px 24px; border-bottom: 1px solid #e9ecef; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 100; }
        .content-area { padding: 24px; }
        .stat-card { border: none; border-radius: 12px; box-shadow: 0 2px 15px rgba(0,0,0,.06); }
        .table thead th { background: var(--primary); color: #fff; font-weight: 500; border: none; }
        .badge-pending { background: #ffc107; color: #000; }
        .badge-approved { background: #198754; }
        .badge-rejected { background: #dc3545; }
        .badge-under_review { background: #0dcaf0; color: #000; }
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height:44px;width:44px;object-fit:contain;border-radius:50%;background:#0a1228;padding:2px;">
                <h6 style="margin:0;line-height:1.4;">KTSPM Law College<br><small style="opacity:.7;font-size:.75rem">Admin Panel</small></h6>
            </div>
        </div>

        <div class="pt-2">
            <div class="sidebar-section">Main</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>

            <div class="sidebar-section">Academic</div>
            <a href="{{ route('admin.courses.index') }}" class="nav-link {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
                <i class="fas fa-graduation-cap"></i> Courses
            </a>
            <a href="{{ route('admin.faculty.index') }}" class="nav-link {{ request()->routeIs('admin.faculty.*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher"></i> Faculty
            </a>

            <div class="sidebar-section">Admissions</div>
            <a href="{{ route('admin.admissions.index') }}" class="nav-link {{ request()->routeIs('admin.admissions.*') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i> Applications
                @php $pending = \App\Models\Admission::where('status','pending')->count(); @endphp
                @if($pending) <span class="badge bg-warning text-dark ms-1">{{ $pending }}</span> @endif
            </a>

            <div class="sidebar-section">Content</div>
            <a href="{{ route('admin.notices.index') }}" class="nav-link {{ request()->routeIs('admin.notices.*') ? 'active' : '' }}">
                <i class="fas fa-bell"></i> Notices
            </a>
            <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i> News & Events
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i> Gallery
            </a>
            <a href="{{ route('admin.downloads.index') }}" class="nav-link {{ request()->routeIs('admin.downloads.*') ? 'active' : '' }}">
                <i class="fas fa-download"></i> Downloads
            </a>

            <div class="sidebar-section">Communications</div>
            <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Messages
                @php $unread = \App\Models\ContactMessage::where('is_read',false)->count(); @endphp
                @if($unread) <span class="badge bg-danger ms-1">{{ $unread }}</span> @endif
            </a>

            <div class="sidebar-section">System</div>
            <a href="{{ route('admin.seo.index') }}" class="nav-link {{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
                <i class="fas fa-search"></i> SEO
            </a>
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fas fa-users-cog"></i> Users
            </a>
            <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fas fa-cog"></i> Settings
            </a>
            <a href="{{ route('admin.settings.sliders') }}" class="nav-link {{ request()->routeIs('admin.settings.sliders*') ? 'active' : '' }}">
                <i class="fas fa-images"></i> Sliders
            </a>
            <a href="{{ route('admin.activity-logs') }}" class="nav-link {{ request()->routeIs('admin.activity-logs') ? 'active' : '' }}">
                <i class="fas fa-history"></i> Activity Logs
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-outline-secondary d-md-none" onclick="document.getElementById('sidebar').classList.toggle('show')">
                    <i class="fas fa-bars"></i>
                </button>
                <h6 class="mb-0">@yield('page-title', 'Dashboard')</h6>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-external-link-alt me-1"></i>View Site
                </a>
                <div class="dropdown">
                    <button class="btn btn-sm d-flex align-items-center gap-2" data-bs-toggle="dropdown" style="background:var(--primary);color:#fff">
                        <i class="fas fa-user-circle"></i> {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><h6 class="dropdown-header">{{ auth()->user()->email }}</h6></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content-area">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
