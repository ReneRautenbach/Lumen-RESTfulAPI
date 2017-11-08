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
             
    $router->post('user/register', [ 
        'uses' => 'AuthenticateController@register'
    ]);

    $router->post('user/login', [ 
        'uses' => 'AuthenticateController@login'
    ]);

    
    $router->group(['prefix' => 'beers'], function () use ($router) {

        //BEER
        $router->get('/', [ 
            'uses' => 'BeerController@getAll'
        ]);  
        $router->get('{id}/reviews', [ 
            'uses' => 'ReviewController@getAll'
        ]);  

        $router->group(['middleware' => 'auth'], function () use ($router) { 
                //BEER
                $router->post('/', [ 
                    'uses' => 'BeerController@create'
                ]); 
                //BEER REVIEWS 
                $router->post('{id}/reviews', [ 
                    'uses' => 'ReviewController@create'
                ]);  
        });
    });
});

 
 


$router->put('/api/beers/{beerId}',[ 
    'uses' => 'BeerController@update'
]);


//beer reviews
$router->get('/api/beers/{id}/reviews', [
    'as' => 'beer_reviews', 
    'uses' => 'ReviewController@index'
]
);