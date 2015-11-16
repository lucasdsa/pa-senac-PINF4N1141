<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use View;

class FormsController extends Controller {
    
    public function subscribeForm() {
        
        if (Auth::check() && Auth::user()->super)
            return View::make('forms.subscribe_crud');
        else
            return View::make('forms.subscribe');
    }
    
    public function loginForm() {
        
        return View::make('forms.login');
    }
    
    public function getUsersNext(Request $request) {
        
        if (Auth::check() && Auth::user()->super) {
            
            $page = (int)$request->session()->get('listUsersPageCount');
            $request->session()->put('listUsersPageCount', (string)($page + 1));
            $users = $this->getUsers($page, 10);
            
            return View::make('forms.users')->with('users', $users);
        }
    }
    
    public function getUsersPrev(Request $request) {
        
        if (Auth::check() && Auth::user()->super) {
            
            $page = (int)$request->session()->get('listUsersPageCount');
            
            if ($page > 0)
                $request->session()->put('listUsersPageCount', (string)($page - 1));
            $users = getUsers($page, 10);
            
            return View::make('forms.users')->with('users', $users);
        }
    }
    
    public function getUsers($page, $count) {
        
        return User::skip($page * $count)->take($count)->get();
    }
}

?>