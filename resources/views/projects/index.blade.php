<x-app-layout>
    <div class="max-w-6xl mx-auto mt-8 p-8 bg-green-900 shadow-lg rounded-lg text-white">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold">Projecten</h1>
            <a href="{{ route('projects.create') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">Project aanmaken</a>
        </div>
    
        <div class="grid grid-cols-4 gap-6">
            @forelse($projects as $project)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div>
                        <div class="name-status mb-4 flex items-center">
                            <h2 class="text-2xl font-bold text-green-800">{{ $project->name }}</h2>
                            <span class="ml-2 px-2 py-1 text-sm font-medium rounded-full
                                        @if($project->status === 'inDevelopment')
                                            bg-yellow-400 text-yellow-900
                                        @elseif($project->status === 'ongoing')
                                            bg-green-400 text-green-900
                                        @elseif($project->status === 'realised')
                                            bg-blue-400 text-blue-900
                                        @endif">
                                @if($project->status === 'inDevelopment')
                                    In Ontwikkeling
                                @elseif($project->status === 'ongoing')
                                    Lopend
                                @elseif($project->status === 'realised')
                                    Gerealiseerd
                                @endif
                            </span>
                        </div>
                        <p class="text-gray-700">{{ $project->description }}</p>
                        @if ($project->image)
                            <img src="{{ $project->image }}" alt="{{ $project->name }}" class="object-cover h-48 w-full rounded-md shadow-md">
                        @endif
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <a href="{{ route('projects.edit', $project->id) }}" class="flex items-center text-green-500 hover:underline">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M15 3a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h10zm4 2a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V5zM15 10a2 2 0 100 4 2 2 0 000-4z"/></svg>
                            Bewerken
                        </a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="post" onsubmit="return confirm('Weet u zeker dat u dit project wilt verwijderen?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center text-red-500 hover:underline">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M6 18L18 6M6 6l12 12"/></svg>
                                Verwijderen
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Geen projecten gevonden.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>

                      