<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'image',
        'slug'
    ];


        public $timestamps = true;
        protected $table = 'brands';

   // Relationship: One Category has many Listings
    public function brands()
    {
        return $this->hasMany(Brand::class, 'brand_id', 'id');
    }
}
