<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="{{ route('dashboard') }}">
            <i class="bi bi-layers-fill me-2"></i> Laravel CRUD
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('dashboard') ? 'active fw-semibold text-primary' : '' }}" 
                       href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('posts.*') ? 'active fw-semibold text-primary' : '' }}" 
                       href="{{ route('posts.index') }}">
                        Posts
                    </a>
                </li>

                @role('admin')
                <li class="nav-item dropdown">
                    <a class="nav-link px-3 dropdown-toggle {{ request()->routeIs('admin.*') ? 'active fw-semibold text-primary' : '' }}" 
                       href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown">
                        Admin Panel
                    </a>
                    <ul class="dropdown-menu border-0 shadow-sm rounded-3 mt-2">
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('admin.users.index') }}">
                                <i class="bi bi-people me-2 text-secondary"></i> User Management
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('admin.roles.index') }}">
                                <i class="bi bi-shield-lock me-2 text-secondary"></i> Role Management
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('admin.permissions.index') }}">
                                <i class="bi bi-key me-2 text-secondary"></i> Permissions
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole
            </ul>

            <ul class="navbar-nav align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="fw-medium">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3 mt-2 p-2" style="min-width: 200px;">
                        <li>
                            <div class="px-3 py-2">
                                <p class="mb-0 fw-bold text-dark">{{ Auth::user()->name }}</p>
                                <p class="mb-0 small text-muted">{{ Auth::user()->email }}</p>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item py-2 rounded" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person-gear me-2"></i> Profile Settings
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item py-2 rounded text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>