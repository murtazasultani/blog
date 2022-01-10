<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the Home Page.
     *
     * @return \Inertia\Inertia HomePage
     */
    public function home()
    {
        $posts = Post::where('published', True)->orderBy('created_at', 'desc')->get();
        
        return Inertia::render('Home', [
            'posts' => PostResource::collection($posts)
        ]);
    }

    /**
     * Show the Dashboard Page.
     *
     * @return \Inertia\Inertia Dashboard
     */
    public function dashboard()
    {
        $posts = Post::where('published', True)->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        
        return Inertia::render('Dashboard', [
            'posts' => PostResource::collection($posts)
        ]);
    }
}
