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

     /**
     * Validate HTTP request against the rules
     *
     * @param Request $request
     * @param array $rules
     * @return bool|array
     */
    protected function validateRequest(Request $request, array $rules)
    {
        // Perform Validation
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errorMessages = $validator->errors()->messages();
            // crete error message by using key and value
            foreach ($errorMessages as $key => $value) {
                $errorMessages[$key] = $value[0];
            }
            return $errorMessages;
        }
        return true;
    }
}
