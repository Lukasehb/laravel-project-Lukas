@props(['item'])

<div class="border p-4 rounded shadow">
    <h3 class="font-bold">{{ $item->title }}</h3>
    <p>{{ Str::limit($item->content, 100) }}</p>
    <a href="{{ route('news.show', $item) }}" class="text-blue-500">Lees meer</a>
</div>
