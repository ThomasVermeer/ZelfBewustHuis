<x-app-layout>
    <!-- Banner -->
    <img src="img/banner-zelfbewuste-huis.jpg" alt="Banner" class="banner">

    <h1>Projecten</h1>
    <div class="carousel" id="project-carousel">
        @foreach ($projects as $project)
            <div class="carousel-item w-full p-2">
                <div class="bg-white p-4 rounded-md shadow-md">
                    <h2 class="text-xl font-bold mb-4">{{$project->name}}</h2>
                    <p class="mb-4">{{$project->description}}</p>
                    <h2 class="text-xl font-bold mb-4">{{$project->status}}</h2>
                    @if ($project->image)
                    <img src="{{ $project->image }}" alt="{{ $project->name }}" class="project-image" />
                @endif
                </div>
            </div>
        @endforeach
    </div>


    <div class="container">
        <h1 class="text-3xl font-bold mb-4">Over Ons</h1>
    
        @foreach ($aboutUsData as $aboutUs)
            <div class="mb-8">
                <p class="text-lg">{{ $aboutUs->text }}</p>
                <img src="{{ asset('storage/img/' . $aboutUs->image) }}" alt="{{ $aboutUs->name }}" >
        
                <div class="mt-8">
                    <h2 class="text-xl font-semibold mb-2">Personen</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-7 gap-4">
                        @foreach ($employee as $employeeItem)
                            <div class="flex flex-col items-center mb-4">
                                <img src="{{ asset('storage/img/' . $employeeItem->image) }}" alt="{{ $employeeItem->name }}" class="w-16 h-16 object-cover rounded-full mb-2 max-h-16">
                                <span class="text-center">{{ $employeeItem->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4">
                    <h2 class="text-xl font-semibold mb-2">Partners</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-7 gap-4">
                        @foreach ($partner as $partnerItem)
                            <div class="flex flex-col items-center mb-4">
                                <img src="{{ asset('storage/img/' . $partnerItem->logo) }}" alt="{{ $partnerItem->name }}" class="w-16 h-16 object-cover rounded-full mb-2 max-h-16">
                                <span class="text-center">{{ $partnerItem->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        @endforeach
    </div>


    <footer class="bg-green-800" style="padding-top: 20px; padding-bottom: 20px;">
        <h1 class="text-2xl mt-4">Locatie</h1>
    
        <!-- Locatieblokjes naast elkaar -->
        <div style="display: flex; margin-top: 20px;">
            @foreach($locations as $location)
                <div class="bg-green-700 border rounded-md p-4 mr-4">
                    <h2 class="text-white">
                        {{ $location->city }}, {{ $location->street }} {{ $location->number }}
                    </h2>
        
                    @if ($location->image)
                        <img src="{{ $location->image }}" alt="{{ $location->city }}" class="location-image mt-4" style="width: 150px;">
                    @else
                        <div class="bg-gray-200 h-40 mt-4 rounded"></div>
                    @endif
                </div>
            @endforeach
        </div>
    </footer>
    
</x-app-layout>
