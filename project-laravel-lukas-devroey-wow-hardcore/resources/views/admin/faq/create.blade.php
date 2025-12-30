<x-app-layout>
    <x-slot name="header">
        <h2 class="font-wow text-xl text-wow-gold uppercase">{{ __('Nieuwe Vraag Toevoegen') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-wow-panel border border-wow-border p-6 rounded shadow">
                <form action="{{ route('admin.faq.item.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="faq_category_id" :value="__('Categorie')" class="text-wow-gold" />
                        <select name="faq_category_id" id="faq_category_id" class="block mt-1 w-full bg-black border-gray-700 text-gray-300 rounded focus:border-wow-gold focus:ring-wow-gold" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="question" :value="__('Vraag')" class="text-wow-gold" />
                        <x-text-input id="question" class="block mt-1 w-full bg-black border-gray-700 text-gray-300" type="text" name="question" :value="old('question')" required />
                    </div>

                    <div>
                        <x-input-label for="answer" :value="__('Antwoord')" class="text-wow-gold" />
                        <textarea id="answer" name="answer" rows="5" class="block mt-1 w-full bg-black border-gray-700 text-gray-300 rounded shadow-sm focus:border-wow-gold focus:ring-wow-gold" required>{{ old('answer') }}</textarea>
                    </div>

                    <div class="flex items-center gap-4 border-t border-gray-800 pt-4">
                        <x-primary-button class="bg-wow-gold text-black hover:bg-yellow-600 font-bold">
                            {{ __('Toevoegen') }}
                        </x-primary-button>

                        <a href="{{ route('admin.faq.index') }}" class="text-gray-400 hover:text-white">
                            Annuleren
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
