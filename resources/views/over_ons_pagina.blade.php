<x-app-layout>
    <div class="max-w-6xl mx-auto mt-8 p-8 bg-green-900 shadow-lg rounded-lg text-white">
        <!-- About Us Informatie -->
        <div>
            <h1 class="text-4xl font-bold mb-4">Over Ons Informatie</h1>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div>
                    <h2 class="text-2xl font-bold text-green-800">Over Ons</h2>
                    <p class="text-gray-700">{{ $aboutUs->text }}</p>
                </div>
                @if ($aboutUs->image)
                    <img src="{{ $aboutUs->image }}" alt="About Us Image" class="object-cover h-48 w-full rounded-md shadow-md mt-4">
                @endif
            </div>
        </div>

        <!-- Partners -->
        <div class="mt-8">
            <h1 class="text-4xl font-bold mb-4">Partners</h1>
            <div class="grid grid-cols-4 gap-6">
                @foreach($partners as $partner)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div>
                            <h2 class="text-2xl font-bold text-green-800">{{ $partner->name }}</h2>
                            <img src="{{ asset('storage/img/' . $partner->logo) }}" alt="{{ $partner->name }}" class="object-cover h-24 w-full rounded-md shadow-md mt-4">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Werknemers -->
        <div class="mt-8">
            <h1 class="text-4xl font-bold mb-4">Werknemers</h1>
            <div class="grid grid-cols-4 gap-6">
                @foreach($employees as $employee)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div>
                            <h2 class="text-2xl font-bold text-green-800">{{ $employee->name }}</h2>
                            <img src="{{ asset('storage/img/' . $employee->image) }}" alt="{{ $employee->name }}" class="object-cover h-24 w-full rounded-md shadow-md mt-4">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
