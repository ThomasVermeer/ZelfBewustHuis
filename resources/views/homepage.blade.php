<x-app-layout>
    <!-- Banner -->
    <img src="img/banner-zelfbewuste-huis.jpg" alt="Banner" class="banner">

    <!-- Carrousel -->
    <div class="carousel-container">
        <div class="carousel" id="project-carousel">
            @foreach ($projects as $project)
                <div class="carousel-item w-full p-2">
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <h2 class="text-xl font-bold mb-4">{{$project->name}}</h2>
                        <p class="mb-4">{{$project->description}}</p>
                        <h2 class="text-xl font-bold mb-4">{{$project->status}}</h2>
                        <img src="img/Project1.jpg" alt="Afbeelding" class="small-img">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Button in het midden -->
    <div class="container mx-auto mt-8 text-center">
        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-full">Button</button>
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

    <!-- Voeg JavaScript toe voor de carrouselfunctionaliteit -->
    <script>
        const carousel = document.getElementById('project-carousel');
        const inner = carousel.querySelector('.carousel');
        const items = carousel.querySelectorAll('.carousel-item');

        let currentIndex = 0;

        function updateCarousel() {
            inner.style.transform = `translateX(${-currentIndex * 100}%)`;
        }

        // Voeg event listeners toe voor vorige en volgende knoppen
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('prev-btn').addEventListener('click', function () {
                currentIndex = Math.max(currentIndex - 1, 0);
                updateCarousel();
            });

            document.getElementById('next-btn').addEventListener('click', function () {
                currentIndex = Math.min(currentIndex + 1, items.length - 1);
                updateCarousel();
            });
        });
    </script>
</x-app-layout>
