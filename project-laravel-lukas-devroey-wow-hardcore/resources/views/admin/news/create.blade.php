<x-app-layout>
    <x-slot name="header">
        <h2 class="font-wow text-xl text-wow-gold uppercase">{{ __('Nieuw Bericht') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-wow-panel border border-wow-border p-6 rounded shadow">
                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="title" :value="__('Titel')" class="text-wow-gold" />
                        <x-text-input id="title" class="block mt-1 w-full bg-black border-gray-700 text-gray-300" type="text" name="title" required />
                    </div>

                    <div>
                        <x-input-label for="published_at" :value="__('Publicatiedatum')" class="text-wow-gold" />
                        <x-text-input id="published_at" class="block mt-1 w-full bg-black border-gray-700 text-gray-300" type="date" name="published_at" required />
                    </div>

                    <div>
                        <x-input-label for="image" :value="__('Afbeelding')" class="text-wow-gold" />
                        <input id="image" type="file" name="image" class="block w-full text-sm text-gray-400 border border-gray-700 rounded cursor-pointer bg-black focus:outline-none mt-1">
                    </div>

                    <div>
                        <x-input-label for="content" :value="__('Inhoud')" class="text-wow-gold" />
                        <textarea id="content" name="content" rows="6" class="block mt-1 w-full bg-black border-gray-700 text-gray-300 rounded shadow-sm focus:border-wow-red focus:ring focus:ring-wow-red focus:ring-opacity-50" required></textarea>
                    </div>

                    <x-primary-button class="bg-wow-gold text-black hover:bg-yellow-600">
                        {{ __('Opslaan') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
