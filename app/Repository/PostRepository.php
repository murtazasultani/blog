<?php

namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use App\Contract\PostContract;
use App\Models\PostLike;
use Illuminate\Support\Str;
use App\Models\Post;

class PostRepository implements PostContract
{
   public function store($request)
   {
      try {

         $post = Post::create($this->mapPostStoreRequest($request));

         return response()->json([
            'data'   => $post,
            'errors' => null
         ]);

      } catch (\Exception $exception) {

         report($exception);

         return response()->json([
            'data'   => null,
            'errors' => 'Something went wrong'
         ]);
      }
        
   }

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

   /**
      * Map Item store request
      *
      * @param $request
      * @return array
      */
   private function mapPostStoreRequest($request)
   {
      return [
         'slug'         => Str::slug($request->title),
         'user_id'      => Auth::id(),
         'title'        => $request->title,
         'content'      => $request->content
      ];
   }
}