<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Models\SkilledOne;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Auth;

class SkilledOneController extends Controller {
    
    private function buildErrorView($message, $imgPath) {
        
        return view('errors.access_error')->
            nest('head', 'common.head', ['title' => 'Skill Share'])->
            with('error', $message)->
            with('userImg', $imgPath)->
            nest('menu', 'menus.menu_guest');
    }

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
                
                return $this->buildErrorView('Usuário já existe', 'img/user.svg');
            }
            
            return $this->buildErrorView('Usuário criado com sucesso', 'img/user.svg');
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
            
            return $this->buildErrorView('Usuário inexistente', 'img/user.svg');
        }
    }
    
    public function logout() {
        
        Auth::logout();        
        return 'Logout';
    }
}

?>