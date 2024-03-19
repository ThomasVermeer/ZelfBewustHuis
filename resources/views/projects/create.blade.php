<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-md mx-auto px-4">
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-6">
                    <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                            <input id="name" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                    
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                            <textarea id="description" class="form-textarea mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="description" rows="4" required>{{ old('description') }}</textarea>
                        </div>
                    
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                            <select id="status" name="status" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                <option value="inDevelopment">{{ __('In Development') }}</option>
                                <option value="onGoing">{{ __('Ongoing') }}</option>
                                <option value="realised">{{ __('Realised') }}</option>
                            </select>
                        </div>
                    
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">{{ __('Image') }}</label>
                            <input id="image" type="file" name="image" accept="image/*" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
