<?php

namespace App\ViewModels;
 ;

/**
 * @SWG\Definition( 
 *   type="object",
 *   @SWG\Xml(name="StyleViewModel")
 * )
 */ 

class StyleViewModel
{     

    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $style_id;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $style;
    

    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $style_category_id;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $style_category;
    
    
 
}