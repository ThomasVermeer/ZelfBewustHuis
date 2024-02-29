<x-app-layout>
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-md rounded">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold">Projecten</h1>
            <div class="space-x-4">
                <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Project aanmaken</a>
            </div>
        </div>
    
        @forelse($projects as $project)
            <div class="bg-gray-100 p-6 mb-6 rounded">
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <h2 class="text-2xl font-bold mb-2 mr-20">{{ $project->name }}</h2>
                    <p class="text-gray-700">{{ $project->description }}</p>
                    <p class="status-label 
                              @if($project->status === 'inDevelopment')
                                  status-in-ontwikkeling
                              @elseif($project->status === 'ongoing')
                                  status-lopend
                              @elseif($project->status === 'realised')
                                  status-gerealiseerd
                              @endif">
                        {{ ucfirst($project->status) }}
                    </p>
                    @if ($project->image)
                        <img src="{{ asset('storage/images/' . $project->image) }}" alt="{{ $project->name }}" />
                    @endif
                </div>

            
                <div class="mt-4 flex space-x-2">
                    <a href="{{ route('projects.edit', $project->id) }}" class="text-blue-500 hover:underline">
                        <div class="project-flex">
                            <img style="width: 20px; margin-right: 4px;" src="{{ asset('img/Pencil.png')}}" alt="">
                            <p style="margin-right: 4px; color: #2457c5;">Bewerken</p>
                        </div>
                    </a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="post" onsubmit="return confirm('Weet u zeker dat u dit project wilt verwijderen?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">
                            <div class="project-flex">
                                <img style="width: 20px; margin-right: 4px;" src="{{ asset('img/Remove.png')}}" alt="">
                                <p style="color: #BB271A;">Verwijderen</p>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Geen projecten gevonden.</p>
        @endforelse
    </div>
</x-app-layout>
