<?php

namespace App\Repository;
 
use Illuminate\Database\Connection;  
use App\Models\User;
         
class UserRepository extends Repository
{  

    public function create($email, $password, $name) {

        $user = new User; 
        $user->email = $email;
        $user->password = $password; //app('hash')->make($password);
        $user->name = $name;
        $user->save(); 
        
        return $user;
    }
}