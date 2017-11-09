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

          public function getOverallReviewsByBeer($beer_id='') { 

            $query = DB::table('reviews')
                        ->select(DB::raw('beer_id , sum(aroma+appearance+taste)/count(beer_id) as average, 
                                        count(beer_id) as review_count, sum(aroma) as aroma_total, 
                                        sum(appearance) as appearance_total, sum(taste) as taste_total')); 

            if($beer_id > 0) { 
                $query->where('beer_id', '=', $beer_id); 
            }

            $query->groupBy('beer_id');
            return $query->get()->toArray();
          }
}