<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\ViewModels\JSONResponse;


class Controller extends BaseController
{ 

    protected function JSON_Response($success, $message, $data, $code, $error=null) { 

        $res = new JSONResponse($success, $message, $data, $code, $error);
        return $res->json();
    }
 
}
