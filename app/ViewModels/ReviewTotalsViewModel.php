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
     * @SWG\Property(format="float")
     * @var float
     */
    public $weighted_average;
    

    /**
     * @SWG\Property(format="float")
     * @var float
     */
    public $mean_average;
    

    /**
     * @SWG\Property(format="float")
     * @var float
     */
    public $scale;
     
    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $number_of_ratings; 

     
}