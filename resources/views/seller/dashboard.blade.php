<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Listed Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-8 p-2 m-2 btn bg-green-400 w-48 rounded">
                    <a href="{{ route('properties.create') }}" class="text-blue-500">{{ __('Create New Property') }}</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Your Properties') }}</h3>
                    <!-- List of Seller Properties -->
                    <table class="w-full text-center">
                        <thead>
                            <tr>
                                <th>Property ID</th>
                                <th>Title</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sellerProperties as $property)
                                <tr>
                                    <td>{{ $property->id }}</td>
                                    <td>{{ $property->title }}</td>
                                    <td>
                                        <a href="{{ route('properties.edit', $property->id) }}">Edit</a>

                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('properties.destroy', $property->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
