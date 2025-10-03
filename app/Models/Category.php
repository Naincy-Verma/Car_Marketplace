<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status'
];

        public $timestamps = true;
        protected $table = 'categories';

    public function listings() {
        return $this->hasMany(Listing::class);
    }
}
