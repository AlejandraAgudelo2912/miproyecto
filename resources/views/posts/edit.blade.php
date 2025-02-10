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

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Etiquetas</label>
            <select name="tags[]" multiple class="block w-full mt-1 p-2 border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">{{__('Update')}}</button>
    </form>
</x-blog-layout>
