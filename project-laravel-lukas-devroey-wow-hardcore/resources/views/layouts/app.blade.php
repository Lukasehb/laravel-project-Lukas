<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WoW Hardcore') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-wow-dark text-gray-300">
<div class="min-h-screen">
    @include('layouts.navigation')

    @isset($header)
        <header class="bg-wow-panel border-b border-wow-red shadow-lg">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
