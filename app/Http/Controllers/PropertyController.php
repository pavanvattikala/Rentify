<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PropertyController extends Controller
{
    //

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_of_bedrooms' => 'required|integer',
            'no_of_bathrooms' => 'required|integer',
            'area_in_sqft' => 'required|string',
            'place' => 'required|string',
            'extra_features' => 'nullable',
        ]);

        $property = new Property();
        $propertyId = Str::uuid()->toString();

        //generate a unique property id
        $property->property_id = $propertyId;
        $property->user_id = auth()->id();
        $property->no_of_bedrooms = $request->no_of_bedrooms;
        $property->no_of_bathrooms = $request->no_of_bathrooms;
        $property->area_in_sqft = $request->area_in_sqft;
        $property->place = $request->place;
        $property->extra_features = json_encode($request->extra_features);
        $property->save();

        return redirect()->route('dashboard');
    }
}
