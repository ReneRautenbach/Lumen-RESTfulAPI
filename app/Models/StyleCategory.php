<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model; 


/**
 * @SWG\Definition(
 *   definition="StyleCategory",
 *   type="object",
 *   required={"style_category"},
 *   type="object",
 *   @SWG\Xml(name="StyleCategory")
 * )
 */  


class StyleCategory extends Model
{ 
    /** 
    * @SWG\Property(format="int64", type="integer", property="id", description="The style category unique identifier.")
    * @SWG\Property(type="string", property="style_category", description="The style category.") 
     */ 

     /*
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'style_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'style_category', 
    ]; 

    /**
     * Many style_category can describe many styles.
     */
    public function styles()
    {
        return $this->hasMany('App\Models\Style');
    }

 
}
