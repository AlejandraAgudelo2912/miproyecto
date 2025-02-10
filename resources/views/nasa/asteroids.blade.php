<x-blog-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__('Near Earth Objects')}}
        </h2>
    </x-slot>

    <ul class="mt-4 space-y-4">
        @foreach ($data['near_earth_objects'] as $date => $asteroids)
            <li class="border-b pb-4">
                <h3 class="font-bold text-xl">{{__('Date')}}: {{ $date }}</h3>
                <ul class="mt-2">
                    @foreach ($asteroids as $asteroid)
                        <li class="bg-gray-100 p-4 rounded shadow">
                            <strong>{{ $asteroid['name'] }}</strong> - {{__('Diameter')}}: {{ $asteroid['estimated_diameter']['meters']['estimated_diameter_max'] }}m
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</x-blog-layout>

