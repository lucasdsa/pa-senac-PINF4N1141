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
    
    public function getUsersList($increment = 'current') {
        
        if (Auth::check() && Auth::user()->super) {
            
            $page = session('listUsersPageCount');
            $lastPageIndex = User::all()->count() / 10 - 1;
            
            if ($increment == 'next' &&  $lastPageIndex > $page)
                $page++;
            else if ($increment == 'previous' && $page > 0)
                $page--;
            
            session(['listUsersPageCount', $page]);
            $users = $this->getUsers($page, 10);
            
            return View::make('forms.users')->with('users', $users);
        }
    }
    
    
    private function getUsers($page, $count) {
        
        return User::skip($page * $count)->take($count)->get();
    }
}

?>