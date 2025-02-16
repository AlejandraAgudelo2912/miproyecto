<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        return response()->json(Post::publicados()->paginate(10));
    }

    public function show(Post $post)
    {
        return response()->json($post->load(['user', 'category', 'tags', 'comments']));
    }

    public function store(StorePostRequest $request)
    {
        $request->validated();

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'status' => 'draft',
        ]);

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return response()->json(['message' => 'Post creado con éxito', 'post' => $post], 201);
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update($request->only(['title', 'body', 'category_id']));

        return response()->json(['message' => 'Post actualizado', 'post' => $post]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return response()->json(['message' => 'Post eliminado'], 200);
    }
}
