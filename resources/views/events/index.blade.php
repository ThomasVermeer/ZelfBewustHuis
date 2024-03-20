<x-app-layout>
    <div class="max-w-2xl mx-auto mt-8 p-8 bg-green-900 shadow-md rounded-lg text-white">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold">Evenementen</h1>
            <div class="space-x-4">
                <a href="{{ route('events.create') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">Evenement aanmaken</a>
            </div>
        </div>
    
        @forelse($events as $event)
            <div class="bg-white p-6 mb-6 rounded-lg shadow-md">
                <div>
                    <div class="name-status">
                        <h2 class="text-2xl text-black font-bold  mr-20">{{ $event->name }}</h2>
                    </div>
                    <p class="text-gray-700">{{ $event->description }}</p>
                    <div class="address-flex">
                        <img style="width: 25px; margin-right: 10px" src="{{ asset('img/home.png')}}" alt="">
                        <p class="text-black">{{$event->address}}, {{$event->zipcode}} {{$event->city}}</p>
                    </div>
                    @if ($event->image)
                        <img src="{{ $event->image }}" alt="{{ $event->name }}" class="object-cover h-48 w-full rounded-md shadow-md mt-4" />
                    @endif
                    <span class="text-black">{{ date('H:i', strtotime($event->start_time)) }} - {{ date('H:i', strtotime($event->end_time)) }}</span>
                    <br>
                    <span class="text-black">{{ date('d-m-Y', strtotime($event->date)) }}</span>
                </div>

                <div class="mt-4 flex justify-between">
                    <a href="{{ route('events.edit', $event->id) }}" class="text-green-500 hover:underline">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M15 3a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h10zm4 2a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V5zM15 10a2 2 0 100 4 2 2 0 000-4z"/></svg>
                        Bewerken
                    </a>
                    <form action="{{ route('events.destroy', $event->id) }}" method="post" onsubmit="return confirm('Weet u zeker dat u dit evenement wilt verwijderen?')">
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
            <p class="text-gray-600">Geen evenementen gevonden.</p>
        @endforelse
    </div>
</x-app-layout>
