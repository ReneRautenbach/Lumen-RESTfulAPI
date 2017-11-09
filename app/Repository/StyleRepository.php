<?php

namespace App\Repository;

use Carbon\Carbon;
use Illuminate\Database\Connection; 
use Illuminate\Support\Facades\DB;

use App\Models\Style; 
 
class StyleRepository extends Repository
{      
        public function create( $style, $style_category) {
            
            $style = new Style();
            $style->style =  $style;
            $style->style_category =  $style_category; 
                
            $style->save();   
                    
            return $style;  
        }

        public function getFilteredList($pagingParameters) { 
       
            $query = DB::table('styles') 
                     ->leftJoin('style_categories', 'styles.style_category_id', '=', 'style_categories.id');  
            
            if($pagingParameters['filter']) { 
                $query->orWhere('style', 'like', '%'.$pagingParameters['filter'].'%' ); 
                $query->orWhere('style_category', 'like', '%'.$pagingParameters['filter'].'%' ); 
           } 
 
            $query->orderBy($pagingParameters['orderby'],$pagingParameters['orderbydirection']);
            
            $query->select('styles.id', 'styles.style','style_categories.style_category');
 
            if($pagingParameters['per_page'] == '0') {
                return $query->get();
            }else if($pagingParameters['per_page'] > 0) {  
                return $query->paginate($pagingParameters['per_page']);
            }

        }

        public function get($id) {
            return Style::find($id);
        }
 

        public function exists($id){
            if ( Style::find($id) === null ) return false;
            else return true; 
        }

}