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
    echo "Lumen Beer RESTfull API";  
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
            'uses' => 'BeerController@getAllBeers'
        ]);  
        $router->get('{id}/reviews', [ 
            'uses' => 'ReviewController@getAllReviews'
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