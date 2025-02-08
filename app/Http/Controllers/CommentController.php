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
        $comments = $post->comments()->whereNull('parent_id')->with('children')->get();
        return view('comments.index', compact('post', 'comments'));
    }
    public function store(StoreCommentRequest $request, Post $post)
    {
        $slug = Str::slug($request->title);

        $parent_id = $request->input('parent_id');

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'title' => $request->title,
            'slug' => $slug,
            'body' => $request->body,
            'parent_id' => $parent_id,
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

    public function create(Post $post, Comment $parent_id)
    {
        return view('comments.create', compact('post', 'parent_id'));
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

    public function reply(StoreCommentRequest $request, Post $post, Comment $comment)
    {
        $slug = Str::slug($request->title);

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'title' => $request->title,
            'slug' => $slug,
            'body' => $request->body,
            'parent_id' => $comment->id,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Respuesta agregada correctamente');
    }

    public function replied(Post $post, Comment $comment)
    {
        return view('replies_to_comments.create', compact('post', 'comment'));
    }
}
