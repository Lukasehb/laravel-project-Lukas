@foreach($categories as $category)
    <h2>{{ $category->name }}</h2>
    <ul>
        @foreach($category->items as $item)
            <li>
                <strong>{{ $item->question }}</strong>
                <p>{{ $item->answer }}</p>
            </li>
        @endforeach
    </ul>
@endforeach

<x-public-layout>
    <h1 class="text-2xl font-bold">Laatste Nieuws</h1>

    <div class="grid grid-cols-3 gap-4">
        @foreach($newsItems as $item)
            <x-news-card :item="$item" />
        @endforeach
    </div>
</x-public-layout>
