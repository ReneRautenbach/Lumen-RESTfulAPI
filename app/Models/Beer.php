<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model; 


/**
 * @SWG\Definition(
 *   required={"name", "ibu","calories","user_id","abv","brewery","location","style"},
 *   type="object",
 *   @SWG\Xml(name="Beer")
 * )
 */ 

class Beer extends Model
{ 
    /** 
    * @SWG\Property(format="int64", property="id", description="The beer unique identifier.")
    * @SWG\Property(format="string", property="name", description="The beer name.")
    * @SWG\Property(format="int32", property="ibu", description="The beer International Bitterness Units scale value.")
    * @SWG\Property(format="int32", property="calories", description="The beer name.")
    * @SWG\Property(format="float", property="abv", description="The beer Alcohol By Volume value.")
    * @SWG\Property(format="string", property="brewery", description="The brewery name.")
    * @SWG\Property(format="string", property="location", description="The brewery location.")
    * @SWG\Property(format="string", property="style", description="The beer style.") 
    * @SWG\Property(format="int64", property="user_id", description="The user who added the beer")
    * @SWG\Property(format="date-time", property="created_at", description="The date time the beer was added")
    * @SWG\Property(format="date-time", property="updated_at", description="The date time the beer was updated")
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
        'style'
    ];

      /**
     * Get the user that owns the beer.
     */
    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    } 

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

 
}
