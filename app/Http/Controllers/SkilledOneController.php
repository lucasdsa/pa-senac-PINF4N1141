<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Models\SkilledOne;
use Illuminate\Http\Request;
use Auth;

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
    
    public function login(Request $request) {
        
        $email = $request->input('email');
        $password = $request->input('password');
        
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            
            return redirect()->intended('/');
        }
        else {
            
            return 'Este usuário não existe.';
        }
    }
    
    public function logout() {
        
        Auth::logout();        
        return 'Logout';
    }
}

?>