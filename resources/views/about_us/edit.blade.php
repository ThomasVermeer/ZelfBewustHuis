<x-app-layout>
    <div class="max-w-6xl mx-auto mt-8 p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold mb-8">Bewerk About Us Informatie</h1>

        <!-- Formulier voor het bewerken van About Us informatie -->
        <form action="{{ route('about_us.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <!-- Tekstinvoerveld voor de About Us tekst -->
            <div class="mb-4">
                <label for="text" class="block text-gray-700 font-bold mb-2">About Us Tekst</label>
                <textarea name="text" id="text" class="w-full px-3 py-2 border rounded-lg">{{ $aboutUs->text ?? 'onbekend'}}</textarea>
                @error('text')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Uploadveld voor de afbeelding -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">About Us Afbeelding</label>
                <input type="file" name="image" id="image" class="border rounded-lg">
                @error('image')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Knop om het formulier te verzenden -->
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Bijwerken
                </button>
            </div>
        </form>
    </div>
</x-app-layout>