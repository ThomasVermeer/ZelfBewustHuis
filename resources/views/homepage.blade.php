<x-app-layout>
    <!-- Banner -->
    <img src="img/banner-zelfbewuste-huis.jpg" alt="Banner" class="banner">

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold my-8">Projecten</h1>

        <!-- Carrousel voor projecten -->
        <div class="bg-white rounded-lg shadow-md max-w-lg mx-auto mb-8">
            <div class="p-6">
                @foreach ($projects as $index => $project)
                    <div class="project {{$index === 0 ? 'block' : 'hidden'}}">
                        @if ($project->image)
                            <img src="{{ $project->image }}" alt="{{ $project->name }}" class="w-full h-64 object-cover rounded-lg mb-4">
                        @endif
                        <h2 class="text-xl font-bold mb-4">{{$project->name}}</h2>
                        <p class="mb-4">{{$project->description}}</p>
                        <h2 class="text-xl font-bold mb-4">{{$project->status}}</h2>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Knoppen voor navigatie naar vorige of volgende project -->
        <div class="flex justify-between mb-8">
            <button id="prev-project-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Vorige project
            </button>
            <button id="next-project-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Volgend project
            </button>
        </div>

    <footer class="bg-green-800 py-8">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-4">Locaties</h1>
    
            <div class="grid grid-cols-3 gap-4">
                @foreach($locations as $index => $location)
                    <div class="mb-8">
                        <div class="bg-green-600 rounded-lg overflow-hidden shadow-lg">
                            <div class="p-4 flex flex-col items-center">
                                <h2 class="text-xl mb-2">{{ $location['city'] }}, {{ $location['street'] }} {{ $location['number'] }}</h2>
                                <img src="{{ $location['image'] }}" class="rounded-lg" style="max-width: 200px; max-height: 150px; min-width: 200px; min-height: 150px;">
                            </div>
                        </div>
                    </div>
                    @if(($index + 1) % 3 == 0 && $index + 1 < count($locations))
                        <div class="w-full"></div> <!-- Line break for every third item -->
                    @endif
                @endforeach
            </div>
        </div>
    </footer>
    
    
    

    <!-- JavaScript voor het navigeren tussen projecten -->
    <script>
        const prevProjectBtn = document.getElementById('prev-project-btn');
        const nextProjectBtn = document.getElementById('next-project-btn');
        const projects = document.querySelectorAll('.project');
        let currentProjectIndex = 0;

        nextProjectBtn.addEventListener('click', () => {
            projects[currentProjectIndex].classList.add('hidden'); // Verberg huidig project
            currentProjectIndex = (currentProjectIndex + 1) % projects.length;
            projects[currentProjectIndex].classList.remove('hidden'); // Toon volgende project
        });

        prevProjectBtn.addEventListener('click', () => {
            projects[currentProjectIndex].classList.add('hidden'); // Verberg huidig project
            currentProjectIndex = (currentProjectIndex - 1 + projects.length) % projects.length;
            projects[currentProjectIndex].classList.remove('hidden'); // Toon vorige project
        });
    </script>
</x-app-layout>
