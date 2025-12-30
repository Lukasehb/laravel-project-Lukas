<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-wow text-xl text-wow-gold uppercase">{{ __('Nieuws Beheer') }}</h2>
            <a href="{{ route('admin.news.create') }}" class="bg-wow-red text-white px-4 py-2 rounded hover:bg-red-700 font-bold uppercase text-xs">
                + Nieuw Item
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-wow-panel border border-wow-border overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full text-left text-gray-400">
                    <thead class="bg-black text-wow-gold uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Titel</th>
                        <th class="px-6 py-3">Datum</th>
                        <th class="px-6 py-3 text-right">Acties</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800">
                    @foreach($newsItems as $news)
                        <tr class="hover:bg-gray-900">
                            <td class="px-6 py-4">{{ $news->title }}</td>
                            <td class="px-6 py-4">{{ $news->published_at->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.news.edit', $news) }}" class="text-blue-400 hover:underline">Edit</a>
                                <form action="{{ route('admin.news.destroy', $news) }}" method="POST" class="inline" onsubmit="return confirm('Zeker weten?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="p-4">
                    {{ $newsItems->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
