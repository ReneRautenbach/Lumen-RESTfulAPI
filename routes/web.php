<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/',  function(){
    echo "<h1>Lumen Beer RESTfull API</h1>";  
    echo "<br>";
    echo "<br> <a href='https://github.com/ReneRautenbach/Lumen-RESTfulAPI'>GIT Repository</a>";
    echo "<br> <a href='https://github.com/ReneRautenbach/Lumen-RESTfulAPI/wiki'>Documentation</a>";
    echo "<br> <a href='api/documentation'>Routes</a>";  
}); 

$router->group(['prefix' => '/api/v1'], function () use ($router) {
             
    $router->post('user/register', [ 'uses' => 'AuthenticateController@register' ]); 
    $router->post('user/login', [ 'uses' => 'AuthenticateController@login' ]);
    $router->get('styles', [ 'uses' => 'StyleController@getFilteredList' ]);

    
    $router->group(['prefix' => 'reviews'], function () use ($router) { 
        
        // GET OVERALL RATING BY BEER
        $router->get('/overall', [ 'uses' => 'ReviewController@getOverallReviewsByBeer' ]);  

        // GET REVIEW WITH $review_id
        $router->get('/{review_id}', [ 'uses' => 'ReviewController@get' ]);   
    });
    
    $router->group(['prefix' => 'beers'], function () use ($router) {

        // GET ALL BEERS
        $router->get('/', [ 'uses' => 'BeerController@getFilteredList' ]);  
        // GET BEER WITH $beer_id
        $router->get('/{beer_id}', [ 'uses' => 'BeerController@get' ]);  
         // GET ALL BEER REVIEWS
        $router->get('/{beer_id}/reviews', [ 'uses' => 'ReviewController@getAll' ]);   

        $router->group(['middleware' => 'auth'], function () use ($router) { 
                // CREATE BEER
                $router->post('/', [ 
                    'uses' => 'BeerController@create'
                ]); 
                // CREATE BEER REVIEW
                $router->post('{id}/reviews', [ 
                    'uses' => 'ReviewController@create'
                ]);  
        });
    });
});

 
  