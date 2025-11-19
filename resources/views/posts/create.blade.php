@extends('layouts.app-crud')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Create New Post</h4>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        
                        <!-- Title Input -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   value="{{ old('title') }}"
                                   class="form-control @error('title') is-invalid @enderror" 
                                   placeholder="Enter post title here..."
                                   required>
                            
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Content Textarea -->
                        <div class="mb-4">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" 
                                      id="content" 
                                      rows="5" 
                                      class="form-control @error('content') is-invalid @enderror" 
                                      placeholder="Write your content here..."
                                      required>{{ old('content') }}</textarea>
                            
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Create Post
                            </button>
                            
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection