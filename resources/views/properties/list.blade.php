<x-guest-layout>
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Filter Section -->
                    <form action="{{ route('properties.list') }}" method="GET">
                        <!-- Add filters here -->
                        <div class="flex space-x-4 mb-4">
                            <!-- Example filter: Price Range -->
                            <div>
                                <label for="price_from">Price From:</label>
                                <input type="text" id="price_from" name="price_from">
                            </div>
                            <div>
                                <label for="price_to">Price To:</label>
                                <input type="text" id="price_to" name="price_to">
                            </div>
                            <!-- Add more filters as needed -->
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Filter</button>
                        </div>
                    </form>

                    <!-- Property Listing -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($properties as $property)
                            <div class="bg-gray-100 p-4 rounded-md shadow-md">
                                <!-- Property Details -->
                                <h3 class="text-lg font-semibold mb-2">{{ $property->title }} at
                                    {{ $property->place }}</h3>
                                <!-- Price -->
                                <p class="text-gray-700 mb-2">Price: ₹{{ number_format($property->price, 2) }}</p>
                                <!-- no of likes    -->
                                <!-- Like Button -->
                                <x-like-property :property="$property" />
                                <p class="text-gray-700 mb-2">Likes: {{ $property->likes->count() }} ❤️</p>
                                <!-- I'm Interested Button -->
                                <a href="{{ route('properties.show', $property->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">I'm
                                    Interested</a>
                                <!-- Image Section (commented out for future use) -->
                                {{-- <img src="{{ $property->image }}" alt="Property Image" class="mt-4"> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
