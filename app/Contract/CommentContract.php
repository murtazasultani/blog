<?php

namespace App\Contract;

interface CommentContract
{
    public function store($request, $post, $commentID);
}