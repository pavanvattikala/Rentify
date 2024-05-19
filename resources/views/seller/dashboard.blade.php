<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Listed Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Your Properties') }}</h3>
                    <!-- List of Seller Properties -->
                    <ul>
                        @foreach ($sellerProperties as $property)
                            <li>{{ $property->title }} - <a href="{{ route('properties.edit', $property->id) }}">Edit</a>
                                |
                                <form method="POST" action="{{ route('properties.destroy', $property->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-8">
                        <a href="{{ route('properties.create') }}"
                            class="text-blue-500">{{ __('Create New Property') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
