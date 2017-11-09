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
     * @SWG\Property(type="string", format="email", example="test@test.com")
     * @var string
     */
    public $email;
    

    /**
     * @SWG\Property(type="string", description="Required, minimum length=6", format="password", example="test12")
     * @var string
     */
    public $password;

    
}