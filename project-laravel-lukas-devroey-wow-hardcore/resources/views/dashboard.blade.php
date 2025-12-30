<x-app-layout>
    <x-slot name="header">
        <h2 class="font-wow text-xl text-wow-gold uppercase">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-wow-panel border border-wow-border overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-300">
                    {{ __("Welkom terug, ") }} <span class="text-wow-gold font-bold">{{ Auth::user()->name }}</span>!
                </div>
            </div>

            @if(Auth::user()->is_admin)
                <h3 class="text-wow-gold font-bold text-lg mb-4 uppercase tracking-widest border-b border-gray-800 pb-2">Admin Tools</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="{{ route('admin.news.index') }}" class="block bg-black border border-wow-border p-6 rounded hover:border-wow-gold hover:bg-gray-900 transition group shadow-lg">
                        <h3 class="text-xl text-wow-gold font-bold mb-2 group-hover:text-white">📰 Nieuws Beheer</h3>
                        <p class="text-gray-400 text-sm">Schrijf updates, bewerk artikelen en beheer de homepage content.</p>
                    </a>

                    <a href="{{ route('admin.faq.index') }}" class="block bg-black border border-wow-border p-6 rounded hover:border-wow-gold hover:bg-gray-900 transition group shadow-lg">
                        <h3 class="text-xl text-wow-gold font-bold mb-2 group-hover:text-white">❓ FAQ Beheer</h3>
                        <p class="text-gray-400 text-sm">Voeg vragen toe, beheer categorieën en beantwoord vragen van spelers.</p>
                    </a>

                    <a href="{{ route('admin.users.index') }}" class="block bg-black border border-wow-border p-6 rounded hover:border-wow-gold hover:bg-gray-900 transition group shadow-lg">
                        <h3 class="text-xl text-wow-gold font-bold mb-2 group-hover:text-white">👥 Gebruikers</h3>
                        <p class="text-gray-400 text-sm">Beheer geregistreerde gebruikers en wijs admin rechten toe.</p>
                    </a>
                </div>
            @else
                <div class="bg-wow-panel p-6 border border-wow-border rounded">
                    <p class="text-gray-400">Succes on your journey to 60</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
