<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
         'category_id',
         'brand_id', 
         'model_id', 
         'year_id', 
         'fuel_type_id', 
         'transmission_type_id', 
        'location_id', 
        'mileage',
         'price',
        'mileage',
         'condition',
        'description', 
        'listing_type', 
        'status'
    ];

    public $timestamps = true;
    protected $table = "listings";

    // Relationships
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
}
