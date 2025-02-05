<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--archivos de JS -->
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>
<body>
@include('partials.navbar')
@yield('content')

</body>
</html>
