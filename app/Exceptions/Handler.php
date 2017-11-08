<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response; 

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class 
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
  
        if($e instanceof TokenExpiredException){
            return response()->json(['error' => 'Token Expired'],
            $e->getStatusCode());
        } 
        elseif($e instanceof TokenInvalidException){
            return response()->json(['error' => 'Token Invalid'],
            $e->getStatusCode());
        }
        elseif($e instanceof JWTException){
            return response()->json(['error' => 'Error fetching token'],
            $e->getStatusCode());
        } 

        //QUERY ERRORS
        if($e instanceof QueryException){
            return response()->json(['error' => 'QueryException'], 400);
        } 
        return parent::render($request, $e);
    }
}
