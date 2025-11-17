@extends('layout') 
 
@section('content') 
<div class="row justify-content-center"> 
    <div class="col-md-8"> 
        <div class="card"> 
            <div class="card-header"> 
                <h3>Edit Post</h3> 
            </div> 
            <div class="card-body"> 
                <form action="{{ route('posts.update', $post->id) }}" method="POST"> 
                    @csrf 
                    @method('PUT') 
                    <div class="mb-3"> 
                        <label for="title" class="form-label">Title</label> 
                        <input type="text" class="form-control @error('title') is invalid @enderror"  
                               id="title" name="title" value="{{ old('title', $post>title) }}" required> 
                        @error('title') 
                            <div class="invalid-feedback"> 
                                {{ $message }} 
                            </div> 
                        @enderror 
                    </div> 
                     
                    <div class="mb-3"> 
                        <label for="content" class="form-label">Content</label> 
                        <textarea class="form-control @error('content') is-invalid @enderror"  
                                  id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea> 
                        @error('content') 
                            <div class="invalid-feedback"> 
                                {{ $message }} 
                            </div> 
                        @enderror 
                    </div> 
                     
                    <div class="d-grid"> 
                        <button type="submit" class="btn btn-primary">Update Post</button> 
                    </div> 
                </form> 
                 
                <div class="mt-3"> 
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn secondary">Cancel</a> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 