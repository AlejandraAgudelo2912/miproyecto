<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')->get();
        return view('posts.index', compact('posts'));
    }
}
