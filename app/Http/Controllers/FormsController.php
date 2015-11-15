<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
}

?>