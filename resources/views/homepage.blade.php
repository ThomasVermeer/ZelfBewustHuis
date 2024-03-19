<x-app-layout>
    <!-- Banner -->
    <img src="img/banner-zelfbewuste-huis.jpg" alt="Banner" class="banner">

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold my-8">Projecten</h1>

        <!-- Carrousel voor projecten -->
        <div class="bg-white rounded-lg shadow-md">
            <div class="p-6">
                @foreach ($projects as $index => $project)
                <div class="project {{$index === 0 ? 'block' : 'hidden'}}">
                    @if ($project->image)
                        <img src="{{ $project->image }}" alt="{{ $project->name }}" class="max-w-full h-64 object-cover rounded-lg mb-4">
                    @endif
                    <h2 class="text-xl font-bold mb-4">{{$project->name}}</h2>
                    <p class="mb-4">{{$project->description}}</p>
                    <h2 class="text-xl font-bold mb-4">{{$project->status}}</h2>
                </div>
            @endforeach
            
            </div>
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

    <footer class="bg-green-800 py-8">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-4">Locatie</h1>
            <h2 class="text-xl mb-4">Curio, frankenlein, 15 (HBO)</h2>

            <div class="flex space-x-4">
                <img src="img/Project1.jpg" width="150" class="rounded-lg">
                <img src="img/Project1.jpg" width="150" class="rounded-lg">
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
