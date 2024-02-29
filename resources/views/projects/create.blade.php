<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf
                        <div>
                            <label for="name" class="font-bold">{{ __('Naam') }}</label>
                            <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="description" class="font-bold">{{ __('Beschrijving') }}</label>
                            <textarea id="description" class="block mt-1 w-full" name="description" rows="4" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mt-4">
                            <label for="status" class="font-bold">{{ __('Status') }}</label>
                            <select id="status" name="status" class="block mt-1 w-full" required>
                                <option value="inOntwikkeling">inOntwikkeling</option>
                                <option value="lopende">lopende</option>
                                <option value="gerealiseerd">gerealiseerd</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                {{ __('Aanmaken') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>