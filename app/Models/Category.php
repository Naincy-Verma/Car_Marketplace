<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image' ,
        'slug'
];

        public $timestamps = true;
        protected $table = 'categories';

    // Relationship: One Category has many Listings
    public function listings()
    {
        return $this->hasMany(Listing::class, 'category_id', 'id');
    }
}
