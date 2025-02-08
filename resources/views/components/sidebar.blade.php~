<aside class="w-64 bg-gray-900 text-white h-screen p-4 fixed top-0 left-0">
    <h2 class="text-xl font-bold mb-4">{{__('Menu')}}</h2>
    <nav>
        <ul class="space-y-3">
            <li><a href="/" class="block hover:text-gray-400">{{__('Home')}}</a></li>
            <li><a href="/posts" class="block hover:text-gray-400">{{__('See all Posts')}}</a></li>
            @auth
                <li><a href="{{ route('posts.create') }}" class="block hover:text-gray-400">{{__('Create Post')}}</a></li>
                <li><a href="{{ route('posts.my') }}" class="block hover:text-gray-400">{{__('My Posts')}}</a></li>
            @endauth
        </ul>
    </nav>
</aside>
