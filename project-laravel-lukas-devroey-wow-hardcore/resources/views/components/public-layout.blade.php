<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'WoW Hardcore') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-wow-dark text-gray-300 min-h-screen flex flex-col">

<nav class="bg-black border-b border-wow-red sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <a href="{{ route('home') }}" class="font-wow text-2xl font-bold text-wow-red hover:text-red-500 transition tracking-widest">
                <span class="text-wow-gold">WoW</span> HARDCORE
            </a>

            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-wow-gold hover:text-white transition uppercase text-sm font-bold tracking-wide">Home</a>
                <a href="{{ route('news.index') }}" class="text-gray-400 hover:text-wow-gold transition uppercase text-sm font-bold tracking-wide">Nieuws</a>
                <a href="{{ route('faq.index') }}" class="text-gray-400 hover:text-wow-gold transition uppercase text-sm font-bold tracking-wide">FAQ</a>
            </div>

            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-sm text-wow-gold border border-wow-gold px-3 py-1 rounded hover:bg-wow-gold hover:text-black transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white transition">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<main class="flex-grow container mx-auto p-6 relative">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-64 bg-wow-red/10 blur-3xl -z-10 pointer-events-none"></div>

    {{ $slot }}
</main>

<footer class="bg-black border-t border-gray-800 mt-12">
    <div class="container mx-auto p-8 text-center text-gray-600">
        <p>&copy; {{ date('Y') }} Lukas Devroey. <span class="text-wow-red">Death is permanent.</span></p>
    </div>
</footer>

</body>
</html>
