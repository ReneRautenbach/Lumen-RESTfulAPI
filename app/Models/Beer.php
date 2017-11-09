<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model; 


/**
 * @SWG\Definition(
 *   definition="Beer",
 *   type="object",
 *   required={"name", "ibu","calories","user_id","abv","brewery","location","style"},
 *   type="object",
 *   @SWG\Xml(name="Beer")
 * )
 */  


class Beer extends Model
{ 
    /** 
    * @SWG\Property(format="int64", type="integer", property="id", description="The beer unique identifier.")
    * @SWG\Property(type="string", property="name", description="The beer name.")
    * @SWG\Property(format="int32",type="integer", property="ibu", description="The beer International Bitterness Units scale value.")
    * @SWG\Property(format="int32", type="integer",property="calories", description="The beer name.")
    * @SWG\Property(format="float",type="number", property="abv", description="The beer Alcohol By Volume value.")
    * @SWG\Property(type="string",property="brewery", description="The brewery name.")
    * @SWG\Property(type="string",property="location", description="The brewery location.")
    * @SWG\Property(type="integer",format="int32",property="style_id", description="The beer style.") 
    * @SWG\Property(format="int64", type="integer",property="user_id", description="The user who added the beer")
    * @SWG\Property(format="date-time", type="string", property="created_at", description="The date time the beer was added")
    * @SWG\Property(format="date-time", type="string", property="updated_at", description="The date time the beer was updated")
    */ 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'ibu', 
        'calories', 
        'abv', 
        'brewery', 
        'location', 
        'style_id'
    ];

      /**
     * Get the user that owns the beer.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    } 

     /**
     * Get the style of the beer.
     */
    public function style()
    {
        return $this->belongsTo('App\Models\Style');
    } 

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

 
}
