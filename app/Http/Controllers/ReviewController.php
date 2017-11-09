<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Repository\ReviewRepository;
use App\Repository\BeerRepository;
use App\Services\UserBeerReviewAuthService;
use Auth; 
 
class ReviewController extends Controller
{
    
    private $userBeerReviewAuthService;
    private $reviewRepo;
    private $beerRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BeerRepository $beerRepository, ReviewRepository $reviewRepository, UserBeerReviewAuthService $userBeerReviewAuthService)
    { 
        $this->reviewRepo = $reviewRepository;
        $this->beerRepo = $beerRepository;
        $this->userBeerReviewAuthService = $userBeerReviewAuthService;
    }

    public function getAll($beer_id) {
        
        $review = $this->reviewRepo->all($beer_id);  
        return $this->JSON_Response(true, trans('review.success'), $review, 200);  
        
    }

    public function get($review_id) {
        $review = $this->reviewRepo->get($review_id);  
        return $this->JSON_Response(true, trans('review.success'), $review, 200);  
    }

    public function getOverallReviewsByBeer() { 
        $review = $this->reviewRepo->getOverallReviewsByBeer();  
        return $this->JSON_Response(true, trans('review.success'), $review, 200);  
    }

    public function create(Request $request, $beer_id) {
        
       try {  

            $this->validate($request, [
                'aroma' => 'required|numeric|between:1,5',
                'appearance' => 'required|numeric|between:1,5',
                'taste' => 'required|numeric|between:1,10',
                ] 
            );  

            // Validates that the beer exists
           if (!$this->beerRepo->exists($beer_id)) {  
               return $this->JSON_Response(false, trans('review.create-notfound') , null, 404);
           } 

            // Validates that the user does not have an existing review
           if (!$this->userBeerReviewAuthService->can(Auth::user(), $beer_id))
            {
                return $this->JSON_Response(false, trans('review.create-limit') , null, 401);
            }
               
            $review = $this->reviewRepo->create( Auth::user()->id, $beer_id, $request['aroma'], $request['appearance'], $request['taste'] );
            return $this->JSON_Response(true, trans('review.create-success'), $review, 201); 
            
          
               
       }  
       catch(\Illuminate\Validation\ValidationException  $e){   
           return $this->JSON_Response(false, trans('review.create-validationexception') , null, $e->status, $e->errors()); 
       }
       catch(Exception $e){   
           return $this->JSON_Response(false, trans('review.create-exception') , null, 400, $e->errors()); 
       }

   }

 

}
