<?php

namespace App\Repository;

use Carbon\Carbon;
use Illuminate\Database\Connection; 

use Illuminate\Support\Facades\DB;
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
            $beer->style_id =  $style;
            $beer->user_id =  $this->getUser();
            $beer->created_at =  Carbon::now(); 
                
            $beer->save();   
                    
            return $beer;  
        }

        public function all( $pagingParameters ) {  

            $query = DB::table('beers') 
            ->leftJoin('styles', 'styles.id', '=', 'beers.style_id')
            ->leftJoin('style_categories', 'styles.style_category_id', '=', 'style_categories.id');
            
            if($pagingParameters['filter']) { 
                 $query->orWhere('name', 'like', '%'.$pagingParameters['filter'].'%' ); 
                 $query->orWhere('brewery', 'like', '%'.$pagingParameters['filter'].'%' ); 
            }
 
            //TODO allow for desc optional
            $query->orderBy($pagingParameters['orderby'],$pagingParameters['orderbydirection']);
            $query->select('beers.*', 'styles.style','style_categories.style_category');
            
            if($pagingParameters['per_page'] == '0') {
                return $query->get();
            }else if($pagingParameters['per_page'] > 0) {  
                return $query->paginate($pagingParameters['per_page']);
            }

        }

        public function get($beer_id) {
            return Beer::find($beer_id); 
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

        public function exists($beer_id){
            if ( Beer::find($beer_id) === null ) return false;
            else return true; 
        }

}