<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{

    /**
     * Fillable fields for a flyer.
     * 
     * @var array
     */
    protected $fillable = [
        'street',
        'city',
        'zip',
        'state',
        'country',
        'price',
        'description'
    ];

    /**
     * A flyer has many photos.
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    /**
     * Scope query for those flyers located at a given address.
     * @param  Builder $query  
     * @param  string $zip    
     * @param  string $street 
     * @return Builder         
     */
    public static function scopeLocatedAt($query, $zip, $street)
    {
        return $query->where(compact('zip', 'street'));
    }

    public function getPriceAttribute($price)
    {
        return '$' . number_format($price);
    }
}
