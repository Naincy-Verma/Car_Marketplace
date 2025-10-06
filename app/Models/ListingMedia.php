<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingMedia extends Model
{
    // Table name (optional if follows Laravel convention)
    protected $table = 'listing_medias';

    // Mass assignable fields
    protected $fillable = [
        'listing_id',
        'type',
        'file_path',
        'video_url',
    ];

    public $timestamps = true;

    /**
     * Relationship: A ListingMedia belongs to a Listing
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
