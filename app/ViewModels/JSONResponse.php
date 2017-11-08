<?php

namespace App\ViewModels; 

/**
 * @SWG\Definition( 
 *   type="object",
 *   @SWG\Xml(name="JSONResponse")
 * )
 */ 

class JSONResponse
{
   
    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $success;
    

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $message;

    
    /**
     * @SWG\Property(format="array", type="string")
     * @var array
     */
    private $data;

    
    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $error;

    /**
     * @SWG\Property(format="integer")
     * @var integer
     */
    private $code;


    public function __construct($success, $message, $data, $code, $error) {
        
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;
        $this->error = $error;
        $this->code = $code; 
    }

    public function json() { 
        
        return response()->json([
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->data, 
            'error' => $this->error
            ], $this->code); 
    }
}