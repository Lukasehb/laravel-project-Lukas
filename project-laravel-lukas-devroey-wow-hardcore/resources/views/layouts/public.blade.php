<!DOCTYPE html>
<html lang="nl">
<head>
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<nav class="bg-white shadow p-4">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('news.index') }}">Nieuws</a>
    <a href="{{ route('faq.index') }}">FAQ</a>

    @auth
        <a href="{{ route('dashboard') }}">Dashboard</a>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endauth
</nav>

<main class="container mx-auto p-4">
    {{ $slot }} </main>

<footer class="text-center p-4">
    &copy; {{ date('Y') }} Schoolproject
</footer>
</body>
</html>
