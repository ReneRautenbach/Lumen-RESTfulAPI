<?php

namespace App\Repository;

use Carbon\Carbon;
use Illuminate\Database\Connection; 
 
use Illuminate\Support\Facades\DB; 
use Auth; 
 
class Repository
{    
    
    public function __construct()
    { 
        
    }    

    public function getUser(){
        if(Auth::user()) return Auth::user()->id;
        return 0;
    }
}