<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Yamaha Motor Indonesia')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 2px 10px;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }
        .main-content {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .card {
            border: none;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .yamaha-blue {
            background-color: #1e3c72;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0">
                <div class="sidebar">
                    <div class="p-3 text-center border-bottom border-light">
                        <h5 class="text-white mb-0">
                            <i class="fas fa-motorcycle me-2"></i>
                            Admin Panel
                        </h5>
                        <small class="text-light">Yamaha Motor</small>
                    </div>
                    
                    <nav class="nav flex-column py-3">
                        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
                           href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                        <a class="nav-link {{ request()->routeIs('admin.motors.*') ? 'active' : '' }}" 
                           href="{{ route('admin.motors.index') }}">
                            <i class="fas fa-motorcycle me-2"></i>Kelola Motor
                        </a>
                        <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}" 
                           href="{{ route('admin.testimonials.index') }}">
                            <i class="fas fa-comments me-2"></i>Testimonial
                        </a>
                        <a class="nav-link {{ request()->routeIs('admin.company.*') ? 'active' : '' }}" 
                           href="{{ route('admin.company.index') }}">
                            <i class="fas fa-building me-2"></i>Info Dealer
                        </a>
                        <hr class="border-light mx-3">
                        <a class="nav-link" href="{{ route('home') }}" target="_blank">
                            <i class="fas fa-external-link-alt me-2"></i>Lihat Website
                        </a>
                        <form action="{{ route('admin.logout') }}" method="POST" class="mx-3 mt-2">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm w-100">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <div class="main-content p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h2 class="mb-0">@yield('page-title', 'Dashboard')</h2>
                            <small class="text-muted">@yield('page-description', 'Kelola website dealer Yamaha')</small>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">
                                <i class="fas fa-user me-1"></i>{{ auth()->user()->name ?? 'Admin' }}
                            </small>
                        </div>
                    </div>

                    <!-- Alerts -->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <!-- Content -->
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>