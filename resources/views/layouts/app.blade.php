<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS - @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; font-family: 'Segoe UI', sans-serif; }
        .sidebar {
            width: 260px; min-height: 100vh; background: linear-gradient(180deg, #1a237e 0%, #283593 100%);
            position: fixed; top: 0; left: 0; z-index: 100; box-shadow: 4px 0 15px rgba(0,0,0,0.2);
        }
        .sidebar-brand {
            padding: 24px 20px 16px; border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar-brand h5 { color: #fff; font-weight: 700; font-size: 1.1rem; margin: 0; }
        .sidebar-brand small { color: rgba(255,255,255,0.6); font-size: 0.75rem; }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.75); padding: 12px 20px; border-radius: 8px;
            margin: 2px 10px; font-size: 0.9rem; transition: all 0.2s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(255,255,255,0.15); color: #fff;
        }
        .sidebar .nav-link i { width: 22px; }
        .sidebar .nav-section { color: rgba(255,255,255,0.4); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; padding: 16px 20px 4px; }
        .main-content { margin-left: 260px; padding: 0; }
        .topbar {
            background: #fff; padding: 14px 28px; box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 99;
        }
        .topbar h6 { margin: 0; font-weight: 600; color: #1a237e; }
        .page-body { padding: 28px; }
        .card { border: none; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); }
        .card-header { border-radius: 12px 12px 0 0 !important; font-weight: 600; }
        .btn-primary { background: #1a237e; border-color: #1a237e; }
        .btn-primary:hover { background: #283593; border-color: #283593; }
        .table thead th { background: #f8f9ff; color: #1a237e; font-weight: 600; border-bottom: 2px solid #e8eaf6; }
        .badge-male { background: #e3f2fd; color: #1565c0; }
        .badge-female { background: #fce4ec; color: #c62828; }
        .stat-card { border-radius: 14px; padding: 24px; color: #fff; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <h5><i class="bi bi-shield-check me-2"></i>SPMS</h5>
        <small>Student Permission System</small>
    </div>
    <nav class="mt-2">
        <div class="nav-section">Main</div>
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
        <div class="nav-section">Management</div>
        <a href="{{ route('students.index') }}" class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
            <i class="bi bi-people me-2"></i> Students
        </a>
        <a href="{{ route('staff.index') }}" class="nav-link {{ request()->routeIs('staff.*') ? 'active' : '' }}">
            <i class="bi bi-person-badge me-2"></i> Staff Members
        </a>
        <a href="{{ route('permissions.index') }}" class="nav-link {{ request()->routeIs('permissions.*') ? 'active' : '' }}">
            <i class="bi bi-key me-2"></i> Permissions
        </a>
        <div class="nav-section">Reports</div>
        <a href="{{ route('reports.index') }}" class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}">
            <i class="bi bi-bar-chart-line me-2"></i> Reports
        </a>
    </nav>
</div>

<div class="main-content">
    <div class="topbar">
        <h6><i class="bi bi-chevron-right me-1"></i>@yield('title', 'Dashboard')</h6>
        <div class="d-flex align-items-center gap-3">
            <span class="text-muted small"><i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-box-arrow-right me-1"></i>Logout</button>
            </form>
        </div>
    </div>
    <div class="page-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
