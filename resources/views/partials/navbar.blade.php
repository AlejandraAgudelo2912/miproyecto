<nav class="bg-gray-800 text-white py-4">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <x-application-logo class="block h-12 w-auto" />

            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden"></div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <!--enlaces a las demas paginas-->
                    <a href="/posts" class="text-2xl font-bold">{{__('See all Posts')}}</a>
                </div>
                <div class="block sm:ml-6">
                    <div class="flex space-x-4">
                        @guest
                            <a href="{{ route('login') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                            <a href="{{ route('register') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                        @else
                            <a href="{{ route('profile.show') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Profile</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
