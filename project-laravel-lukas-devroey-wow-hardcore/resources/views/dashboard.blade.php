<x-app-layout>
    <x-slot name="header">
        <h2 class="font-wow font-bold text-xl text-wow-gold leading-tight tracking-wide uppercase">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-wow-panel border border-wow-border overflow-hidden shadow-xl sm:rounded-lg relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-wow-red to-transparent"></div>

                <div class="p-8 text-gray-300">
                    <h3 class="text-2xl font-wow text-white mb-4">Welkom, kampioen {{ Auth::user()->username ?? Auth::user()->name }}</h3>
                    <p class="mb-6 text-gray-400">{{ __("Je bent succesvol ingelogd. Bereid je voor op je volgende avontuur.") }}</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                        <a href="{{ route('profile.public', Auth::user()) }}" class="block p-4 bg-black border border-gray-800 rounded hover:border-wow-gold transition group">
                            <span class="text-wow-gold font-bold group-hover:text-white">Bekijk mijn profiel &rarr;</span>
                            <p class="text-xs text-gray-500 mt-1">Zie hoe anderen jouw held zien.</p>
                        </a>

                        <a href="{{ route('profile.edit') }}" class="block p-4 bg-black border border-gray-800 rounded hover:border-wow-gold transition group">
                            <span class="text-wow-gold font-bold group-hover:text-white">Bewerk gegevens &rarr;</span>
                            <p class="text-xs text-gray-500 mt-1">Pas je avatar, wachtwoord en info aan.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
