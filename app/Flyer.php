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
        'description',
        'user_id'
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
     * A flyer is owned by a single user.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Determines if the given user owns the flyer.
     * 
     * @param  User   $user 
     * @return boolean       
     */
    public function ownedBy(User $user)
    {
        return $this->user_id == $user->id;
    }

    /**
     * Get the flyers located at a given address.
     * 
     * @param  string $zip    
     * @param  string $street 
     * @return Builder         
     */
    public static function locatedAt($zip, $street)
    {
        $street = str_replace('-', ' ', $street);
        
        return static::where(compact('zip', 'street'))->firstOrFail();
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    /**
     * Format the price attribute.
     * 
     * @param  string $price 
     * @return string        
     */
    public function getPriceAttribute($price)
    {
        return '$' . number_format($price);
    }

    /**
     * Format the street address for cleaner URIs.
     * 
     * @return string
     */
    public function getSlugAttribute()
    {
        return str_replace(' ', '-', $this->street);
    }
}
