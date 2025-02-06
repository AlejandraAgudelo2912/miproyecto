<x-blog-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>


    <form method="POST" action="{{ route('posts.store') }}" class="mt-4">
        @csrf
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="title">{{ __('Title') }}</label>

        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />

        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="body">{{ __('Body') }}</label>
            <textarea id="body" class="block mt-1 w-full" name="body" required>{{ old('body') }}</textarea>
        </div>
        <div class="mt-4">
            <label>{{__('Publish date')}}</label>
            <input type="date" name="published_at" value="{{ old('published_at') }}">
        </div>
        <x-button class="ms-4">
            {{ __('Create') }}
        </x-button>
    </form>

</x-blog-layout>
