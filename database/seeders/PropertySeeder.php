<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $propertyOne  = new Property();
        $propertyOne->title = '3 BHK Flat';
        $propertyOne->property_id = Str::uuid()->toString();
        $propertyOne->user_id = 1;
        $propertyOne->no_of_bedrooms = 3;
        $propertyOne->no_of_bathrooms = 2;
        $propertyOne->area_in_sqft = '1500';
        $propertyOne->place = 'Bangalore';
        $propertyOne->extra_features = json_encode(["no_of_gyms" => 2, "no_of_swimming_pool" => 2]);
        $propertyOne->price = 10000000;
        $propertyOne->save();

        $propertyTwo  = new Property();
        $propertyTwo->title = '2 BHK Flat';
        $propertyTwo->property_id = Str::uuid()->toString();
        $propertyTwo->user_id = 1;
        $propertyTwo->no_of_bedrooms = 2;
        $propertyTwo->no_of_bathrooms = 2;
        $propertyTwo->area_in_sqft = '1200';
        $propertyTwo->place = 'Bangalore';
        $propertyOne->extra_features = json_encode(["no_of_gyms" => 2, "no_of_swimming_pool" => 2]);
        $propertyTwo->price = 8000000;
        $propertyTwo->save();
    }
}
