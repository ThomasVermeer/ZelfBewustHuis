<x-app-layout>
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-md rounded">
        <h1 class="text-4xl font-bold mb-6">Projects</h1>
    
        @forelse($projects as $project)
            <div class="bg-gray-100 p-6 mb-6 rounded">
                <h2 class="text-2xl font-bold mb-2">{{ $project->name }}</h2>
                <p class="text-gray-700">{{ $project->description }}</p>
                <p class="mt-2 text-sm text-gray-500">Status: {{ ucfirst($project->status) }}</p>
            </div>
        @empty
            <p class="text-gray-600">No projects found.</p>
        @endforelse
    </div>
</x-app-layout>