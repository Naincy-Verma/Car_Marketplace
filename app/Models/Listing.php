<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'brand_id', 
        'model_id', 
        'years_id', 
        'fuel_type_id', 
        'transmission_type_id', 
        'location_id', 
        'mileage',
        'price',
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

    public function model() {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function year() {
        return $this->belongsTo(Year::class, 'years_id');
    }

    public function fuelType() {
        return $this->belongsTo(FuelType::class);
    }

    public function transmissionType() {
        return $this->belongsTo(TransmissionType::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function media() {
        return $this->hasMany(ListingMedia::class);
    }
}
