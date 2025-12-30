<x-app-layout>
    <x-slot name="header">
        <h2 class="font-wow text-xl text-wow-gold uppercase">{{ __('FAQ Beheer') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-wow-panel p-6 border border-wow-border rounded shadow">
                <form action="{{ route('admin.faq.category.store') }}" method="POST" class="flex gap-4">
                    @csrf
                    <div class="flex-grow">
                        <input type="text" name="name" placeholder="Nieuwe Categorie Naam" class="w-full bg-black text-gray-300 border-gray-700 rounded focus:border-wow-gold focus:ring-wow-gold" required>
                    </div>
                    <button type="submit" class="bg-wow-gold text-black px-6 py-2 rounded font-bold hover:bg-yellow-600 transition">
                        + Categorie
                    </button>
                </form>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.faq.item.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700 shadow border border-blue-500">
                    + Nieuwe Vraag Toevoegen
                </a>
            </div>

            @foreach($categories as $category)
                <div class="bg-wow-panel border border-wow-border rounded overflow-hidden shadow-lg">
                    <div class="bg-black/80 p-4 flex justify-between items-center border-b border-gray-800">
                        <h3 class="text-wow-gold font-bold text-lg">{{ $category->name }}</h3>
                        <form action="{{ route('admin.faq.category.destroy', $category) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze categorie en alle vragen wilt verwijderen?');">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 text-sm font-bold uppercase">Verwijder Categorie</button>
                        </form>
                    </div>
                    <div class="p-4 bg-black/40">
                        @if($category->items->isEmpty())
                            <p class="text-gray-500 italic text-sm">Nog geen vragen in deze categorie.</p>
                        @else
                            <ul class="space-y-3">
                                @foreach($category->items as $item)
                                    <li class="flex justify-between items-start bg-black/60 p-3 rounded border border-gray-800">
                                        <div class="text-gray-300">
                                            <span class="font-bold text-white block mb-1">{{ $item->question }}</span>
                                            <span class="text-sm text-gray-500">{{ Str::limit($item->answer, 100) }}</span>
                                        </div>

                                        <div class="flex items-center gap-3 ml-4">
                                            <a href="{{ route('admin.faq.item.edit', $item) }}" class="text-wow-gold hover:text-yellow-300 font-bold text-sm uppercase">
                                                Bewerk / Beantwoord
                                            </a>

                                            <form action="{{ route('admin.faq.item.destroy', $item) }}" method="POST" onsubmit="return confirm('Vraag verwijderen?');">
                                                @csrf @method('DELETE')
                                                <button class="text-red-400 hover:text-red-600 font-bold ml-2">X</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
