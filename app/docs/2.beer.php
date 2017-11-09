<?php
/**
 *  
* @SWG\Get( path="/beers",
 *     summary="List all Beers",
 *     description="Returns a list of beers",
 *     operationId="getAllBeers",
 *     tags={"2. Beer"},
 *     produces={"application/json"},

 *     @SWG\Parameter(
 *         name="filter",
 *         in="query",
 *         description="Filter by beer name and brewery.",
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
 *  
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
 *                           @SWG\Property(property="data", ref="#/definitions/Beer"), 
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
 * 
* @SWG\Get( path="/beers/{beer_id}",
 *     summary="Return the beer with the given id",
 *     description="Return the beer with given id",
 *     operationId="getBeer",
 *     tags={"2. Beer"},
 *     produces={"application/json"}, 
 *      @SWG\Parameter(
 *         name="beer_id",
 *         in="path",
 *         description="The Id of the beer",
 *         required=true,
 *         type="integer", 
 *     ),  
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         @SWG\Schema(
 *             type="array",
 *             @SWG\Items(
 *                 type="object",
 *                 @SWG\Property(property="success", type="boolean"),
 *                 @SWG\Property(property="message", type="string") ,
 *                 @SWG\Property(property="data", ref="#/definitions/Beer"),
 *                 @SWG\Property(property="error", type="string")
 *            )
 *         ),
 *     )
 * ) 
 * 
* @SWG\Post( path="/beers",
 *     summary="Add Beer",
 *     description="Creates a beer if request parameters are valid and the user is allowed to create a beer.",
 *     operationId="createBeer",
 *     tags={"2. Beer"},
 *     produces={"application/json"},  
 *     @SWG\Parameter(
 *         name="Authorization",
 *         in="header",
 *         description="Token to be passed as a header. Use login or register to get the token.Format: Bearer xxxxxx",
 *         required=true,
 *         type="string",
 *         @SWG\Items(type="string") 
 *        
 *     ), 
 *     @SWG\Parameter(
 *         name="body",
 *         in="body",
 *         description="Beer Object",
 *         required=true,
 *         @SWG\Schema( ref="#/definitions/BeerViewModel" ),
 *     ), 
 *     @SWG\Response(
 *         response=201,
 *         description="Beer added",
 *         @SWG\Schema(ref="#/definitions/Beer")
 *     ),  
 *     @SWG\Response(
 *         response="401",
 *         description="Beer not added. Daily limit reached.",
 *     ), 
 *     @SWG\Response(
 *         response=405,
 *         description="Validation exception",
 *     ),
 * )
 * 
 */