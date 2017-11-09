<?php

namespace App\Repository;

use Carbon\Carbon;
use Illuminate\Database\Connection; 
use Illuminate\Support\Facades\DB;

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

        public function all($beer_id) { 
            return Review::where('beer_id', $beer_id)->get()->toArray();  
        }

        public function get($review_id) {
            return Review::find($review_id);
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

          public function getOverallReviewsByBeer() { 

            return  DB::table('reviews')
                        ->select(DB::raw('beer_id , count(*) as review_count, sum(aroma) as overall_aroma, 
                                        sum(appearance)  as overall_appearance, sum(taste) as overall_taste'))
                        ->groupBy('beer_id')
                        ->get();
          }
}