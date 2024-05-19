<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'property_id',
        'user_id',
        'no_of_bedrooms',
        'no_of_bathrooms',
        'area_in_sqft',
        'place',
        'extra_features',
        'price',
    ];

    public function likes()
    {
        return $this->belongsToMany(User::class, 'property_likes');
    }
}
