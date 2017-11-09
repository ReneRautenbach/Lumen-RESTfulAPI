<?php
/**
 * 
* @SWG\Post( path="/user/register",
 *     summary="Register a new user",
 *     description="Creates a new user.",
 *     operationId="register",
 *     tags={"1. User"},
 *     produces={"application/json"},
 *
 *     @SWG\Parameter(
 *         name="body",
 *         in="body",
 *         description="User Object",
 *         required=true,
 *         @SWG\Schema(ref="#/definitions/UserRegisterViewModel"),
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="User added",
 *        @SWG\Schema(  type="array",
 *             @SWG\Items(
 *                 type="object",
 *                 @SWG\Property(property="token", type="string") 
 *             ),
 * ),
 *     ),
 *     @SWG\Response(
 *         response=404,
 *         description="User not found.",
 *     ),
 *     @SWG\Response(
 *         response=422,
 *         description="Unprocessable Entity.",
 *     ),
 *     @SWG\Response(
 *         response=405,
 *         description="User not added. Validation failed.",
 *     ),
 * )
 *
* @SWG\Post( path="/user/login",
 *     tags={"1. User"},
 *     summary="User Login",
 *     description="Authenticates username and password and logs a user in.",
 *     operationId="login",
 *     produces={"application/json"},
 *
 *     @SWG\Parameter(
 *         name="body",
 *         in="body",
 *         description="User Email and password",
 *         required=true,
 *         @SWG\Schema(ref="#/definitions/UserLoginViewModel"),
 *     ) ,
 *    @SWG\Response(
 *       response=200,
 *       description="successful operation", 
 *        @SWG\Schema(  type="array",
 *             @SWG\Items(
 *                 type="object",
 *                 @SWG\Property(property="token", type="string") 
 *             ),
 *      ),
 *       @SWG\Header(
 *         header="X-Rate-Limit",
 *         type="integer",
 *         format="int32",
 *         description="calls per hour allowed by the user"
 *       ),
 *     @SWG\Response(
 *         response=404,
 *         description="User not found.",
 *     )
 * )
 * )
 */
