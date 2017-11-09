<?php

Namespace App\Services;

class PagingService {

    private $defaultPage= 1;
    private $defaultPerPage = 15;
    //ASSUMPTION ALL TABLES HAVE AN id
    private $defaultOrderBy = 'id';
    private $defaultOrderByDirection = 'asc';
 
    public function __construct() {
    }

    public function make($request) {
        $pageAr['page'] = $request->has('page') ? $request["page"] : $this->defaultPage;
        $pageAr['per_page'] = $request->has('per_page') ? $request["per_page"] : $this->defaultPerPage;
        $pageAr['filter'] = $request->has('filter') ? $request["filter"] : "";
        $pageAr['orderby'] = $request->has('orderby') ? $request["orderby"] : $this->defaultOrderBy; 
          
        $pageAr['orderbydirection'] = $request->has('orderbydirection') ? $request["orderbydirection"] :  $this->defaultOrderByDirection;  
        return $pageAr;
    }

    public function setDefaultOrderBy($value ) { 
        // TODO validate these are valid model values
        $this->defaultOrderBy = $value;
    }
    
    public function setDefaultOrderByDirection($value ) {
        if($value == 'asc' or $value == 'desc')
        $this->defaultOrderByDirection = $value;
    }
    
    public function setDefaultPage($value ) { 
        $this->defaultPage = $value;
    }
    
    public function setDefaultPerPage($value ) { 
        $this->defaultPerPage = $value;
    }

}

?>