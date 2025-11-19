<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel CRUD') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9; /* Soft Gray Background */
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Modern Navbar */
        .navbar {
            background-color: #ffffff !important;
            box-shadow: 0 2px 15px rgba(0,0,0,0.04);
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
        }
        .navbar-brand {
            font-weight: 700;
            color: #0d6efd !important; /* Primary Blue */
            font-size: 1.35rem;
            letter-spacing: -0.5px;
        }
        .nav-link {
            font-weight: 500;
            color: #555 !important;
            transition: all 0.2s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: #0d6efd !important;
        }
        .nav-link.active {
            background-color: rgba(13, 110, 253, 0.05);
            border-radius: 8px;
        }
        
        /* Dropdown Menu */
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border-radius: 12px;
            padding: 10px;
        }
        .dropdown-item {
            border-radius: 8px;
            padding: 8px 15px;
            font-size: 0.95rem;
        }
        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #0d6efd;
        }

        /* Content Area */
        main {
            flex: 1; /* Agar footer turun ke bawah */
            padding-bottom: 3rem;
        }

        /* Footer */
        footer {
            background-color: #ffffff;
            border-top: 1px solid #eaeaea;
            padding: 1.5rem 0;
            font-size: 0.9rem;
            color: #888;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
                <i class="bi bi-layers-fill me-2"></i> Laravel CRUD
            </a>
            
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto ms-lg-3">
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-grid-1x2 me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('posts.*') ? 'active' : '' }}" href="{{ route('posts.index') }}">
                            <i class="bi bi-file-text me-1"></i> Posts
                        </a>
                    </li>
                    
                    @role('admin')
                    <li class="nav-item dropdown ms-lg-2">
                        <a class="nav-link dropdown-toggle px-3 {{ request()->routeIs('admin.*') ? 'active' : '' }}" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-shield-check me-1"></i> Admin
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm animate slideIn">
                            <li><h6 class="dropdown-header text-uppercase small fw-bold text-muted">Management</h6></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                    <i class="bi bi-people me-2 text-primary"></i> Users
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.roles.index') }}">
                                    <i class="bi bi-person-badge me-2 text-warning"></i> Roles
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.permissions.index') }}">
                                    <i class="bi bi-key me-2 text-success"></i> Permissions
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                </ul>
                
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center shadow-sm me-2" style="width: 35px; height: 35px; font-weight: 600;">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="fw-medium text-dark">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <div class="px-3 py-2">
                                        <div class="fw-bold text-dark">{{ Auth::user()->name }}</div>
                                        <div class="small text-muted">{{ Auth::user()->email }}</div>
                                    </div>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-person-gear me-2"></i> Profile Settings
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-primary px-4 rounded-pill me-2" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary px-4 rounded-pill" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @if(!request()->routeIs('dashboard'))
    <div class="bg-white border-bottom mb-4 py-4 shadow-sm">
        <div class="container">
            <h2 class="fw-bold mb-0 text-dark">
                @yield('header', 'Laravel CRUD Learning') </h2>
            <p class="text-muted mb-0 small">Application Management System</p>
        </div>
    </div>
    @endif

    <div class="container mt-4">
        <main>
            @yield('content')
        </main>
    </div>

    <footer class="mt-auto">
        <div class="container text-center">
            <p class="mb-0">
                &copy; {{ date('Y') }} <span class="fw-bold text-dark">Laravel CRUD Learning</span>. 
                <span class="d-none d-sm-inline">Crafted for educational purposes.</span>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: @json(session('success')),
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });
    </script>
    @endif
    
    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: @json(session('error')),
        });
    </script>
    @endif

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const form = event.target.closest('form');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
    </script>
</body>
</html>