@extends('layout')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">All Posts</h2>
    
    <a href="{{ route('posts.create') }}"
       class="inline-block py-2 px-4 border border-transparent shadow-sm 
              text-sm font-medium rounded-md text-white bg-blue-600 
              hover:bg-blue-700 focus:outline-none focus:ring-2 
              focus:ring-offset-2 focus:ring-blue-500">
        Create New Post
    </a>
</div>

@if(count($posts) > 0)
    <div class="shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Content
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($posts as $post)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $post->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $post->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ Str::limit($post->content, 50) }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $post->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-cyan-600 hover:text-cyan-900 mr-3">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-600 hover:text-yellow-900 mr-3">Edit</a>
                            
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" 
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-md" role="alert">
        <p>No posts found. 
            <a href="{{ route('posts.create') }}" class="font-bold text-blue-800 hover:underline">
                Create your first post
            </a> 
            to get started.
        </p>
    </div>
@endif
@endsection