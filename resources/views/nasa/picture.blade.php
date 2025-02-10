<x-blog-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__('Image of the day')}}
        </h2>
    </x-slot>

    <div class="text-center">
        <h2 class="text-2xl font-bold">{{ $data['title'] }}</h2>
        <img src="{{ $data['url'] }}" alt="{{ $data['title'] }}" class="mx-auto mt-4 rounded-lg shadow-lg">
        <p class="mt-4 text-gray-600">{{ $data['explanation'] }}</p>
    </div>
</x-blog-layout>
