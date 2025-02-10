<aside class="w-64 bg-gray-900 text-white h-screen p-4 fixed top-0 left-0">
    <div class="flex-shrink-0 mr-4">
        <a href="/">
            <x-application-logo class="block h-10 w-auto"/>
        </a>
    </div>
    <hr class="my-4">
    <h2 class="text-xl font-bold mb-4">{{__('Menu')}}</h2>
    <nav>
        <ul class="space-y-3">
            <li><a href="/" class="block hover:text-gray-400">{{__('Home')}}</a></li>
            <li><a href="/posts" class="block hover:text-gray-400">{{__('See all Posts')}}</a></li>
            @auth
                <li><a href="{{ route('posts.create') }}" class="block hover:text-gray-400">{{__('Create Post')}}</a></li>
                <li><a href="{{ route('posts.my') }}" class="block hover:text-gray-400">{{__('My Posts')}}</a></li>
            @endauth
            <li><a href="/categories" class="block hover:text-gray-400">{{__('Categories')}}</a></li>
            <li><a href="/tags" class="block hover:text-gray-400">{{__('Tags')}}</a></li>
            <li><a href="/nasa/picture" class="block hover:text-gray-400">{{__('NASA Picture of the Day')}}</a></li>
            <li><a href="/nasa/asteroids" class="block hover:text-gray-400">{{__('Near Asteroids to Earth')}}</a></li>
            <li><a href="/events" class="block hover:text-gray-400">{{__('Natural and Astronomical Events')}}</a></li>
        </ul>
    </nav>
</aside>
