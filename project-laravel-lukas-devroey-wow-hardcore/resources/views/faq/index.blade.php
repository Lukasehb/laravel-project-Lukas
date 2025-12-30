<x-public-layout>
    <div class="max-w-4xl mx-auto py-12 px-4">
        <h1 class="text-4xl font-wow text-wow-gold mb-8 text-center uppercase tracking-widest drop-shadow-md">
            Veelgestelde Vragen
        </h1>

        <div class="space-y-8">
            @foreach($categories as $category)
                @if($category->items->count() > 0)
                    <div class="bg-wow-panel border border-wow-border rounded-lg overflow-hidden shadow-xl">
                        <div class="bg-black/90 p-4 border-b border-wow-red">
                            <h2 class="text-2xl font-wow text-gray-100 tracking-wide">
                                {{ $category->name }}
                            </h2>
                        </div>

                        <div class="p-6 space-y-4 bg-black/40">
                            @foreach($category->items as $item)
                                <div x-data="{ open: false }" class="border-b border-gray-800 last:border-0 pb-4 last:pb-0">
                                    <button @click="open = !open" class="flex justify-between items-center w-full text-left focus:outline-none group">
                                        <span class="text-wow-gold font-bold text-lg group-hover:text-white transition duration-200">
                                            {{ $item->question }}
                                        </span>
                                        <span class="text-wow-gold ml-2 transform transition-transform duration-200" :class="{'rotate-180': open}">
                                            ▼
                                        </span>
                                    </button>

                                    <div x-show="open"
                                         x-transition:enter="transition ease-out duration-200"
                                         x-transition:enter-start="opacity-0 -translate-y-2"
                                         x-transition:enter-end="opacity-100 translate-y-0"
                                         class="mt-3 text-gray-400 leading-relaxed pl-4 border-l-2 border-wow-border"
                                         style="display: none;">
                                        {!! nl2br(e($item->answer)) !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-public-layout>
