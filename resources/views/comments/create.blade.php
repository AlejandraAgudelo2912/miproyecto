<x-blog-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add a Comment') }}
        </h2>
    </x-slot>
    <form action="{{ route('posts.comments.store', $post) }}" method="POST">
        @csrf
        <div>
            <label for="title">{{ __('Comment Title') }}</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="body">{{ __('Comment Body') }}</label>
            <textarea name="body" id="body" rows="5" required></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">{{ __('Add Comment') }}</button>
    </form>
</x-blog-layout>
