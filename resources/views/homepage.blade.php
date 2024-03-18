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
