<?php

namespace App\Repository;

use App\Models\PostComment;
use Illuminate\Http\Response;
use App\Contract\CommentContract;

use Illuminate\Support\Facades\Auth;

class CommentRepository implements CommentContract
{

   public function store($request, $post, $commentID)
   {
        
      try {

         $postComment = PostComment::create($this->mapCommentStoreRequest($request, $post, $commentID));

         return response()->json([
            'data'   => $postComment,
            'errors'  => null
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
    * Map Post Comment store request
    *
    * @param $request
    * @return array
    */
   private function mapCommentStoreRequest($request, $post, $commentID)
   {
      return [
         'post_id'      => $post->id,
         'comment_id'   => $commentID,
         'name'         => $request->name ? $request->name : Auth::user()->name,
         'email'        => $request->email ? $request->email : Auth::user()->email,
         'comment'      => $request->comment
      ];
   }

}