<x-app-layout>
    <x-slot name="header">
        <h2 class="font-wow text-xl text-wow-gold uppercase">{{ __('Bericht Bewerken') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-wow-panel border border-wow-border p-6 rounded shadow">
                <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="title" :value="__('Titel')" class="text-wow-gold" />
                        <x-text-input id="title" class="block mt-1 w-full bg-black border-gray-700 text-gray-300" type="text" name="title" :value="old('title', $news->title)" required />
                    </div>

                    <div>
                        <x-input-label for="published_at" :value="__('Publicatiedatum')" class="text-wow-gold" />
                        <x-text-input id="published_at" class="block mt-1 w-full bg-black border-gray-700 text-gray-300" type="date" name="published_at" :value="old('published_at', $news->published_at instanceof \DateTime ? $news->published_at->format('Y-m-d') : $news->published_at)" required />
                    </div>

                    @if($news->image_path)
                        <div class="p-4 border border-gray-800 bg-black rounded">
                            <p class="text-wow-gold text-xs uppercase mb-2">Huidige afbeelding:</p>
                            <img src="{{ asset('storage/' . $news->image_path) }}" alt="Huidige afbeelding" class="max-h-48 rounded border border-wow-border">
                        </div>
                    @endif  <div>
                        <x-input-label for="image" :value="__('Nieuwe Afbeelding (laat leeg om te behouden)')" class="text-wow-gold" />
                        <input id="image" type="file" name="image" class="block w-full text-sm text-gray-400 border border-gray-700 rounded cursor-pointer bg-black focus:outline-none mt-1">
                    </div>

                    <div>
                        <x-input-label for="content" :value="__('Inhoud')" class="text-wow-gold" />
                        <textarea id="content" name="content" rows="10" class="block mt-1 w-full bg-black border-gray-700 text-gray-300 rounded shadow-sm focus:border-wow-red focus:ring focus:ring-wow-red focus:ring-opacity-50" required>{{ old('content', $news->content) }}</textarea>
                    </div>

                    <div class="flex items-center gap-4 border-t border-gray-800 pt-4">
                        <x-primary-button class="bg-wow-gold text-black hover:bg-yellow-600 font-bold">
                            {{ __('Bijwerken') }}
                        </x-primary-button>

                        <a href="{{ route('admin.news.index') }}" class="text-gray-500 hover:text-white text-sm underline">
                            Annuleren
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
