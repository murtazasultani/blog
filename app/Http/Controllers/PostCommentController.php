<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use Illuminate\Http\Request;
use App\Contract\CommentContract;
use App\Models\Post;
use App\Http\Requests\StorePostCommentRequest;

class PostCommentController extends Controller
{
    // TODO: Write documentation
    protected $comment;

    // TODO: Write documentation
    public function __construct(CommentContract $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostCommentRequest $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostCommentRequest $request, Post $post)
    {
        $comment = $this->comment->store($request, $post);

        if($comment->getData()->errors) {
            abort(500);
        }

        return redirect()->route('posts.show', $post);
    }

}