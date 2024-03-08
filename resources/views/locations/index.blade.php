<x-app-layout>
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-md rounded">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold">Locaties</h1>
            <div class="space-x-4">
                <a href="{{ route('locations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Locatie toevoegen</a>
            </div>
        </div>
    
        @forelse($locations as $location)
            <div class="bg-gray-100 p-6 mb-6 rounded">
                <div>
                    <h2 class="text-2xl font-bold mb-2">{{ $location->city }}</h2>
                    <p class="text-gray-700">Straat: {{ $location->street }}, Nummer: {{ $location->number }}</p>
                    @if ($location->image)
                        <img src="{{ $location->image }}" alt="{{ $location->city }}" class="location-image mt-4" />
                    @else
                        <div class="bg-gray-200 h-40 mt-4 rounded"></div>
                    @endif
                </div>

                <div class="mt-4 flex space-x-2">
                    <a href="{{ route('locations.edit', $location->id) }}" class="text-blue-500 hover:underline">
                        <div class="location-flex">
                            <img style="width: 20px; margin-right: 4px;" src="{{ asset('img/Pencil.png')}}" alt="">
                            <p style="margin-right: 4px; color: #2457c5;">Bewerken</p>
                        </div>
                    </a>
                    <form action="{{ route('locations.destroy', $location->id) }}" method="post" onsubmit="return confirm('Weet u zeker dat u deze locatie wilt verwijderen?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">
                            <div class="location-flex">
                                <img style="width: 20px; margin-right: 4px;" src="{{ asset('img/Remove.png')}}" alt="">
                                <p style="color: #BB271A;">Verwijderen</p>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Geen locaties gevonden.</p>
        @endforelse
    </div>
</x-app-layout>