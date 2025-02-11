<?php

namespace App\Http\Controllers;

use App\Models\Post;

class LikeController extends Controller
{
    public function toggle(Post $post)
    {

        $liked = session()->get("liked_posts.{$post->id}", false);

        if ($liked) {
            $post->decrement('likes');
            session()->forget("liked_posts.{$post->id}");
        } else {
            $post->increment('likes');
            session()->put("liked_posts.{$post->id}", true);
        }

        return redirect()->back();
    }
}
