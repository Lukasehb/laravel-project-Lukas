<x-public-layout>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-wow text-wow-gold uppercase tracking-widest drop-shadow-md border-b-2 border-wow-red inline-block pb-2">
                Het Laatste Nieuws
            </h1>
            <p class="mt-4 text-gray-400 italic">Blijf op de hoogte van de laatste updates in Azeroth.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($newsItems as $item)
                <div class="bg-wow-panel border border-wow-border rounded-lg shadow-lg overflow-hidden group hover:border-wow-gold transition-colors duration-300">
                    <div class="h-48 overflow-hidden bg-black relative border-b border-wow-border">
                        @if($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}"
                                 alt="{{ $item->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-600 font-wow">
                                <span class="text-4xl">WoW</span>
                            </div>
                        @endif
                        <div class="absolute top-0 right-0 bg-wow-red text-white text-xs font-bold px-3 py-1 uppercase tracking-wider">
                            {{ $item->published_at->format('d M Y') }}
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-wow text-wow-gold mb-3 group-hover:text-white transition-colors">
                            {{ $item->title }}
                        </h3>
                        <p class="text-gray-400 text-sm mb-4 line-clamp-3">
                            {{ Str::limit($item->content, 120) }}
                        </p>
                        <a href="{{ route('news.show', $item) }}" class="text-wow-red hover:text-white font-bold text-sm uppercase tracking-wide transition-colors">
                            Lees Verder &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @if($newsItems->isEmpty())
            <div class="text-center py-12 text-gray-500">
                <p>Er is nog geen nieuws gepubliceerd.</p>
            </div>
        @endif
    </div>
    <div class="mt-2 flex gap-2">
        @foreach($item->tags as $tag)
            <span class="text-xs bg-gray-800 text-gray-400 px-2 py-1 rounded border border-gray-600">
            #{{ $tag->name }}
        </span>
        @endforeach
    </div>
</x-public-layout>
