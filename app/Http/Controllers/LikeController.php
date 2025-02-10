<?php

namespace App\Http\Controllers;

use App\Models\Post;

class LikeController extends Controller
{
    public function toggle(Post $post)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para dar like.');
        }

        if ($user->liked_posts->contains($post->id)) {
            $post->decrement('likes');
            $user->liked_posts()->detach($post->id);
        } else {
            $post->increment('likes');
            $user->liked_posts()->attach($post->id);
        }

        return redirect()->back();
    }
}
