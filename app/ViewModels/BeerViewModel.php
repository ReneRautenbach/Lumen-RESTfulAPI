<?php

namespace App\ViewModels;
 ;

/**
 * @SWG\Definition(
 *   required={"name", "ibu","calories","abv","brewery","location","style_id"},
 *   type="object",
 *   @SWG\Xml(name="BeerViewModel")
 * )
 */ 

class BeerViewModel
{    
    /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $name;
    

    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $ibu;
    

    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $calories;
    

    /**
     * @SWG\Property(format="float")
     * @var float
     */
    public $abv; 

     /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $brewery;
    
     /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $location;
    
     /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $style_id;
}