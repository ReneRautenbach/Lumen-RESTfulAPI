<?php

namespace App\Repository;

use Carbon\Carbon;
use Illuminate\Database\Connection; 

use App\Models\Beer; 
 
class BeerRepository extends Repository
{      
        public function create( $name, $ibu, $calories , $brewery , $location , $style ) {
            
            $beer = new Beer();
            $beer->name =  $name;
            $beer->ibu =  $ibu;
            $beer->calories =  $calories;
            $beer->brewery =  $brewery;
            $beer->location =  $location;
            $beer->style =  $style;
            $beer->user_id =  $this->getUser();
            $beer->created_at =  Carbon::now(); 
                
            $beer->save();   
                    
            return $beer;  
        }

        public function all() {
            return Beer::all();
        }

        public function dailyBeerCountByUser($user_id, $date=null) {
        
            if(is_null( $date ) ) { 
                $date = Carbon::today();
            } 
            
            return  Beer::where('user_id', $user_id )
                    ->whereDate('created_at','=', $date->toDateString() )
                    ->groupBy('user_id')
                    ->count(); 
        }

}