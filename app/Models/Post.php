<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['comments', 'likes', 'user'];

    /**
     * Get the postComments.
     */
    public function comments()
    {
        return $this->hasMany(PostComment::class, 'post_id');
    }

     /**
     * Get the postLike.
     */
    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }

    /**
     * The user that owns the Post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
