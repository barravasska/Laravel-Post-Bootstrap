<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        $totalUsers = User::count();
        $postsToday = Post::whereDate('created_at', Carbon::today())->count();
        $postsThisWeek = Post::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
        
        $recentPosts = Post::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalPosts',
            'totalUsers',
            'postsToday',
            'postsThisWeek',
            'recentPosts'
        ));
    }
}