<?php

namespace App;

use App\Flyer;
use Illuminate\Database\Eloquent\hasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user may upload many flyers;
     * @return Illuminate\Database\Eloquent\hasMany
     */
    public function flyers()
    {
        return $this->hasMany(Flyer::class);
    }

	/**
     * Determine if the current user owns the submitted object.
     * 
     * @param         $relation 
     * @return boolean           
     */
    public function owns($relation)
    {
        return $relation->user_id == $this->id;
    }

    /**
     * Create a new flyer owned by the current user.
     * @param  Flyer  $flyer 
     * @return Flyer        
     */
    public function createsFlyer(Flyer $flyer)
    {
        return $this->flyers()->save($flyer);
    }
}
