<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransmissionType extends Model
{
        protected $fillable = [
        'name',
        'slug'
    ];

    public $timestamps = true;
    protected $table = 'transmission_types';

    public function listings()
    {
        return $this->hasMany(Listing::class, 'transmission_type_id', 'id');
    }
}
