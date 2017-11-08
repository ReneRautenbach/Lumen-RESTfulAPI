<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Models\Review;
use App\Models\User; 
use App\Repository\UserRepository;

use Tymon\JWTAuth\JWTAuth;
use Auth; 

class AuthenticateController extends Controller
{
    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;
 
    /**
     * @var 
     */
    private $userRepo; 
    
    
    public function __construct(JWTAuth $jwt, UserRepository $userRepo)
    {
        $this->jwt = $jwt;
        $this->userRepo = $userRepo;
    }
     
    
    public function register(Request $request)
    {  

        try {         
            $this->validate($request , [ 
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6',
                'name' => 'required'
            ]);  
            
            $user = $this->userRepo->create($request['email'],$request['password'],$request['name']);
            
            // TODO implement email validation by sending activation email
            // $return = $this->activationService->CreateActivationRequest($user);     
            
            $user_credentials = $this->getCredentials($request); 
            return $this->getToken($user_credentials);  
        }      
        catch(\Illuminate\Validation\ValidationException  $e){   
            return $this->JSON_Response(false, trans('user.create-validationexception') , null, $e->status, $e->errors()); 
        }
        catch(Exception $e){   
            return $this->JSON_Response(false, trans('user.create-exception') , null, 400, $e->errors()); 
        }  
    }


    public function login(Request $request)
    {  
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

       $user = $this->getCredentials($request);  
       return $this->getToken($user);
        
    }

    private function getToken( $user ) {
        
        try {
            if (! $token = $this->jwt->attempt($user)) { 
                return response()->json(['error' => 'user_not_found'], 404);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            
            return response()->json(['error' => 'token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['error' => 'token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['error' => $e->getMessage()], 500);

        } 
 
        return response()->json(compact('token'),200, ['X-RateLimit-Limit' => 60]);
    } 
    
    protected function getCredentials(Request $request)
    {
        $credentials =  $request->only('email', 'password');
      //  $credentials = array_add($credentials,'activated',1);
        return $credentials;
    }
}
