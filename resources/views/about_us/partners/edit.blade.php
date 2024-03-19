<x-app-layout>
    <div class="max-w-6xl mx-auto mt-8 p-8 bg-green-900 shadow-lg rounded-lg text-white">
        <h1 class="text-4xl font-bold mb-4">Partner Bewerken</h1>
        <form action="{{ route('about_us.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-lg font-bold mb-2">Naam:</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-md text-black" value="{{ $partner->name }}" required>
            </div>
            <div class="mb-4">
                <label for="logo" class="block text-lg font-bold mb-2">Huidig Logo:</label>
                <img src="{{ asset('storage/img/' . $partner->logo) }}" alt="Partner Logo" class="h-24 w-24 object-contain mb-2">
                <label for="logo" class="block text-lg font-bold mb-2">Nieuw Logo:</label>
                <input type="file" name="logo" id="logo" class="w-full px-3 py-2 border rounded-md">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Opslaan</button>
            </div>
        </form>
    </div>
</x-app-layout>
