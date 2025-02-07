<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        $comments = $post->comments;
        return view('comments.index', compact('post', 'comments'));
    }
    public function store(StoreCommentRequest $request, Post $post)
    {
        $slug=Str::slug($request->title);
        $request->validated();
        $comment = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'title' => $request->title,
            'slug' => $slug,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Comment created successfully');

    }

    public function edit(Post $post, Comment $comment)
    {

        return view('comments.edit', compact('post', 'comment'));
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

    public function update(UpdateCommentRequest $request, Post $post, Comment $comment)
    {
        $validated = $request->validated();

        $comment->update([
            'body' => $validated['body'],
        ]);

        return redirect()->route('posts.show', $post)
            ->with('success', 'Comment updated successfully');
    }
}
