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
    
    public function editForm(Request $request) {
        
        $email = $request->input('email');
        if (Auth::check() && Auth::user()->super) {
            
            $targetUser = User::where('email', $email)->first();
            
            if ($targetUser && !$targetUser->super) {
                
                // Salva o usuário que será editado
                $request->session()->put('targetId', $targetUser->id);
                
                return View::make('forms.edit_user')->with('user', $targetUser);
            }
            
            return new Response('Erro!', '400');
        }
            
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
            
            return View::make('forms.users')->with('users', $users)->with('img', 'img/user.svg');
        }
    }
    
    
    private function getUsers($page, $count) {
        
        return User::skip($page * $count)->take($count)->get();
    }
}

?>