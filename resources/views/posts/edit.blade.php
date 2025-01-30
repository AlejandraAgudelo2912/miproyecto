<h1>Editar Post</h1>

<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="title">{{__('Title')}}</label>
    <input type="text" name="title" id="title" value="{{ $post->title }}" required>

    <label for="body">{{__('Body')}}</label>
    <textarea name="body" id="body" required>{{ $post->body }}</textarea>

    <button type="submit" class="btn btn-success">Actualizar</button>
</form>
