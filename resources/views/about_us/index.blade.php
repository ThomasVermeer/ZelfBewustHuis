<x-app-layout>
    <div class="max-w-6xl mx-auto mt-8 p-8 bg-green-900 shadow-lg rounded-lg text-white">
        <!-- About Us Informatie -->
        <div>
            <h1 class="text-4xl font-bold mb-4">About Us Informatie</h1>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div>
                    <h2 class="text-2xl font-bold text-green-800">About Us Text</h2>
                    
                    <p class="text-gray-700">{{ $aboutUs->text ?? 'onbekend'}}</p>
                </div>
                <img src="{{ $aboutUs->image ?? 'onbekend'}}" alt="About Us Image" class="object-cover h-48 w-full rounded-md shadow-md mt-4">
            </div>
            <div class="mt-4">
                <a href="{{ route('about_us.edit') }}" class="text-blue-500 hover:underline">Bewerk About Us</a>
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
                            <img src="{{ $partner->logo }}" alt="{{ $partner->name }}" class="object-cover h-24 w-full rounded-md shadow-md mt-4">
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('about_us.partnersEdit', $partner->id) }}" class="text-blue-500 hover:underline">Bewerk</a>
                            <form action="{{ route('about_us.partners.destroy', $partner->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Verwijder</button>
                            </form>                            
                        </div>
                    </div>
                @endforeach
                <div class="mt-4">
                    <a href="{{ route('about_us.partnersCreate') }}" class="text-blue-500 hover:underline">Nieuwe Partner Toevoegen</a>
                </div>
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
                            <img src="{{ $employee->image }}" alt="{{ $employee->name }}" class="object-cover h-24 w-full rounded-md shadow-md mt-4">
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('about_us.employeesEdit', $employee->id) }}" class="text-blue-500 hover:underline">Bewerk</a>
                            <form action="{{ route('about_us.employees.destroy', $employee->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Verwijder</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="mt-4">
                    <a href="{{ route('about_us.employeesCreate') }}" class="text-blue-500 hover:underline">Nieuwe Werknemer Toevoegen</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
