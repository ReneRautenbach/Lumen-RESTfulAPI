<?php

namespace App\ViewModels;
 ;

/**
 * @SWG\Definition(
 *   required={"aroma","appearance","taste"},
 *   type="object",
 *   @SWG\Xml(name="FilterViewModel")
 * )
 */ 

class FilterViewModel
{
   
    /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $filter;
    

    /**
     * @SWG\Property(format="integer")
     * @var integer
     */  
    public $page;

    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    public $per_page;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $orderby;
    
}