<?php
/**
 *  
* @SWG\Post(
 *     path="/styles",
 *     summary="Filtered list of styles",
 *     description="Returns filtered list of beer styles",
 *     operationId="getStyles",
 *     tags={"4. Style"},
 *     produces={"application/json"},
 * 
 *     @SWG\Parameter(
 *         name="filter",
 *         in="query",
 *         description="Filter by style description.",
 *         required=false,
 *         type="string"
 *     ),   
 *     @SWG\Parameter(
 *         name="page",
 *         in="query",
 *         description="Page number to return",
 *         required=false,
 *         type="integer"  
 *     ),  
 * 
 *     @SWG\Parameter(
 *         name="per_page",
 *         in="query",
 *         description="Number of result per page to return.",
 *         required=false,
 *         type="integer" 
 *     ),  
 *     @SWG\Parameter(
 *         name="orderbydirection",
 *         in="query",
 *         description="Sort direction asc or desc.",
 *         required=false,
 *         type="string" 
 *     ),  
 *  
 *     @SWG\Response(
 *         response=201,
 *         description="successful operation",
 *         @SWG\Schema(
 *             type="array",
 *             @SWG\Items( 
 *                 type="object",
 *                 @SWG\Property(property="success", type="boolean"),
 *                 @SWG\Property(property="message", type="string") ,
 *                 @SWG\Property(property="data", type="array",  
 *                          @SWG\Items( 
 *                           @SWG\Property(property="current_page", type="integer") , 
 *                           @SWG\Property(property="data", ref="#/definitions/StyleViewModel"), 
 *                           @SWG\Property(property="first_page_url", type="string") , 
 *                           @SWG\Property(property="from", type="integer") , 
 *                           @SWG\Property(property="last_page", type="integer") , 
 *                           @SWG\Property(property="last_page_url", type="string") , 
 *                           @SWG\Property(property="next_page_url", type="string") , 
 *                           @SWG\Property(property="path", type="string") , 
 *                           @SWG\Property(property="per_page", type="integer") , 
 *                           @SWG\Property(property="prev_page_url", type="string") , 
 *                           @SWG\Property(property="to", type="integer")  ,
 *                           @SWG\Property(property="total", type="integer")  
 *                          )
 *                  ),
 *                 @SWG\Property(property="error", type="string")
 *            )
 *         ),
 *     )
 * ) 
 */