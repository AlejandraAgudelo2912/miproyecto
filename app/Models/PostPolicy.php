<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostPolicy extends Model
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Post $post)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->hasRole('admin') || $user->hasRole('editor') || $user->hasRole('god');
    }


    public function updatePost(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasRole('admin');
    }

    public function deletePost(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasRole('admin');
    }
}
