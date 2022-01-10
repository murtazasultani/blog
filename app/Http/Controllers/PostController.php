<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Http\Resources\PostResource;
use App\Contract\PostContract;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    // TODO: Write documentation
    protected $post;

    // TODO: Write documentation
    public function __construct(PostContract $post)
    {
        $this->middleware('auth')->only(['like', 'create', 'store']);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = $this->post->store($request);

        if($post->getData()->errors) {
            abort(500);
        }

        return redirect()->route('posts.show', $post->getData()->data->id);
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
