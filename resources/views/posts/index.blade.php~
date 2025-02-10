<x-blog-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    @foreach($posts as $post)
        <p><a href="/posts/{{ $post->slug }}"> {{ $post->title }}</a></p>
    @endforeach

    @auth
        <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{__('Create Post')}}
        </a>
        <a href="{{ route('posts.my') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{__('My Posts')}}
        </a>

    @endauth
</x-blog-layout>
