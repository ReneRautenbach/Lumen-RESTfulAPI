<?php

namespace App\Services;
    
use App\Models\User;  
use App\Repository\BeerRepository;

class UserBeerAuthService
{   
    private $beerRepo; 

    function __construct( BeerRepository $beerRepository )
    {   
            $this->beerRepo = $beerRepository; 
    }
  
    /**
     * Check if the given user can perform the given action, based on business rules defined.
     *  
     * @param  User $user  An User instance
     * @param  string  $action  An string describing a valid action for beers 
     *
     * @return bool true, if user is allowed to perform the action, otherwise false
     * 
     */

    public function can(User $user, $action) { 

        switch ($action) {
            case 'create' :   
                 if( $this->beerRepo->dailyBeerCountByUser($user->id) < $user->daily_beer_limit){
                     return true;
                 }
                 return false;
            break;
            
            case 'edit' :  
                return false;
            break; 
            
            case 'review' :  
                return false;
            break;
            
            default : 
                return false;

        }
    }

}
