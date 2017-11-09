<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model; 


/**
 * @SWG\Definition(
 *   definition="Style",
 *   type="object",
 *   required={"style"},
 *   type="object",
 *   @SWG\Xml(name="Style")
 * )
 */  


class Style extends Model
{ 
    /** 
    * @SWG\Property(format="int64", type="integer", property="id", description="The style unique identifier.")
    * @SWG\Property(type="string", property="style", description="The style name.")
    * @SWG\Property(format="int32",type="integer", property="style_category_id", description="The category of the style.")
     */ 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'style', 
        'style_category_id', 
    ];

    /**
     * The style has a style_category.
     */
    public function style_category()
    {
        return $this->belongsTo(App\Models\StyleCategory::class);
    } 

    /**
     * Many beers can have the style.
     */
    public function beers()
    {
        return $this->hasMany(App\Models\Beer::class);
    }

 
}
