<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!--archivos de JS y css-->
        @vite('resources/css/app.css', 'resources/js/app.js')
    </head>
    <body>
        @include('partials.navbar')

        <div class="flex min-h-screen">
            @include('components.sidebar')

            <div class="flex-1">
                <header class="bg-gray-200 dark:bg-gray-800 p-4 ml-64">
                    {{ $header ?? '' }}
                </header>

                <main class="p-6 ml-64">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
