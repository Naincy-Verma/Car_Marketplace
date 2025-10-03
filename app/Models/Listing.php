<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'user_id'
        , 'category_id',
         'brand_id', 
         'model', 
         'year', 
         'price',
        'mileage',
         'location', 
         'fuel_type', 
         'transmission', 
         'condition',
        'description', 
        'is_featured', 
        'status'
    ];

    public $timestamps = true;
    protected $table = "listings";

    // Relationships
    public function user() {
        return $this->belongsTo(Customer::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
}
