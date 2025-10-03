<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'status'
    ];


        public $timestamps = true;
        protected $table = 'brands';

    public function listings() {
        return $this->hasMany(Listing::class);
    }
}
