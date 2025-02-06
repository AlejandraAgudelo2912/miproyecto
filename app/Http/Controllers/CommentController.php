<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        $comments = $post->comments;
        return view('comments.index', compact('post', 'comments'));
    }
    public function store(StoreCommentRequest $request, Post $post)
    {
        $request->validated();
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'body' => $request->body,
        ]);
        return redirect()->route('posts.show', $post)->with('success', 'Comment created successfully');

    }

    public function edit(UpdateCommentRequest $request, Comment $comment)
    {
        $request->validated();
        $comment->update([
            'body' => $request->body,
        ]);
        return redirect()->route('posts.show', $comment->post)->with('success', 'Comment updated successfully');
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.show', $post)->with('success', 'Comment deleted successfully');
    }

    public function show(Post $post, Comment $comment )
    {
        return view('comments.show', compact('post','comment'));
    }

    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

}
