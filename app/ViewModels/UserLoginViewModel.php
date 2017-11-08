<?php

namespace App\ViewModels;
 ;

/**
 * @SWG\Definition(
 *   required={"email", "password"},
 *   type="object",
 *   @SWG\Xml(name="UserLoginViewModel")
 * )
 */ 

class UserLoginViewModel
{
   
    /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $email;
    

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $password;

    
}