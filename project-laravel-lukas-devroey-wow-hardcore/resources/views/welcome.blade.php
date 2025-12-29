<x-public-layout>
    <div class="bg-blue-600 text-white p-12 text-center rounded-b-lg shadow-md mb-8">
        <h1 class="text-4xl font-bold mb-2">Welkom op mijn Laravel Project</h1>
        <p class="text-lg">Het laatste nieuws en updates vind je hieronder.</p>
    </div>

    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-2">Laatste Nieuwtjes</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($newsItems as $item)
                <div class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition-shadow overflow-hidden">
                    @if($item->image_path)
                        <img src="{{ asset('storage/' . $item->image_path) }}"
                             alt="{{ $item->title }}"
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                            Geen afbeelding
                        </div>
                    @endif

                    <div class="p-4">
                        <div class="text-sm text-gray-500 mb-1">
                            {{ $item->published_at }}
                        </div>

                        <h3 class="font-bold text-xl mb-2 text-gray-900">{{ $item->title }}</h3>

                        <p class="text-gray-700 mb-4">
                            {{ Str::limit($item->content, 100) }}
                        </p>

                        <a href="{{ route('news.show', $item) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">
                            Lees meer &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-public-layout>
