<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @SWG\Definition(
 *   required={"name", "email","password"},
 *   type="object",
 *   @SWG\Xml(name="User")
 * )
 */ 

class User extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{

    /** 
    * @SWG\Property(format="int64", property="id", description="The unique user identifier.") 
    * @SWG\Property(format="string", property="name", description="The user name")
    * @SWG\Property(format="password", property="password", description="The user password") 
    * @SWG\Property(format="email", property="email", description="The unique user email")
    * @SWG\Property(format="int32", property="daily_beer_limit", description="The numbers of beers the user can add per day.")
    * @SWG\Property(format="date-time", property="created_at", description="The date time the user was added")
    * @SWG\Property(format="date-time", property="updated_at", description="The date time the user was updated")
    */ 

    use Authenticatable, Authorizable;
 
    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = app('hash')->make($value);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return ['email' => $this->email,'user_id'=> $this->id];
    }


    public function beers()
    {
        return $this->hasMany('App\Models\Beer');
    } 

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
 
}