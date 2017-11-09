<?php

namespace App\ViewModels;
 ;

/**
 * @SWG\Definition(
 *   required={"name", "email", "password"},
 *   type="object",
 *   @SWG\Xml(name="UserRegisterViewModel")
 * )
 */ 

class UserRegisterViewModel
{

    /**
     * @SWG\Property(type="string", example="test2")
     * @var string
     */
    public $name;
    

    /**
     * @SWG\Property(type="string", format="email", example="test2@test.com")
     * @var string
     */
    public $email;
    

    /**
     * @SWG\Property(type="string", description="Required, minimum length=6", format="password", example="test12")
     * @var string
     */
    public $password;

    /**
     * @SWG\Property(type="string",  description="Required, minimum length=6" ,format="password", example="test12")
     * @var string
     */
    public $password_confirmation;
    
}