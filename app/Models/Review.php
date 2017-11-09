<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model; 

/**
 * @SWG\Definition(required={"aroma", "appearance","taste","user_id","beer_id"}, type="object", @SWG\Xml(name="Review"))
 */

class Review extends Model
{  

    /** 
    * @SWG\Property(format="int64",type="integer", property="id", description="The review unique identifier.") 
    * @SWG\Property(format="int64",type="integer", property="user_id", description="The user who added the review")
    * @SWG\Property(format="int64",type="integer", property="beer_id", description="The beer being reviewed")
    * @SWG\Property(format="int32",type="integer", property="aroma", description="The beer aroma review value between 1 and 5")
    * @SWG\Property(format="int32",type="integer", property="appearance", description="The beer appearance review value between 1 and 5")
    * @SWG\Property(format="int32",type="integer", property="taste", description="The beer taste review value between 1 and 10") 
    * @SWG\Property(format="date-time",type="string", property="created_at", description="The date time the review was added")
    * @SWG\Property(format="date-time",type="string", property="updated_at", description="The date time the review was updated")
    */ 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'aroma', 
        'appearance', 
        'taste'
    ];

  
    /**
     * Get the user that added the beer.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    } 
    public function beer()
    {
        return $this->belongsTo('App\Models\Beer');
    } 
  

} 


 
