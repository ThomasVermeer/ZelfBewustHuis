<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maak evenement aan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="mt-4">
                                <label for="name" class="font-bold">{{ __('Naam') }}</label>
                                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            </div>
                            <div class="mt-4">
                                <label for="description" class="font-bold">{{ __('Beschrijving') }}</label>
                                <textarea id="description" class="block mt-1 w-full" name="description" rows="4" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="event-grid">
                                <div class="mt-4">
                                    <label for="address" class="font-bold">{{ __('Adres') }}</label>
                                    <input id="address" type="text" name="address" class="block mt-1 w-full" placeholder="Straat + huisnummer">
                                </div>
                                <div class="mt-4">
                                    <label for="city" class="font-bold">{{ __('Plaats') }}</label>
                                    <input id="city" type="text" name="city" class="block mt-1 w-full">
                                </div>
                                <div class="mt-4">
                                    <label for="zipcode" class="font-bold">{{ __('Postcode') }}</label>
                                    <input id="zipcode" type="text" name="zipcode" class="block mt-1 w-full" placeholder="1234AB">
                                </div>
                            </div>
                            <div class="event-grid">
                                <div class="mt-4">
                                    <label for="date" class="font-bold">{{ __('Datum') }}</label>
                                    <input id="date" type="date" name="date" class="block mt-1 w-full">
                                </div>
                                <div class="mt-4">
                                    <label for="start_time" class="font-bold">{{ __('Start tijd') }}</label>
                                    <input id="start_time" type="time" name="start_time" class="block mt-1 w-full">
                                </div>
                                <div class="mt-4">
                                    <label for="end_time" class="font-bold">{{ __('Eind tijd') }}</label>
                                    <input id="end_time" type="time" name="end_time" class="block mt-1 w-full">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="image" class="font-bold">{{ __('Afbeelding') }}</label>
                                <input id="image" type="file" name="image" accept="image/*" class="block mt-1">
                            </div>
                        <div class="flex items-center justify-end mt-4">
                            <!-- Add debug statement for the form action -->
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Aanmaken') }}
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>