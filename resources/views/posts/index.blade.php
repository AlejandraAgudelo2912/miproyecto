<h1>Posts</h1>
@foreach($posts as $post)
    <p><a href="/posts/{{ $post->slug }}"> {{ $post->title }}</a></p>
@endforeach

@auth
    <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Crear Nuevo Post
    </a>
    <a href="{{ route('posts.my') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Mis Posts
    </a>

@endauth
