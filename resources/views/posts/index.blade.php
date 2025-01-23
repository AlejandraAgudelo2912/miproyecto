<h1>Posts</h1>
@foreach($posts as $post)
    <p><a href="/posts/{{ $post->slug }}"> {{ $post->title }}</a></p>
@endforeach
