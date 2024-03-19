<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bewerk project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="font-bold">{{ __('Naam') }}</label>
                            <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $project->name }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="description" class="font-bold">{{ __('Beschrijving') }}</label>
                            <textarea id="description" class="block mt-1 w-full" name="description" rows="4" required>{{ $project->description }}</textarea>
                        </div>

                        <div class="mt-4">
                            <label for="status" class="font-bold">{{ __('Status') }}</label>
                            <select id="status" name="status" class="block mt-1 w-full" required>
                                <option value="inDevelopment" {{ $project->status === 'inDevelopment' ? 'selected' : '' }}>inDevelopment</option>
                                <option value="ongoing" {{ $project->status === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="realised" {{ $project->status === 'realised' ? 'selected' : '' }}>Realised</option>
                            </select>

                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                {{ __('bijwerken') }}
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
