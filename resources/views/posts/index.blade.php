@extends('layouts.app-crud')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">All Posts</h3>
                @can('create posts')
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
                @endcan
            </div>
            <div class="card-body">
                @if($posts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Content Preview</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $index => $post)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post->id) }}">
                                            {{ $post->title }}
                                        </a>
                                    </td>
                                    <td>{{ Str::limit($post->content, 50) }}</td>
                                    <td>{{ $post->created_at->format('M d, Y') }}</td>
                                    <td>
                                        @can('view posts')
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">View</a>
                                        @endcan
                                        
                                        @can('edit posts')
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @endcan
                                        
                                        @can('delete posts')
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger btn-delete">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        <p class="mb-0">No posts yet. 
                            @can('create posts')
                                <a href="{{ route('posts.create') }}">Create your first post</a>
                            @endcan
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection