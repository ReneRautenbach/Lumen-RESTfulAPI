<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Repository\ReviewRepository;
use App\Services\UserBeerReviewAuthService;
use Auth; 
 
class ReviewController extends Controller
{
    
    private $userBeerReviewAuthService;
    private $reviewRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReviewRepository $reviewRepository, UserBeerReviewAuthService $userBeerReviewAuthService)
    { 
        $this->reviewRepo = $reviewRepository;
        $this->userBeerReviewAuthService = $userBeerReviewAuthService;
    }

    public function getAll($id) {
        
        $review = $this->reviewRepo->all($id);  
        return $this->JSON_Response(true, trans('review.success'), $review, 200);  
        
    }

    public function create(Request $request, $id) {
        
       try { 

           if ($this->userBeerReviewAuthService->can(Auth::user(), $id)) {
               
               $this->validate($request, $this->rules());  

               $review = $this->reviewRepo->create( Auth::user()->id, $id, $request['aroma'], $request['appearance'], $request['taste'] );
               return $this->JSON_Response(true, trans('review.create-success'), $review, 201); 
               
           } 
           else 
           {
               return $this->JSON_Response(false, trans('review.create-limit') , null, 400);
           }
               
       }  
       catch(\Illuminate\Validation\ValidationException  $e){   
           return $this->JSON_Response(false, trans('review.create-validationexception') , null, $e->status, $e->errors()); 
       }
       catch(Exception $e){   
           return $this->JSON_Response(false, trans('review.create-exception') , null, 400, $e->errors()); 
       }

   }


      /**
     * Define the validation rules for a review object.
     *
     * Available options: 
     *  
     * @return array $rules  
     * 
     */
    protected function rules() {
        
        return $rules = array( 
            'aroma' => 'required|between:1,5',
            'appearance' => 'required|between:1,5',
            'taste' => 'required|between:1,10', 
        );
    }

}
