<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $posts = Post::publicados()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(StorePostRequest $request)
    {
        $this->authorize('create', Post::class);
        $slug = Str::slug($request->title);

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => $slug,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'published_at' => $request->published_at,
            'visibility' => $request->visibility,
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('posts', 'public');
            $post->update(['cover_image' => $path]);
        }

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('posts.index')->with('success', 'Publicación creada correctamente.');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $slug = Str::slug($request->title);

        $post->update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => $slug,
            'body' => $request->body,
            'status' => $request->status,
            'published_at' => $request->published_at,
            'visibility' => $request->visibility,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('cover_image')) {
            if ($post->cover_image) {
                Storage::disk('public')->delete($post->cover_image);
            }

            $path = $request->file('cover_image')->store('posts', 'public');
            $post->update(['cover_image' => $path]);
        }

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('posts.index')->with('success', 'Publicación actualizada correctamente.');
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
    public function myPosts()
    {
        $posts = Post::where('user_id', auth()->id())->get();
        return view('posts.index', compact('posts'));
    }
}
