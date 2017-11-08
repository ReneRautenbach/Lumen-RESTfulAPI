<?php

namespace App\ViewModels;
 ;

/**
 * @SWG\Definition(
 *   required={"aroma","appearance","taste"},
 *   type="object",
 *   @SWG\Xml(name="ReviewViewModel")
 * )
 */ 

class ReviewViewModel
{
   
    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $aroma;
    

    /**
     * @SWG\Property(format="integer")
     * @var integer
     */  
    public $appearance;

    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $taste;

    
}