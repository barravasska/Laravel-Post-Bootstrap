<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        // Option 1: Semua posts (untuk semua user)
        $posts = Post::latest()->get();
        
        // Option 2: Hanya posts milik user yang login
        // $posts = Post::where('user_id', Auth::id())->latest()->get();
        
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Tambahkan user_id (jika ada kolom user_id di table posts)
        // $validated['user_id'] = Auth::id();

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update($validated);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post berhasil diupdate!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
    }
}