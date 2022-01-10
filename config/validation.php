<?php

return [
    'rules' => [
        'post_store' => [
            'title'     => 'required|string|max:255',
            'content'   => 'required|string'
        ],
        'post_comment_store' => [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255',
            'comment'   => 'required|string'
        ]
    ]
];
