<?php

namespace App\ViewModels;
 ;

/**
 * @SWG\Definition( 
 *   type="object",
 *   @SWG\Xml(name="ReviewTotalsViewModel")
 * )
 */ 

class ReviewTotalsViewModel
{    
    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $aroma_total;
    

    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $appearance_total;
    

    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $taste_total;
    

    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $palate_total; 

     
    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $overall_total; 
    
    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $number_of_ratings; 
}