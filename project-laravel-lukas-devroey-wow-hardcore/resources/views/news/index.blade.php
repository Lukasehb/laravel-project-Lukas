<x-public-layout>
    <h1 class="text-2xl font-bold">Laatste Nieuws</h1>

    <div class="grid grid-cols-3 gap-4">
        @foreach($newsItems as $item)
            <x-news-card :item="$item" />
        @endforeach
    </div>
</x-public-layout>
