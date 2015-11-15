<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Crypt;

class NavigationController extends Controller {

    /*
     * Verifica se há uma sessão aberta e, se for o caso,
     * exibe o perfil do usuário, caso contrário, vai para
     * a página inicial.
     */
    public function handleSession(Request $request) {

        $env = null;

        if (Auth::check()) {
            
            if (Auth::user()->super)
                $env = $this->buildUserView('menus.menu_admin', 'img/user.svg');
            else
                $env = $this->buildUserView('menus.menu_user', 'img/user.svg');
        }
        else {

            $env = $this->buildUserView('menus.menu_guest', 'img/user.svg');
        }
        
        return $env;
    }
    
    private function buildUserView($menu, $imgPath) {
        
        return view('index')->
            nest('head', 'common.head', ['title' => 'Skill Share'])->
            nest('menu', $menu)->
            with('userImg', $imgPath);
    }
}

?>