<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Repository\BeerRepository;
use App\Services\UserBeerAuthService;
use App\Services\PagingService;
use Auth; 

class BeerController extends Controller
{
    
    private $userBeerAuthService;
    private $pagingService;
    private $beerRepo;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct(BeerRepository $beerRepository,  PagingService $pagingService, UserBeerAuthService $userBeerAuthService)
    { 
        $this->beerRepo = $beerRepository;
        $this->userBeerAuthService = $userBeerAuthService;
        $this->pagingService = $pagingService;
        $this->pagingService->setDefaultOrderBy('name');
    }
 
    public function getFilteredList(Request $request) { 
        
        $pagingArray = $this->pagingService->make($request);
        
        $beer = $this->beerRepo->all($pagingArray);  
        return $this->JSON_Response(true, trans('beer.success'), $beer, 200);  
    }

    public function get($beer_id) {   
        $beer = $this->beerRepo->get($beer_id);  
        return $this->JSON_Response(true, trans('beer.success'), $beer, 200);  
    }
 
    /**
     * Creates a beer is request parameters are valid and the user is allowed to create a beer.
     *
     * Available options: 
     * 
     * @param  array  $request  The request values received from the query string. 
     *
     * @return JSON_Response 
     *
     * @throws <b>ValidationException</b> If an error occurs while validating the request data
     */
    public function create(Request $request) {
         
        try {
                  
            if ($this->userBeerAuthService->can(Auth::user(), 'create')) {
                
                $this->validate($request, $this->rules());  
 
                $beer = $this->beerRepo->create( $request['name'], $request['ibu'], $request['calories'], $request['brewery'], $request['location'], $request['style_id']);
                return $this->JSON_Response(true, trans('beer.create-success'), $beer, 201); 
                
            } 
            else 
            {
                return $this->JSON_Response(false, trans('beer.create-limit') , null, 401);
            }
                
        }  
        catch(\Illuminate\Validation\ValidationException  $e){   
            return $this->JSON_Response(false, trans('beer.create-validationexception') , null, $e->status, $e->errors()); 
        }
        catch(Exception $e){   
            return $this->JSON_Response(false, trans('beer.create-exception') , null, 400, $e->errors()); 
        }

    }

    
    /**
     * Define the validation rules for a beer object.
     *
     * Available options: 
     *  
     * @return array $rules  
     * 
     */
    protected function rules() {

        return $rules = array( 
            'name' => 'required|unique:beers|string',
            'ibu' => 'required',
            'calories' => 'required',
            'abv' => 'required',
            'brewery' => 'required|string',
            'location' => 'required|string',
            'style_id' => 'required|integer' 
        );

    }

}
