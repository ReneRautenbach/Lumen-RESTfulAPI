<?php

namespace App\Services;
    
use App\Models\User;  
use App\Repository\ReviewRepository;

class UserBeerReviewAuthService
{   
    private $reviewRepo; 

    function __construct( ReviewRepository $reviewRepository )
    {   
            $this->reviewRepo = $reviewRepository; 
    }
  
    /**
     * Check if the given user can perform a review on a beer.
     *  
     * @param  User $user  An User instance
     * @param  integer  $beer_id  Beer being reviewed 
     *
     * @return bool true, if user is allowed to perform the action, otherwise false
     * 
     */

    public function can(User $user,  $beer_id) { 
 
        if( $this->reviewRepo->beerReviewedCountByUser($user->id, $beer_id) < 1) {
            return true;
        }
        return false; 
 
    }

}
