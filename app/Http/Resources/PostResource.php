<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Post */
class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'status' => $this->status,
            'published_at' => $this->published_at,
            'visibility' => $this->visibility,
            'likes' => $this->likes,
            'cover_image' => $this->cover_image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'category_id' => $this->category_id,
            'comments_count' => $this->comments_count,
            'liked_by_users_count' => $this->liked_by_users_count,
            'tags_count' => $this->tags_count,
            'user_id' => $this->user_id,
        ];
    }
}
