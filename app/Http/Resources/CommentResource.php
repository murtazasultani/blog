<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'name'                  => $this->name,
            'profile_photo_path'    => 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4FF',
            'email'                 => $this->email,
            'comment'               => $this->comment,
            'created_at'            => $this->created_at->format('F jS, Y - H:i'),
            'comments'              => CommentResource::collection($this->comments)
        ];
    }
}
