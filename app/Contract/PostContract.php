<?php

namespace App\Contract;

interface PostContract
{
    public function like($post);

    public function store($request);
}