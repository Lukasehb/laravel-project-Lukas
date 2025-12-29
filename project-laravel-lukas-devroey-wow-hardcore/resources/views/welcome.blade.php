<x-public-layout>
    <div class="bg-wow-panel border-b-4 border-wow-red p-12 text-center shadow-lg mb-8 relative">
        <h1 class="text-4xl font-wow font-bold mb-2 text-wow-gold tracking-widest uppercase drop-shadow-md">
            Welkom op mijn Laravel Project
        </h1>
        <p class="text-lg text-gray-400 italic">
            Het laatste nieuws en updates vind je hieronder. <span class="text-wow-red font-bold">Stay safe.</span>
        </p>
    </div>

    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-wow font-bold mb-6 text-wow-gold border-b border-wow-border pb-2 uppercase tracking-wide">
            Laatste Nieuwtjes
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($newsItems as $item)
                <div class="bg-wow-panel border border-wow-border rounded-lg shadow-lg hover:shadow-xl hover:border-wow-gold transition-all duration-300 overflow-hidden group">

                    @if($item->image_path)
                        <img src="{{ asset('storage/' . $item->image_path) }}"
                             alt="{{ $item->title }}"
                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-48 bg-black border-b border-wow-border flex items-center justify-center text-gray-600 font-wow">
                            Geen afbeelding
                        </div>
                    @endif

                    <div class="p-5">
                        <div class="text-xs text-wow-red mb-2 uppercase tracking-widest font-bold">
                            {{ $item->published_at }}
                        </div>

                        <h3 class="font-wow font-bold text-xl mb-3 text-wow-gold group-hover:text-white transition-colors">
                            {{ $item->title }}
                        </h3>

                        <p class="text-gray-400 mb-6 text-sm leading-relaxed">
                            {{ Str::limit($item->content, 100) }}
                        </p>

                        <a href="{{ route('news.show', $item) }}" class="inline-block bg-wow-red text-white px-4 py-2 rounded border border-red-900 hover:bg-red-700 hover:border-red-500 transition-all uppercase font-bold text-xs tracking-wider shadow-md">
                            Lees meer &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-public-layout>
