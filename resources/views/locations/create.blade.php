<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maak locatie aan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('locations.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="city" class="font-bold">{{ __('Stad') }}</label>
                            <input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus />
                        </div>
                    
                        <div class="mt-4">
                            <label for="street" class="font-bold">{{ __('Straat') }}</label>
                            <input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required />
                        </div>
                    
                        <div class="mt-4">
                            <label for="number" class="font-bold">{{ __('Nummer') }}</label>
                            <input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required />
                        </div>
                    
                        <div class="mt-4">
                            <label for="image" class="font-bold">{{ __('Afbeelding') }}</label>
                            <input id="image" type="file" name="image" accept="image/*" class="block mt-1">
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
