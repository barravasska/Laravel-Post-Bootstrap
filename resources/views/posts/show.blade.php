@extends('layouts.app-crud')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>{{ $post->title }}</h3>
                <div>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">{!! nl2br(e($post->content)) !!}</p>
                <small class="text-muted">
                    Created: {{ $post->created_at->format('M d, Y g:i A') }} |
                    Updated: {{ $post->updated_at->format('M d, Y g:i A') }}
                </small>
            </div>
        </div>
        
        <div class="mt-3">
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-delete">Delete Post</button>
            </form>
        </div>
    </div>
</div>
@endsection