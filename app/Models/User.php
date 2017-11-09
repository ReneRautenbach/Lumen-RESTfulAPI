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
    * @SWG\Property(format="int64",type="integer", property="id", description="The unique user identifier.") 
    * @SWG\Property(type="string", property="name", description="The user name")
    * @SWG\Property(type="string",format="password" , property="password", description="The user password") 
    * @SWG\Property(format="email", type="string", property="email", description="The unique user email")
    * @SWG\Property(format="int32", type="integer", property="daily_beer_limit", description="The numbers of beers the user can add per day. Default value is 1.")
    * @SWG\Property(format="date-time", type="string", property="created_at", description="The date time the user was added")
    * @SWG\Property(format="date-time", type="string", property="updated_at", description="The date time the user was updated")
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