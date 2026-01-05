<x-public-layout>
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        <div class="mb-6">
            <a href="{{ route('news.index') }}" class="text-wow-gold hover:text-white transition-colors flex items-center gap-2 font-wow tracking-wide uppercase text-sm">
                &larr; Back to the news
            </a>
        </div>

        <div class="bg-wow-panel border border-wow-border rounded-lg shadow-2xl overflow-hidden relative">

            @if($newsItem->image_path)
                <div class="w-full h-96 relative border-b border-wow-border">
                    <img src="{{ asset('storage/' . $newsItem->image_path) }}"
                         alt="{{ $newsItem->title }}"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                </div>
            @endif

            <div class="p-8 relative">
                <div class="flex justify-between items-start mb-6">
                    <span class="bg-wow-red text-white text-xs font-bold px-3 py-1 uppercase tracking-wider rounded border border-red-900 shadow">
                        {{ $newsItem->published_at->format('d F Y') }}
                    </span>
                </div>

                <h1 class="text-4xl md:text-5xl font-wow text-wow-gold mb-8 drop-shadow-md leading-tight">
                    {{ $newsItem->title }}
                </h1>

                <div class="prose prose-invert prose-lg max-w-none text-gray-300 leading-relaxed">
                    {!! nl2br(e($newsItem->content)) !!}
                </div>
            </div>

            <div class="h-2 bg-gradient-to-r from-transparent via-wow-gold to-transparent opacity-20 mt-8"></div>
        </div>
        <div class="mt-2 flex gap-2">
            @foreach($newsItem->tags as $tag)
                <span class="text-xs bg-gray-800 text-gray-400 px-2 py-1 rounded border border-gray-600">
            #{{ $tag->name }}
        </span>
            @endforeach
        </div>
    </div>
</x-public-layout>
