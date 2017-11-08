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
     * @SWG\Property(format="string")
     * @var string
     */
    public $name;
    

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

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $password_confirmation;
    
}