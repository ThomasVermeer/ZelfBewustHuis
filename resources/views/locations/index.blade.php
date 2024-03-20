<x-app-layout>
    <div class="max-w-2xl mx-auto mt-8 p-8 bg-green-900 shadow-lg rounded-lg text-white">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold">Locaties</h1>
            <div class="space-x-4">
                <a href="{{ route('locations.create') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">Locatie toevoegen</a>
            </div>
        </div>
    
        @forelse($locations as $location)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div>
                    <h2 class="text-2xl text-black font-bold mb-2">{{ $location->city }}</h2>
                    <p class="text-gray-700">Straat: {{ $location->street }}, Nummer: {{ $location->number }}</p>
                    @if ($location->image)
                        <img src="{{ $location->image }}" alt="{{ $location->city }}" class="object-cover h-48 w-full rounded-md shadow-md mt-4" />
                    @else
                        <div class="bg-gray-200 h-40 mt-4 rounded"></div>
                    @endif
                </div>

                <div class="mt-4 flex justify-between">
                    <a href="{{ route('locations.edit', $location->id) }}" class="text-green-500 hover:underline">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M15 3a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h10zm4 2a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V5zM15 10a2 2 0 100 4 2 2 0 000-4z"/></svg>
                        Bewerken
                    </a>
                    <form action="{{ route('locations.destroy', $location->id) }}" method="post" onsubmit="return confirm('Weet u zeker dat u deze locatie wilt verwijderen?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M6 18L18 6M6 6l12 12"/></svg>
                            Verwijderen
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Geen locaties gevonden.</p>
        @endforelse
    </div>
</x-app-layout>
