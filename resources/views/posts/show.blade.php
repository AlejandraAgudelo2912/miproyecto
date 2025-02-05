@extends('layouts.blog')
<div>
    <h1>{{ $post->title }}</h1>
    {{ $post->body }}
    {{$post->likes}}
    @if($post->user_id === auth()->id())
        <div>
            <a href="{{ route('posts.edit', $post) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">

            </a>
            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Eliminar
                </button>
            </form>
        </div>
    @endif
</div>
