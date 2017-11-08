<?php
/**
 * 
 * 
 * @SWG\Get(
 *     path="/beers",
 *     summary="List all Beers",
 *     description="Returns a list of beers",
 *     operationId="getAllBeers",
 *     tags={"beer"},
 *     produces={"application/json"},
 *     @SWG\Response(
 *         response=201,
 *         description="successful operation",
 *         @SWG\Schema(ref="#/definitions/JSONResponse")
 *     )
 * ) 
 * 
 * @SWG\Post(
 *     path="/beers",
 *     summary="Add Beer",
 *     description="Creates a beer if request parameters are valid and the user is allowed to create a beer.",
 *     operationId="createBeer",
 *     tags={"beer"},
 *     produces={"application/json"},  
 *     @SWG\Parameter(
 *         name="Authorization",
 *         in="header",
 *         description="token to be passed as a header",
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
 *         response="400",
 *         description="Beer not added. Daily limit reached.",
 *     ), 
 *     @SWG\Response(
 *         response=405,
 *         description="Validation exception",
 *     ),
 * )
 * 
 */