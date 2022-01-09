<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;

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
            'posts' => $posts,
        ]);
    }
}
