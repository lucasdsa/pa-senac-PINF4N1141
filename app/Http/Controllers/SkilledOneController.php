<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Models\SkilledOne;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Auth;

class SkilledOneController extends Controller {

    public function subscribe(Request $request) {
        
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $super = ($request->input('super')) ? true : false;
        
        if ($name && $email && $password) {
            
            try {
                
                User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt($password),
                    'super' => $super
                ]);
            }
            catch (QueryException $e) {
                
                return view('errors/access_error')->
                    with('error', 'Usuário já existe')->
                    with('title', 'Skill Share')->
                    with('userImg', 'img/user.svg')->
                    nest('menu', 'menus.menu_guest');
            }   
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
            
            return view('errors/access_error')->
                with('error', 'Usuário não existente')->
                with('title', 'Skill Share')->
                with('userImg', 'img/user.svg')->
                nest('menu', 'menus.menu_guest');
        }
    }
    
    public function logout() {
        
        Auth::logout();        
        return 'Logout';
    }
}

?>