<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyLikes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PropertyController extends Controller
{
    //

    public function list()
    {
        $properties = Property::all();
        return view('properties.list', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|string',
            'no_of_bedrooms' => 'required|integer',
            'no_of_bathrooms' => 'required|integer',
            'area_in_sqft' => 'required|string',
            'price' => 'required|integer',
            'place' => 'required|string',
            'extra_features' => 'nullable',
        ]);

        $property = new Property();
        $propertyId = Str::uuid()->toString();

        //generate a unique property id
        $property->property_id = $propertyId;
        $property->title = $request->name;
        $property->user_id = auth()->id();
        $property->price = $request->price;
        $property->no_of_bedrooms = $request->no_of_bedrooms;
        $property->no_of_bathrooms = $request->no_of_bathrooms;
        $property->area_in_sqft = $request->area_in_sqft;
        $property->place = $request->place;
        $property->extra_features = json_encode($request->extra_features);
        $property->save();

        return redirect()->route('dashboard');
    }

    public function like(Request $request)
    {
        // Retrieve the property using the property_id from the request
        $property = Property::findOrFail($request->property_id);

        $propertyId = $property->id;
        $userId = auth()->id();

        // Check if the property is already liked by the user
        if (PropertyLikes::where('user_id', $userId)->where('property_id', $propertyId)->exists()) {
            // If the property is already liked by the user, delete the like
            PropertyLikes::where('user_id', $userId)->where('property_id', $propertyId)->delete();
        } else {

            PropertyLikes::create([
                'user_id' => auth()->id(),
                'property_id' => $property->id,
            ]);
        }

        return back();
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show', compact('property'));
    }
}
