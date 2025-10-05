<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    //
    protected $fillable = [
        'name',
        'slug'
    ];

    public $timestamps = true;
    protected $table = 'fuel_types';

    public function listings()
    {
        return $this->hasMany(Listing::class, 'fuel_type_id', 'id');
    }
}
