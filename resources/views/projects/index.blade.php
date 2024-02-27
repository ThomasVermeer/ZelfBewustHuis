<x-app-layout>
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-md rounded">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold">Projects</h1>
            <div class="space-x-4">
                <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create</a>
            </div>
        </div>
    
        @forelse($projects as $project)
            <div class="bg-gray-100 p-6 mb-6 rounded">
                <h2 class="text-2xl font-bold mb-2">{{ $project->name }}</h2>
                <p class="text-gray-700">{{ $project->description }}</p>
                <p class="mt-2 text-sm text-gray-500">Status: {{ ucfirst($project->status) }}</p>

                <div class="mt-4 flex space-x-2">
                    <a href="{{ route('projects.edit', $project->id) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this project?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-600">No projects found.</p>
        @endforelse
    </div>
</x-app-layout>
