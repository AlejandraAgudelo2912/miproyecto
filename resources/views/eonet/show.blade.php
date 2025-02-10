<x-blog-layout>
    <x-slot name="header">{{ $event['title'] }}</x-slot>

    <div class="mt-4">
        <p class="text-gray-600">{{__('Date')}}: {{ \Carbon\Carbon::parse($event['geometry'][0]['date'])->format('d-m-Y') }}</p>
        <p class="mt-2">{{ $event['description'] ?? 'No hay descripción disponible.' }}</p>

        @if(isset($event['sources'][0]['url']))
            <p class="mt-4">
                <a href="{{ $event['sources'][0]['url'] }}" target="_blank" class="text-blue-500 underline">
                    {{__('Source')}}
                </a>
            </p>
        @endif
    </div>

    <a href="{{ route('eonet.index') }}" class="mt-4 block text-blue-500">{{__('Back')}}</a>
</x-blog-layout>
