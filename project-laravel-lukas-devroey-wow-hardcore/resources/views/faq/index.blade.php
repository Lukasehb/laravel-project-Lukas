<x-public-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Veelgestelde Vragen</h1>

        @foreach($categories as $category)
            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-4 text-blue-600">{{ $category->name }}</h2>
                <div class="space-y-4">
                    @foreach($category->items as $item)
                        <div class="bg-white p-4 rounded-lg shadow border border-gray-200">
                            <h3 class="font-bold text-lg mb-2 text-gray-800">{{ $item->question }}</h3>
                            <p class="text-gray-700">{{ $item->answer }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-public-layout>
