<x-public-layout>
    <div class="max-w-4xl mx-auto py-12 px-4">
        <h1 class="text-4xl font-wow text-wow-gold mb-8 text-center uppercase tracking-widest drop-shadow-md">
            Contacteer de Admins
        </h1>

        <div class="bg-wow-panel border border-wow-border rounded-lg shadow-2xl p-8 relative">
            @if(session('success'))
                <div class="bg-green-900 border border-green-500 text-green-100 p-4 rounded mb-6 text-center font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-wow-gold font-wow mb-2">Naam</label>
                    <input type="text" name="name" id="name" required
                           class="w-full bg-black border border-gray-700 text-gray-300 rounded focus:border-wow-gold focus:ring-wow-gold"
                           value="{{ old('name') }}">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email" class="block text-wow-gold font-wow mb-2">Email</label>
                    <input type="email" name="email" id="email" required
                           class="w-full bg-black border border-gray-700 text-gray-300 rounded focus:border-wow-gold focus:ring-wow-gold"
                           value="{{ old('email') }}">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="message" class="block text-wow-gold font-wow mb-2">Bericht</label>
                    <textarea name="message" id="message" rows="5" required
                              class="w-full bg-black border border-gray-700 text-gray-300 rounded focus:border-wow-gold focus:ring-wow-gold">{{ old('message') }}</textarea>
                    @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="w-full bg-wow-red text-white font-bold py-3 px-4 rounded border border-red-900 hover:bg-red-700 transition uppercase tracking-wide shadow-lg">
                    Verstuur Bericht
                </button>
            </form>
        </div>
    </div>
</x-public-layout>
