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

    // Relationship: One Brand has many Listings
    public function listings()
    {
        return $this->hasMany(Listing::class, 'brand_id', 'id');
    }
}
