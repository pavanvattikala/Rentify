<?php

namespace App\Http\Controllers;

use App\Mail\SellerDetails;
use App\Models\Property;
use App\Models\PropertyLikes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class PropertyController extends Controller
{
    //

    public function list(Request $request)
    {
        $query = Property::query();

        // Apply filters if they are present in the request
        if ($request->has('price_from') && $request->price_from != '') {
            $query->where('price', '>=', $request->price_from);
        }

        if ($request->has('price_to') && $request->price_to != '') {
            $query->where('price', '<=', $request->price_to);
        }

        $properties = $query->get();

        return view('properties.list', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function insert(Request $request)
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
        $user = auth()->user();
        $seller = User::findOrFail($property->user_id);
        $sessionKey = 'email_sent_for_property_' . $property->id . '_to_user_' . $user->id;

        if (!session()->has($sessionKey)) {
            Mail::to($user->email)->send(new SellerDetails($user, $property, $seller));
            session()->put($sessionKey, true);
        }

        return view('properties.show', compact('property'));
    }


    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }


    public function update(Request $request, Property $property)
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

        $property->title = $request->name;
        $property->price = $request->price;
        $property->no_of_bedrooms = $request->no_of_bedrooms;
        $property->no_of_bathrooms = $request->no_of_bathrooms;
        $property->area_in_sqft = $request->area_in_sqft;
        $property->place = $request->place;

        $property->extra_features = json_encode($request->extra_features);
        $property->save();

        return redirect()->route('dashboard');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('dashboard');
    }
}
