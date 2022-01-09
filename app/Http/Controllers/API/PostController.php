<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * return the Posts.
     *
     */
    public function index()
    {
        return Post::where('published', True)->orderBy('created_at', 'desc')->get();
    }
}
