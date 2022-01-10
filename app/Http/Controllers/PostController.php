<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Http\Resources\PostResource;
use App\Contract\PostContract;

class PostController extends Controller
{
    // TODO: Write documentation
    protected $post;

    // TODO: Write documentation
    public function __construct(PostContract $post)
    {
        $this->middleware('auth')->only(['like']);
        $this->post = $post;
    }

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function like(Post $post)
    {
        $likedPost = $this->post->like($post);

        if($likedPost->getData()->errors) {
            abort(500);
        }

        return redirect()->back();
    }
}
