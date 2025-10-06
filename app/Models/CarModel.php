<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    //
    protected $fillable =[
        'name',
        'slug',
    ];

    public $timestamps = true;
    protected $table = 'carmodels';

    public function listings()
    {
        return $this->hasMany(Listing::class, 'model_id', 'id');
    }

}
