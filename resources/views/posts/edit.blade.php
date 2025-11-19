@extends('layouts.app-crud')

@section('content')
<div class="container py-5">
    
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h2 class="fw-bold text-secondary mb-1">Edit Post</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}" class="text-decoration-none">Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning bg-opacity-10 text-warning p-2 rounded me-3">
                            <i class="bi bi-pencil-square fs-4"></i>
                        </div>
                        <h5 class="mb-0 fw-bold text-dark">Update Content</h5>
                    </div>
                </div>
                
                <div class="card-body p-4 pt-0">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold text-secondary small text-uppercase">Title</label>
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   value="{{ old('title', $post->title) }}"
                                   class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                   placeholder="Enter post title"
                                   required>
                            
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label fw-semibold text-secondary small text-uppercase">Content</label>
                            <textarea name="content" 
                                      id="content" 
                                      rows="8" 
                                      class="form-control @error('content') is-invalid @enderror" 
                                      placeholder="Write your content here..."
                                      required>{{ old('content', $post->content) }}</textarea>
                            
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text text-muted mt-2">
                                <i class="bi bi-info-circle me-1"></i> Markdown formatting is supported.
                            </div>
                        </div>

                        <hr class="my-4 text-muted opacity-25">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-light btn-lg px-4 fw-medium text-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg px-4 fw-medium">
                                <i class="bi bi-check-lg me-1"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection