<x-blog-layout>
    <x-slot name="header">{{__('Events')}}</x-slot>

    <ul class="mt-4 space-y-4">
        @foreach ($events['events'] as $event)
            <li class="border-b pb-4">
                <h3 class="font-bold text-xl">{{ $event['title'] }}</h3>
                <p class="text-gray-600">{{__('Date')}}: {{ \Carbon\Carbon::parse($event['geometry'][0]['date'])->format('d-m-Y') }}</p>
                <p class="mt-2">{{ $event['description'] ?? 'No hay descripción disponible.' }}</p>
                <a href="{{ route('eonet.show', $event['id']) }}" class="text-blue-500">{{__('See more')}}</a>
            </li>
        @endforeach
    </ul>
</x-blog-layout>

