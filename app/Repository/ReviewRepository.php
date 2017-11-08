<?php

namespace App\Repository;

use Carbon\Carbon;
use Illuminate\Database\Connection; 

use App\Models\Review; 
 
class ReviewRepository extends Repository
{      
        public function create( $user_id , $beer_id, $aroma, $appearance , $taste ) {
            
            $review = new Review();
            $review->beer_id =  $beer_id; 
            $review->user_id =  $user_id;
            $review->aroma =  $aroma; 
            $review->appearance =  $appearance; 
            $review->taste =  $taste;  
            $review->created_at =  Carbon::now();  
            
            $review->save();   
                    
            return $review;  
        }

        public function all($id) { 
            return Review::where('beer_id', $id)->get()->toArray();  
        }

        public function beerReviewedCountByUser($user_id, $beer_id) {
          
            return  Review::where('user_id', $user_id )
                    ->where('beer_id','=', $beer_id )
                    ->groupBy('user_id')
                    ->count(); 
        }

        public function beerReviewedSum($beer_id) {
            
              return  Review::where( 'beer_id','=', $beer_id )
                      ->groupBy('beer_id')
                      ->sum(); 
          }
}