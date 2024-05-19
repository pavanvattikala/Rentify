<x-app-layout>

    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10 bg-white p-5 rounded shadow-md">
            <h2 class="text-2xl font-semibold mb-5">Create Property</h2>

            @if ($errors->any())
                <div class="mb-5">
                    <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('properties.store') }}" class="space-y-4" id="propertyForm">
                @csrf

                <div>
                    <label for="name" class="block">Name:</label>
                    <input type="text" name="name" id="name" class="form-input mt-1 block w-full"
                        value="{{ old('name') }}" required autofocus>
                </div>

                <div>
                    <label for="no_of_bedrooms" class="block">Number of Bedrooms:</label>
                    <input type="number" name="no_of_bedrooms" id="no_of_bedrooms" class="form-input mt-1 block w-full"
                        value="{{ old('no_of_bedrooms') }}" required>
                </div>

                <div>
                    <label for="no_of_bathrooms" class="block">Number of Bathrooms:</label>
                    <input type="number" name="no_of_bathrooms" id="no_of_bathrooms"
                        class="form-input mt-1 block w-full" value="{{ old('no_of_bathrooms') }}" required>
                </div>

                <div>
                    <label for="area_in_sqft" class="block">Area in Sqft:</label>
                    <input type="text" name="area_in_sqft" id="area_in_sqft" class="form-input mt-1 block w-full"
                        value="{{ old('area_in_sqft') }}" required>
                </div>

                <div>
                    <label for="place" class="block">Place:</label>
                    <input type="text" name="place" id="place" class="form-input mt-1 block w-full"
                        value="{{ old('place') }}" required>
                </div>

                <div id="extraFeaturesContainer">
                    <!-- Dynamic input fields for extra features will be appended here -->
                </div>

                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    id="addFeatureBtn">Add Feature</button>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create
                        Property</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counter for dynamically added input fields
            let counter = 0;

            // Function to add new input fields for extra features
            function addFeatureInput() {
                const container = document.getElementById('extraFeaturesContainer');
                const inputGroup = document.createElement('div');
                inputGroup.classList.add('mt-4', 'flex', 'space-x-4');

                const keyInput = document.createElement('input');
                keyInput.setAttribute('type', 'text');
                keyInput.setAttribute('name', `extra_features[${counter}][key]`);
                keyInput.setAttribute('class', 'form-input w-1/2');
                keyInput.setAttribute('placeholder', 'Key');
                inputGroup.appendChild(keyInput);

                const valueInput = document.createElement('input');
                valueInput.setAttribute('type', 'text');
                valueInput.setAttribute('name', `extra_features[${counter}][value]`);
                valueInput.setAttribute('class', 'form-input w-1/2');
                valueInput.setAttribute('placeholder', 'Value');
                inputGroup.appendChild(valueInput);

                container.appendChild(inputGroup);

                counter++;
            }

            // Add event listener to the 'Add Feature' button
            document.getElementById('addFeatureBtn').addEventListener('click', function() {
                addFeatureInput();
            });

            // Add event listener for changes in input fields inside the container
            document.getElementById('extraFeaturesContainer').addEventListener('change', function(event) {
                const input = event.target;
                if (input.tagName === 'INPUT') {
                    let value = input.value;
                    value = value.trim().toLowerCase();
                    // replace " " with "_" and remove all special characters
                    value = value.replace(/\s+/g, '_').replace(/[^a-zA-Z0-9_]/g, '');
                    input.value = value;
                }
            });
        });
    </script>

</x-app-layout>
