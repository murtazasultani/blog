<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;
use App\Http\Resources\PostResource;

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
}
