<x-blog-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">{{__('Title')}}</label>
        <input type="text" name="title" id="title" value="{{ $post->title }}" required>

        <label for="body">{{__('Body')}}</label>
        <textarea name="body" id="body" required>{{ $post->body }}</textarea>

        <button type="submit" class="btn btn-success">{{__('Update')}}</button>
    </form>
</x-blog-layout>
