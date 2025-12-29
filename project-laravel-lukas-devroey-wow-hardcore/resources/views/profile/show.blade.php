<x-public-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <div class="bg-wow-panel border-2 border-wow-border rounded-lg shadow-2xl overflow-hidden relative">
            <div class="h-2 bg-wow-red w-full"></div>

            <div class="p-8 md:flex items-start gap-8">
                <div class="flex-shrink-0 text-center">
                    <div class="w-40 h-40 mx-auto rounded-full border-4 border-wow-gold shadow-lg overflow-hidden relative bg-black">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->username }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-wow-gold bg-wow-dark">
                                <span class="text-4xl font-wow">?</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex-grow mt-6 md:mt-0">
                    <h1 class="text-4xl font-wow text-wow-gold mb-2 uppercase tracking-wide drop-shadow-md">
                        {{ $user->username ?? $user->name }}
                    </h1>

                    <div class="text-gray-500 text-sm mb-6 flex items-center gap-4">
                        <span>Level {{ $user->id }} Human</span>
                        @if($user->birthday)
                            <span class="text-wow-red">•</span>
                            <span>{{ \Carbon\Carbon::parse($user->birthday)->format('d M Y') }}</span>
                        @endif
                    </div>

                    <div class="bg-black/30 p-6 rounded border border-wow-border">
                        <h3 class="text-wow-gold font-wow text-lg mb-2 border-b border-gray-800 pb-1">Over Mij</h3>
                        <p class="text-gray-400 italic leading-relaxed">
                            {{ $user->about_me ?? 'Deze speler heeft nog geen beschrijving.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
