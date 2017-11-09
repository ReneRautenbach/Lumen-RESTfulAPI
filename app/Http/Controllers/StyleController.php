<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Repository\StyleRepository;  
use App\Services\PagingService;

class StyleController extends Controller
{
 
    private $styleRepo;
    private $pagingService;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct(StyleRepository $styleRepository,  PagingService $pagingService)
    { 
        $this->styleRepo = $styleRepository; 
        $this->pagingService = $pagingService;
        $this->pagingService->setDefaultOrderBy('style');
    }
 
    public function getFilteredList(Request $request) { 
        
        $pagingArray = $this->pagingService->make($request);
  
        $styles = $this->styleRepo->getFilteredList($pagingArray);
        return $this->JSON_Response(true, trans('beer.success'), $styles, 200);  
    }

}