<?php

namespace App\Services;
    
use App\Models\User;  
use App\Repository\BeerRepository;

class CalculationService
{   
    /*
    * minimum votes required to be listed in the top beers list
    * @var Integer
    */
    private $min_required = 2;

    /*
    * weighted average scale
    * @var Integer
    */
    private $weighted_scale = 5;

    /*
    * weighted average scale
    * @var Integer
    */
    private $overall_total = 20;

    function __construct(  )
    {    
    }
  
    /**
     *  
     * weighted rank (WR) = (v / (v+m)) * R + (m / (v+m)) * C 
     *
     * where:
     * R = average for the beer (mean) = (Rating)
     * v = number of reviews for the beer = (Rate Count)
     * m = minimum votes required to be listed in the top beers list (varies according to average of ratecounts for top 50 beers)
     * C = the midpoint of the scale (2.75 in our case)
     *  
     * @param  integer $review_count  The total number or reviews for the beer
     * @param  float  $average  The average  of the sum of the individual rating options (taste,appearance and aroma )
     *
     * @return float the weighted average of the beer ratings
     * 
     */

    public function getWeightedAverage($review_count, $average) {  
        
            return round( ($review_count/( $review_count + $this->weighted_scale )) * $this->convertedAverage($average) + ($this->weighted_scale/($review_count+$this->weighted_scale)) * ($this->weighted_scale/2) , 4);
    }

    public function getAverage($average) {
         return $average/$this->weightedRatio();
    }
    public function weightedRatio() {

        if($this->weighted_scale > 0) return $this->overall_total / $this->weighted_scale;
        return 1;        
    }

    public function convertedAverage($average) { 
        return $average/$this->weightedRatio();
    }

    public function getScale() {
        return $this->weighted_scale;
    }
}
