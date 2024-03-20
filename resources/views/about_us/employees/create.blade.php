<x-app-layout>
    <div class="max-w-6xl mx-auto mt-8 p-8 bg-green-900 shadow-lg rounded-lg text-white">
        <h1 class="text-4xl font-bold mb-4">Werknemer Toevoegen</h1>
        <form action="{{ route('about_us.employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-lg font-bold mb-2">Naam:</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-md text-black" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-lg font-bold mb-2">Afbeelding:</label>
                <input type="file" name="image" id="image" class="w-full px-3 py-2 border rounded-md">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Toevoegen</button>
            </div>
        </form>
    </div>
</x-app-layout>
