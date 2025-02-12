<div class="flex items-center mt-4">
    <button wire:click="toggleLike" class="flex items-center focus:outline-none">
        @if($liked)
            <x-heart-like class="w-6 h-6 text-red-500" />
        @else
            <x-heart-unlike class="w-6 h-6 text-gray-500" />
        @endif
        <span class="ml-2 text-gray-600 dark:text-gray-400">{{ $likes }} {{ __('Likes') }}</span>
    </button>
</div>
