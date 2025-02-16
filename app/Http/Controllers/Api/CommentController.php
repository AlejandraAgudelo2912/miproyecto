<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'comments' => Comment::all()
        ], Response::HTTP_OK);
    }

    public function show(Comment $comment)
    {
        return response()->json([
            'success' => true,
            'comment' => $comment
        ], Response::HTTP_OK);
    }

    public function store(StoreCommentRequest $request)
    {
        $request->validated();

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
            'body' => $request->body
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comentario creado correctamente.',
            'comment' => $comment
        ], Response::HTTP_CREATED);
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        if ($comment->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'No tienes permiso para editar este comentario.'
            ], Response::HTTP_FORBIDDEN);
        }

        $request->validated();

        $comment->update([
            'body' => $request->body
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comentario actualizado correctamente.',
            'comment' => $comment
        ], Response::HTTP_OK);
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== auth()->id() && !auth()->user()->hasRole('admin')) {
            return response()->json([
                'success' => false,
                'message' => 'No tienes permiso para eliminar este comentario.'
            ], Response::HTTP_FORBIDDEN);
        }

        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comentario eliminado correctamente.'
        ], Response::HTTP_OK);
    }
}
