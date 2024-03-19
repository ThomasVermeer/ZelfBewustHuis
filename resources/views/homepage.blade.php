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
                </div>
            @endforeach
            
            </div>
        @endforeach
    </div>

        <!-- Knoppen voor navigatie naar vorige of volgende project -->
        <div class="flex justify-between mt-8">
            <button id="prev-project-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Vorige project
            </button>
            <button id="next-project-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Volgend project
            </button>
        </div>

        <div class="mt-16">
            <h1 class="text-3xl font-bold mb-8">Over Ons</h1>
            @foreach ($aboutUsData as $aboutUs)
                <div class="mb-8">
                    <p class="text-lg">{{ $aboutUs->text }}</p>
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <h2 class="text-xl font-semibold mb-4">Personen</h2>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($employee as $employeeItem)
                                    <div class="flex items-center mb-4">
                                        <img src="{{ asset('storage/img/' . $employeeItem->image) }}" alt="{{ $employeeItem->name }}" class="w-12 h-12 object-cover rounded-full mr-2">
                                        <span>{{ $employeeItem->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold mb-4">Partners</h2>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($partner as $partnerItem)
                                    <div class="flex items-center mb-4">
                                        <img src="{{ asset('storage/img/' . $partnerItem->logo) }}" alt="{{ $partnerItem->name }}" class="w-12 h-12 object-cover rounded-full mr-2">
                                        <span>{{ $partnerItem->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <footer class="bg-green-800" style="padding-top: 20px; padding-bottom: 20px;">
        <h1 class="text-2xl mt-4">Locatie</h1>
        <h2 class="">Curio, frankenlein, 15 (HBO)</h2>

        <!-- Afbeeldingen naast elkaar met ruimte ertussen -->
        <div style="display: flex; margin-top: 20px;">
            <img src="img/Project1.jpg" width="150" style="margin-right: 20px;">
            <img src="img/Project1.jpg" width="150" style="margin-right: 20px;">
        </div>
    </footer>
</x-app-layout>
