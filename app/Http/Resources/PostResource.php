<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id'                => $this->id,
            'slug'              => $this->slug,
            'views'             => $this->views,
            'title'             => $this->title,
            'content'           => $this->content,
            'published'         => $this->published,
            'publish_date'      => $this->publish_date ? $this->publish_date->format('F d - H:i') : null,
            'user'              => $this->user,
            'created_at'        => $this->created_at->format('F d, Y - H:i'),
            'comments'          => $this->comments,
        ];
    }
}
