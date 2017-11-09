<?php 
/** 
 * 
* @SWG\Get(  path="/reviews/{review_id}",
 *     summary="Return the review with the given id",
 *     description="Return the review with the given id",
 *     operationId="getReview",
 *     tags={"review"},
 *     produces={"application/json"},  
 *      @SWG\Parameter(
 *         name="review_id",
 *         in="path",
 *         description="The Id of the review",
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
 *                 @SWG\Property(property="data", ref="#/definitions/Review"),
 *                 @SWG\Property(property="error", type="string")
 *            )
 *         ),
 *     ),
 *     @SWG\Response(
 *         response="404",
 *         description="Not found.",
 *     ), 
 * )
 * 
* @SWG\Get(  path="/reviews/overall",
 *     summary="Provides the overall ratings of all beers",
 *     description="Provides the overall ratings of all beers",
 *     operationId="getBeerReviewOverall",
 *     tags={"review"},
 *     produces={"application/json"},   
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         @SWG\Schema(
 *             type="array",
 *             @SWG\Items(
 *                 type="object",
 *                 @SWG\Property(property="success", type="boolean"),
 *                 @SWG\Property(property="message", type="string") ,
 *                 @SWG\Property(property="data", type="array",  
 *                          @SWG\Items( 
 *                           @SWG\Property(property="beer_id", ref="#/definitions/ReviewTotalsViewModel"),
 *                          )
 *                  ),
 *                 @SWG\Property(property="error", type="string")
 *             )
 *         ),
 *     ),
 *     @SWG\Response(
 *         response="404",
 *         description="Not found.",
 *     ), 
 * )
 * 
 * 
 * 
 * 
* @SWG\Get(  path="/beers/{beer_id}/reviews",
 *     summary="List of reviews for a beer",
 *     description="List of reviews for a beer",
 *     operationId="getAllReviews",
 *     tags={"review"},
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
 *                 @SWG\Property(property="data", type="array", 
 *                  @SWG\Items( ref="#/definitions/Review" )
 *                 ),
 *                 @SWG\Property(property="error", type="string")
 *            )
 *         ),
 *     ),
 *     @SWG\Response(
 *         response="404",
 *         description="Not found.",
 *     ), 
 * )
* @SWG\Get(  path="/beers/{beer_id}/reviews/overall",
 *     summary="Provides the overall rating of a beer",
 *     description=" Calculation:  weighted rank (WR) = (v / (v+m)) * R + (m / (v+m)) * C  
 *     where:
 *     R = average for the beer (mean) = (Rating)
 *     v = number of reviews for the beer = (Rate Count)
 *     m = minimum votes required to be listed in the top beers list (varies according to average of ratecounts for top 50 beers)
 *     C = the midpoint of the scale (2.5 in our case)",
 *     operationId="getBeerReviewOverall",
 *     tags={"review"},
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
 *                 @SWG\Property(property="message", type="string"),
 *                 @SWG\Property(property="data", type="array",  
 *                          @SWG\Items( 
 *                           @SWG\Property(property="beer_id", ref="#/definitions/ReviewTotalsViewModel"),
 *                          )
 *                  ),
 *                 @SWG\Property(property="error", type="string")
 *            )
 *         ),
 *     ),
 *     @SWG\Response(
 *         response="404",
 *         description="Review Overall Calculation not available. Beer not found.",
 *     ), 
 * )
 *  
 * 
* @SWG\Post( path="/beers/{beer_id}/reviews",
 *     summary="Add a review of a beer",
 *     description="Creates a review if request parameters are valid and the user is allowed to create a beer review. One review per user per beer is allowed.",
 *     operationId="create",
 *     tags={"review"},
 *     produces={"application/json"},   
 *      @SWG\Parameter(
 *         name="beer_id",
 *         in="path",
 *         description="The Id of the beer being reviewed",
 *         required=true,
 *         type="integer", 
 *     ), 
 *     @SWG\Parameter(
 *         name="Authorization",
 *         in="header",
 *         description="Token to be passed as a header. Use login or register to get the token.Format: Bearer xxxxxx",
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
 *         @SWG\Schema(
 *             type="array",
 *             @SWG\Items(
 *                 type="object",
 *                 @SWG\Property(property="success", type="boolean"),
 *                 @SWG\Property(property="message", type="string") ,
 *                 @SWG\Property(property="data", ref="#/definitions/Review"),
 *                 @SWG\Property(property="error", type="string")
 *            )
 *         ),
 *     ),  
 *     @SWG\Response(
 *         response="401",
 *         description="Beer review not added. User limit reached.",
 *     ),  
 *     @SWG\Response(
 *         response="404",
 *         description="Review not added. Beer not found.",
 *     ), 
 *     @SWG\Response(
 *         response=405,
 *         description="Validation exception",
 *     ),
 * ) 
 */