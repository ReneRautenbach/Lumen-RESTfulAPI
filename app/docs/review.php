<?php 
/**
 * @SWG\Get(
 *     path="/beers/{id}/reviews",
 *     summary="List of reviews for a beer",
 *     description="List of reviews for a beer",
 *     operationId="getAllReviews",
 *     tags={"review"},
 *     produces={"application/json"},   
 *      @SWG\Parameter(
 *         name="id",
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
 *                 @SWG\Property(property="id", type="integer"),
 *                 @SWG\Property(property="aroma", type="integer")
 *             )
 *         ),
 *     ),
 *     @SWG\Response(
 *         response="404",
 *         description="Not found.",
 *     ), 
 * )
 *  
 * @SWG\Post(
 *     path="/beers/{id}/reviews",
 *     summary="Add a review of a beer",
 *     description="Creates a review if request parameters are valid and the user is allowed to create a beer review. One review per user per beer is allowed.",
 *     operationId="create",
 *     tags={"review"},
 *     produces={"application/json"},   
 *      @SWG\Parameter(
 *         name="id",
 *         in="path",
 *         description="The Id of the beer being reviewed",
 *         required=true,
 *         type="integer", 
 *     ), 
 *     @SWG\Parameter(
 *         name="Authorization",
 *         in="header",
 *         description="token to be passed as a header",
 *         required=true,
 *         type="string",
 *         @SWG\Items(type="string")  
 *     ), 
 *     @SWG\Parameter(
 *         name="body",
 *         in="body",
 *         description="Beer Review Object",
 *         required=true,
 *         @SWG\Schema( ref="#/definitions/ReviewViewModel" ),
 *     ), 
 *     @SWG\Response(
 *         response=201,
 *         description="Beer added",
 *         @SWG\Schema(ref="#/definitions/Review")
 *     ),  
 *     @SWG\Response(
 *         response="400",
 *         description="Beer review not added. User limit reached.",
 *     ),  
 *     @SWG\Response(
 *         response="404",
 *         description="Not found.",
 *     ), 
 *     @SWG\Response(
 *         response=405,
 *         description="Validation exception",
 *     ),
 * ) 
 */