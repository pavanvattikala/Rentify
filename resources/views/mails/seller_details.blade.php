<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Details</title>
</head>

<body>
    <h1>Hello, {{ $user->name }}!</h1>
    <p>
        These are the details of the seller of the property you are interested in:
    </p>
    <h2>Seller Details:</h2>
    <ul>
        <li>Name: {{ $seller->firstName }}{{ $seller->lasttName }}</li>
        <li>Email: {{ $seller->email }}</li>
        <li>Phone: {{ $seller->mobile }}</li>
    </ul>

    <p>
        You can contact the seller using the above details.
    </p>

    <h2>Property Details:</h2>
    <ul>
        <li>Title: {{ $property->title }}</li>
        <li>Price: ₹{{ number_format($property->price, 2) }}</li>
        <li>Location: {{ $property->place }}</li>
        <li>Bedrooms: {{ $property->no_of_bedrooms }}</li>
        <li>Bathrooms: {{ $property->no_of_bathrooms }}</li>
        <li>Area: {{ $property->area_in_sqft }} sqft</li>
        <li>Extra Features:</li>
        <ul>
            @isset($property->extra_features)
                @foreach (json_decode($property->extra_features) as $extra_feature_key => $extra_feature_value)
                    <li>{{ $extra_feature_key }}: {{ $extra_feature_value }}</li>
                @endforeach
            @endisset
        </ul>

</body>

</html>
