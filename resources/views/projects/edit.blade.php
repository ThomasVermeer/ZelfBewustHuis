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
                            <textarea id="description" class="block mt-2 mb-2 w-full" name="description" rows="4" required>{{ $project->description }}</textarea>
                        </div>
                        <div class="mt-4">
                            <label for="image" class="font-bold">{{ __('Afbeelding') }}</label>
                            @if ($project->image)
                            <img src="{{ asset($project->image) }}" alt="{{ $project->name }}" style="max-width: 300px; max-height: 300px;">
                            @else
                                <p>Geen afbeelding beschikbaar</p>
                            @endif
                            <input id="image" type="file" name="image" accept="image/*" class="block mt-1">
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                {{ __('Opslaan') }}
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
