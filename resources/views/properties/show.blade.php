<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Property Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-semibold">{{ $property->title }}</h2>
                        <!-- Like Button -->
                        <x-like-property :property="$property" />

                    </div>
                    <p class="text-gray-600 mb-4">{{ $property->description }}</p>
                    <!-- Property Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="font-semibold">Price:</p>
                            <p>{{ $property->price }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Location:</p>
                            <p>{{ $property->place }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Bedrooms:</p>
                            <p>{{ $property->no_of_bathrooms }}</p>

                        </div>
                        <div>
                            <p class="font-semibold">Bathrooms:</p>
                            <p>{{ $property->no_of_bathrooms }}</p>
                        </div>

                        <!-- additional fields -->

                        @isset($property->extra_features)
                            @foreach (json_decode($property->extra_features) as $extra_feature_key => $extra_feature_value)
                                <div>
                                    <p class="font-semibold">{{ $extra_feature_key }}:</p>
                                    <p>{{ $extra_feature_value }}</p>
                                </div>
                            @endforeach
                        @endisset



                        <!-- Image Section (commented out for future use) -->
                        {{-- <div class="mt-4">
                        <img src="{{ $property->image }}" alt="Property Image" class="w-full h-auto rounded">
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
