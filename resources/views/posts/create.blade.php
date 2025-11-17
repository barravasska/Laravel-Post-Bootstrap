@extends('layout')

@section('content')
<div class="flex justify-center">
    <div class="w-full md:w-2/3 lg:w-1/2">

        <div class="bg-white shadow-md rounded-lg overflow-hidden">

            <div class="bg-gray-100 p-4 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800">Create New Post</h3>
            </div>

            <div class="p-6">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        
                        <input type="text"
                               class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                                      focus:outline-none focus:ring-blue-500 focus:border-blue-500
                                      @error('title') border-red-500 @enderror"
                               id="title" name="title" value="{{ old('title') }}" required>

                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                        
                        <textarea class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                                       focus:outline-none focus:ring-blue-500 focus:border-blue-500
                                       @error('content') border-red-500 @enderror"
                                  id="content" name="content" rows="5" required>{{ old('content') }}</textarea>

                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                                class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm 
                                       text-sm font-medium rounded-md text-white bg-green-600 
                                       hover:bg-green-700 focus:outline-none focus:ring-2 
                                       focus:ring-offset-2 focus:ring-green-500">
                            Create Post
                        </button>
                    </div>
                </form>

                <div class="mt-4 text-center">
                    <a href="{{ route('posts.index') }}" 
                       class="text-sm text-gray-600 hover:text-gray-900 hover:underline">
                        Back to Posts
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection