<x-blog-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show a Post') }}
        </h2>
    </x-slot>
    <div>
        <h1>{{ $post->title }}</h1>
        {{ $post->body }}
        {{$post->likes}}
        @if($post->user_id === auth()->id())
            <div>
                <a href="{{ route('posts.edit', $post) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{__('Edit')}}
                </a>
                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        {{__('Delete')}}
                    </button>
                </form>
            </div>
        @endif
    </div>

    <!--commentarios-->
    @auth
        <a href="{{ route('posts.comments.create', $post) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">
            {{ __('Add comment') }}
        </a>
    @else
        <p class="text-red-500">{{ __('You must ') }} <a href="{{ route('login') }}" class="underline">{{ __('login') }}</a> {{ __('to add a comment') }}.</p>
    @endauth


@foreach ($post->comments as $comment)
        <div class="border p-2 mb-2">
            <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->body }}</p>

            <a href="{{ route('posts.comments.show', ['post' => $post, 'comment' => $comment]) }}" class="text-blue-500">{{__('See comment')}}</a>

            @if(auth()->id() === $comment->user_id)
                <a href="{{ route('posts.comments.edit', $comment) }}" class="btn btn-sm btn-warning">{{__('Edit')}}</a>

                <form action="{{ route('posts.comments.destroy', $comment) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{__('Are you sure you want to delete this comment?')}}')">{{__('Delete')}}</button>
                </form>
            @endif
        </div>
    @endforeach

</x-blog-layout>
