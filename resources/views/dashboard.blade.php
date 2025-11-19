@extends('layouts.app-crud')

@section('content')
<div class="container py-5">
    
    <div class="row mb-5">
        <div class="col-12">
            <div class="p-5 text-white rounded-4 shadow-sm d-flex align-items-center position-relative overflow-hidden" 
                 style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);">
                <div class="position-relative z-2">
                    <h1 class="fw-bold display-6">Welcome back, {{ Auth::user()->name }}! 👋</h1>
                    <p class="lead mb-0 opacity-75">Here's what's happening with your blog today.</p>
                </div>
                <i class="bi bi-activity position-absolute text-white opacity-10" 
                   style="font-size: 10rem; right: -2rem; bottom: -3rem; transform: rotate(-15deg);"></i>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow h-100 overflow-hidden rounded-4">
                <div class="card-body p-4 position-relative">
                    <div class="d-flex align-items-center justify-content-between z-2 position-relative">
                        <div>
                            <p class="text-muted fw-semibold mb-1 text-uppercase small">Total Posts</p>
                            <h2 class="fw-bold mb-0 text-primary">{{ $totalPosts }}</h2>
                        </div>
                        <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle p-3">
                            <i class="bi bi-file-text fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow h-100 overflow-hidden rounded-4">
                <div class="card-body p-4 position-relative">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted fw-semibold mb-1 text-uppercase small">Total Users</p>
                            <h2 class="fw-bold mb-0 text-success">{{ $totalUsers }}</h2>
                        </div>
                        <div class="icon-box bg-success bg-opacity-10 text-success rounded-circle p-3">
                            <i class="bi bi-people fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow h-100 overflow-hidden rounded-4">
                <div class="card-body p-4 position-relative">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted fw-semibold mb-1 text-uppercase small">Posts Today</p>
                            <h2 class="fw-bold mb-0 text-info">{{ $postsToday }}</h2>
                        </div>
                        <div class="icon-box bg-info bg-opacity-10 text-info rounded-circle p-3">
                            <i class="bi bi-calendar-check fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow h-100 overflow-hidden rounded-4">
                <div class="card-body p-4 position-relative">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted fw-semibold mb-1 text-uppercase small">This Week</p>
                            <h2 class="fw-bold mb-0 text-warning">{{ $postsThisWeek }}</h2>
                        </div>
                        <div class="icon-box bg-warning bg-opacity-10 text-warning rounded-circle p-3">
                            <i class="bi bi-graph-up fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-8">
            <div class="card border-0 shadow rounded-4 h-100">
                <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Recent Activity</h5>
                    <a href="{{ route('posts.index') }}" class="btn btn-light btn-sm text-primary fw-semibold rounded-pill px-3">
                        View All <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body px-0 pb-2">
                    @if($recentPosts->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="px-4 text-uppercase small text-muted fw-bold">Article</th>
                                        <th class="px-4 text-uppercase small text-muted fw-bold">Date</th>
                                        <th class="px-4 text-end text-uppercase small text-muted fw-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentPosts as $post)
                                    <tr>
                                        <td class="px-4">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary text-white rounded p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                    <i class="bi bi-file-text"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-semibold text-dark">{{ Str::limit($post->title, 40) }}</h6>
                                                    <small class="text-muted">{{ Str::limit($post->content, 30) }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4">
                                            <span class="badge bg-light text-secondary border rounded-pill">
                                                <i class="bi bi-clock me-1"></i>
                                                {{ $post->created_at->diffForHumans() }}
                                            </span>
                                        </td>
                                        <td class="px-4 text-end">
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-light text-secondary rounded-circle" title="View">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-light text-primary rounded-circle ms-1" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" alt="Empty" width="80" class="opacity-50 mb-3">
                            <p class="text-muted">No posts found yet.</p>
                            <a href="{{ route('posts.create') }}" class="btn btn-primary rounded-pill px-4">Create Post</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow rounded-4 text-center mb-4 position-relative overflow-hidden">
                <div class="bg-dark" style="height: 80px;"></div> <div class="card-body px-4 pb-4 pt-0">
                    <div class="position-relative d-inline-block mt-n5 mb-3">
                        <div class="rounded-circle bg-white p-1">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fs-2 fw-bold" 
                                 style="width: 80px; height: 80px;">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1">{{ auth()->user()->name }}</h5>
                    <p class="text-muted small mb-3">{{ auth()->user()->email }}</p>
                    
                    <div class="d-grid gap-2">
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-dark rounded-pill">
                            <i class="bi bi-gear me-2"></i>Settings
                        </a>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow rounded-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Quick Actions</h6>
                    <div class="d-grid gap-2">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg rounded-3 d-flex align-items-center justify-content-center shadow-sm">
                            <i class="bi bi-plus-lg me-2"></i> Create New Post
                        </a>
                        <div class="row g-2">
                            <div class="col-6">
                                <a href="{{ route('posts.index') }}" class="btn btn-light w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3 rounded-3">
                                    <i class="bi bi-list-ul fs-4 mb-1 text-primary"></i>
                                    <span class="small fw-semibold">All Posts</span>
                                </a>
                            </div>
                            @role('admin')
                            <div class="col-6">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-light w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3 rounded-3">
                                    <i class="bi bi-people fs-4 mb-1 text-success"></i>
                                    <span class="small fw-semibold">Users</span>
                                </a>
                            </div>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s;
    }
    .card:hover {
        transform: translateY(-3px);
    }
    .btn-light {
        background-color: #f8f9fa;
        border-color: #f8f9fa;
    }
    .btn-light:hover {
        background-color: #e9ecef;
        border-color: #e9ecef;
    }
</style>
@endsection