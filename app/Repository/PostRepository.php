<?php

namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use App\Contract\PostContract;
use App\Models\PostLike;

class PostRepository implements PostContract
{
   public function like($post)
   {  
      try {

         $postLike = PostLike::create([
            'post_id' => $post->id,
            'user_id' => Auth::id()
         ]);

         return response()->json([
            'data'   => $postLike,
            'errors' => null
         ]);

      } catch (\Exception $exception) {

         report($exception);

         return response()->json([
            'data'      => null,
            'errors'    => 'Something went wrong'
         ]);
      }   
   }
}