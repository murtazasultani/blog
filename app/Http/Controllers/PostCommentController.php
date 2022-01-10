<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use Illuminate\Http\Request;
use App\Contract\CommentContract;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

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
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        Validator::make([
            'name'  => $request->name,
            'email'  => $request->email,
            'comment'  => $request->comment,
        ], [
            'name'  => ['required', 'string', 'max:255'],
            'email'  => ['required', 'string', 'email', 'max:255'],
            'comment'  => ['required','string'],
        ])->validateWithBag('addComment');

        $comment = $this->comment->store($request, $post);

        if($comment->getData()->errors) {
            abort(500);
        }

        return redirect()->route('posts.show', $post);
    }

}