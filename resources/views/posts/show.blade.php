@extends('layouts.app-crud')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-secondary">Post Details</h4>
                        
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-left"></i> Back to Posts
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    
                    <div class="mb-4">
                        <h1 class="display-6 fw-bold text-dark mb-2">{{ $post->title }}</h1>
                        <div class="text-muted small">
                            <span class="me-3">
                                <i class="bi bi-calendar-event"></i> Created: {{ $post->created_at->format('M d, Y g:i A') }}
                            </span>
                            <span>
                                <i class="bi bi-pencil-square"></i> Updated: {{ $post->updated_at->format('M d, Y g:i A') }}
                            </span>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-5">
                        <div class="fs-5 text-break">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        @can('edit posts')
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning text-dark">
                                <i class="bi bi-pencil"></i> Edit Post
                            </a>
                        @endcan
                        
                        @can('delete posts')
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete">
                                    <i class="bi bi-trash"></i> Delete Post
                                </button>
                            </form>
                        @endcan
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection