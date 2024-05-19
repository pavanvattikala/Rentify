<form action="{{ route('properties.like', ['property_id' => $property->id]) }}" method="POST">
    @csrf
    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-2">Like</button>
</form>
