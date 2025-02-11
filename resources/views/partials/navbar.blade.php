<script type="text/javascript" src="{{ asset('js/navbar.js') }}"></script>
<nav class="bg-gradient-to-r from-[#6a85b6] via-[#bac8e0] to-[#8ba1c4] text-white py-4 ml-64 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">

            <div class="flex-1 flex items-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <!-- Enlaces a otras páginas -->
                    @role('god')
                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                            {{ __('Gestionar Usuarios') }}
                        </x-nav-link>
                    @endrole

                </div>
            </div>

            <div class="block sm:ml-6">
                <div class="flex space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="text-white hover:bg-indigo-800 px-3 py-2 rounded-md text-sm font-medium">{{__('Login')}}</a>
                        <a href="{{ route('register') }}" class="text-white hover:bg-indigo-800 px-3 py-2 rounded-md text-sm font-medium">{{__('Register')}}</a>
                    @else
                        <div class="relative">
                            <button class="text-white hover:bg-indigo-800 px-3 py-2 rounded-md text-sm font-medium" id="user-menu-button" aria-haspopup="true">
                                {{ auth()->user()->name }}
                            </button>

                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20 hidden" id="user-menu">
                                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{__('Profile')}}</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{__('Log Out')}}</button>
                                </form>
                            </div>

                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>
