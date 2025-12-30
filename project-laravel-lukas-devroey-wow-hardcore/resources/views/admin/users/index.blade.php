<x-app-layout>
    <x-slot name="header">
        <h2 class="font-wow text-xl text-wow-gold uppercase">{{ __('Gebruikers Beheer') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="bg-green-900 border border-green-500 text-green-100 p-4 rounded border-l-4 border-green-400">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-900 border border-red-500 text-red-100 p-4 rounded border-l-4 border-red-400">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-wow-panel border border-wow-border p-6 rounded shadow">
                <h3 class="text-wow-gold font-bold text-lg mb-4 uppercase tracking-wide">Nieuwe Gebruiker Toevoegen</h3>
                <form action="{{ route('admin.users.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Naam')" class="text-wow-gold" />
                        <x-text-input id="name" class="block mt-1 w-full bg-black border-gray-700 text-gray-300 focus:border-wow-gold focus:ring-wow-gold" type="text" name="name" required />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-wow-gold" />
                        <x-text-input id="email" class="block mt-1 w-full bg-black border-gray-700 text-gray-300 focus:border-wow-gold focus:ring-wow-gold" type="email" name="email" required />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Wachtwoord')" class="text-wow-gold" />
                        <x-text-input id="password" class="block mt-1 w-full bg-black border-gray-700 text-gray-300 focus:border-wow-gold focus:ring-wow-gold" type="password" name="password" required />
                    </div>

                    <div class="flex items-center gap-3 mb-3 pl-2">
                        <input type="checkbox" name="is_admin" id="is_admin" value="1" class="rounded border-gray-700 bg-black text-wow-gold focus:ring-wow-gold cursor-pointer w-5 h-5">
                        <label for="is_admin" class="text-gray-300 font-bold cursor-pointer">Direct Admin maken?</label>
                    </div>

                    <div class="md:col-span-2 mt-2">
                        <x-primary-button class="bg-wow-gold text-black hover:bg-yellow-600 font-bold w-full md:w-auto justify-center">
                            {{ __('Gebruiker Aanmaken') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>

            <div class="bg-wow-panel border border-wow-border overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full text-left text-gray-400">
                    <thead class="bg-black text-wow-gold uppercase text-xs border-b border-gray-800">
                    <tr>
                        <th class="px-6 py-4 font-bold tracking-wider">Naam</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Email</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Rol</th>
                        <th class="px-6 py-4 text-right font-bold tracking-wider">Acties</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800 bg-black/20">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-900 transition-colors">
                            <td class="px-6 py-4 text-white font-medium">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @if($user->is_admin)
                                    <span class="bg-wow-red text-white text-xs font-bold px-2 py-1 rounded border border-red-900 shadow shadow-red-900/50">ADMIN</span>
                                @else
                                    <span class="bg-gray-800 text-gray-300 text-xs font-bold px-2 py-1 rounded border border-gray-600">SPELER</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin.users.toggle', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-sm font-bold underline decoration-dotted underline-offset-4 hover:no-underline transition {{ $user->is_admin ? 'text-orange-400 hover:text-orange-300' : 'text-green-500 hover:text-green-400' }}">
                                        {{ $user->is_admin ? 'Degradeer tot Speler' : 'Promoveer tot Admin' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if($users->isEmpty())
                    <div class="p-6 text-center text-gray-500 italic">
                        Er zijn nog geen andere gebruikers behalve jijzelf.
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
