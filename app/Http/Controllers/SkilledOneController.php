<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Models\SkilledOne;
use Illuminate\Http\Request;

class SkilledOneController extends Controller {

    public function subscribe(Request $request) {
        
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $super = ($request->input('super')) ? true : false;
        
        if ($name && $email && $password) {
            
            return User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'super' => $super
            ]);   
        }
        else {
            
            return 'Error!';
        }
    }
}

?>