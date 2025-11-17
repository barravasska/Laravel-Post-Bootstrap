@extends('layout')

@section('content')
<div class="flex justify-center">
    <div class="w-full md:w-2/3 lg:w-1/2">
        
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h3>
                <div class="space-x-2">
                    <a href="{{ route('posts.edit', $post->id) }}" 
                       class="inline-block py-1 px-3 text-xs font-medium rounded-md text-gray-900 bg-yellow-400 hover:bg-yellow-500">
                        Edit
                    </a>
                    <a href="{{ route('posts.index') }}" 
                       class="inline-block py-1 px-3 text-xs font-medium rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300">
                        Back
                    </a>
                </div>
            </div>

            <div class="p-6">
                <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $post->content }}</p>

                <small class="block mt-6 pt-4 border-t border-gray-100 text-sm text-gray-500">
                    Created: {{ $post->created_at->format('M d, Y g:i A') }} | 
                    Updated: {{ $post->updated_at->format('M d, Y g:i A') }}
                </small>
            </div>
        </div>
        
        <div class="mt-4">
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">