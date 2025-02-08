<x-blog-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="title">{{ __('Title') }}</label>
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus/>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="body">{{ __('Body') }}</label>
                <textarea id="body" class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-lg shadow-sm p-2 h-40 resize-y dark:bg-gray-700 dark:text-white"
                          name="body" required>{{ old('body') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="status">{{ __('Status') }}</label>
                <select name="status" id="status" class="block w-full mt-1 p-2 border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white">
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>{{ __('Draft') }}</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>{{ __('Published') }}</option>
                    <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>{{ __('Archived') }}</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{__('Publish date')}}</label>
                <input type="date" name="published_at" value="{{ old('published_at') }}" class="block w-full mt-1 p-2 border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white">
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="visibility">{{ __('Visibility') }}</label>
                <select name="visibility" id="visibility" class="block w-full mt-1 p-2 border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white">
                    <option value="public" {{ old('visibility') == 'public' ? 'selected' : '' }}>{{ __('Public') }}</option>
                    <option value="private" {{ old('visibility') == 'private' ? 'selected' : '' }}>{{ __('Private') }}</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Cover Image') }}</label>
                <input type="file" name="cover_image" accept="image/*" class="block w-full mt-1 border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white p-2">
            </div>

            <div class="flex justify-end mt-6">
                <x-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg">
                    {{ __('Create Post') }}
                </x-button>
            </div>
        </form>
    </div>
</x-blog-layout>
