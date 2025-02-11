<x-blog-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>
    <div class="p-6 bg-white border-b border-gray-200">

        <div class="mt-10">
            <h2 class="text-2xl font-bold text-gray-800">{{__('Top posts')}}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                @foreach ($topPosts as $post)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden p-4">
                        <h3 class="font-bold text-xl">{{ $post->title }}</h3>
                        <p class="text-gray-600 mt-2">{{ $post->likes }} {{__('Likes')}}</p>
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-500 mt-4 inline-block">{{__('See more')}}</a>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ $apod['url'] }}" alt="Astronomy Picture" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-xl">{{ $apod['title'] }}</h2>
                    <p class="text-gray-600 mt-2">{{ \Carbon\Carbon::parse($apod['date'])->format('d-m-Y') }}</p>
                    <a href="{{ route('nasa.picture') }}" class="text-blue-500 mt-4 inline-block">{{__('See more')}}</a>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden p-4">
                <h2 class="font-bold text-xl">{{__('Events')}}</h2>
                <ul class="mt-4">
                    @foreach ($events as $event)
                        <li class="mt-2">
                            <strong>{{ $event['title'] }}</strong> - {{ \Carbon\Carbon::parse($event['geometry'][0]['date'])->format('d-m-Y') }}
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('eonet.index') }}" class="text-blue-500 mt-4 inline-block">{{__('All events')}}</a>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden p-4">
                <h2 class="font-bold text-xl">{{__('Asteroids')}}</h2>
                <ul class="mt-4">
                    @foreach ($asteroids as $date => $asteroidList)
                        @foreach ($asteroidList as $asteroid)
                            <li class="mt-2">
                                <strong>{{ $asteroid['name'] }}</strong> - {{__('Diameter')}}: {{ round($asteroid['estimated_diameter']['meters']['estimated_diameter_max'], 2) }}m
                            </li>
                        @endforeach
                    @endforeach
                </ul>
                <a href="{{ route('nasa.asteroids') }}" class="text-blue-500 mt-4 inline-block">{{__('All asteroids')}}</a>
            </div>

        </div>
    </div>
</x-blog-layout>
