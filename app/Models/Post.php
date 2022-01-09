<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['comments'];

    /**
     * Get the postComments.
     */
    public function comments()
    {
        return $this->hasMany(PostComment::class, 'post_id');
    }
}
