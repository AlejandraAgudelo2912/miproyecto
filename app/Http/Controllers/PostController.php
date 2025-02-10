<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')->where('visibility', 'public')->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(StorePostRequest $request)
    {
        $slug = Str::slug($request->title);

        $post = Post::create(array_merge(
            $request->validated(),
            [
                'user_id' => auth()->id(),
                'slug' => $slug,
                'category_id' => $request->category_id,
            ]
        ));

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $slug = Str::slug($request->title);

        $post->update(array_merge(
            $request->validated(),
            [
                'slug' => $slug,
                'category_id' => $request->category_id,
            ]
        ));

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
    public function myPosts()
    {
        $posts = Post::where('user_id', auth()->id())->get();
        return view('posts.index', compact('posts'));
    }
}
