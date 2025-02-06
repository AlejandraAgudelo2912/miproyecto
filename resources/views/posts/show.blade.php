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
    <div class="mt-4 mb-4 p-4 bg-gray-100 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{__('Comments')}}</h2>
        @foreach($post->comments as $comment)
            <div>
                <p>{{$comment->body}}</p>
                <p>{{$comment->user->name}}</p>
                <p>{{$comment->created_at}}</p>
            </div>
        @endforeach
    </div>

</x-blog-layout>
