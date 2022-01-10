<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->increment('views');

        return Inertia::render('Posts/Show', [
            'post' => new PostResource($post->fresh())
        ]);
    }
}
