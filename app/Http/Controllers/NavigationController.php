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

        if (Auth::check()) {

            return view('index')->
                nest('head', 'common.head', ['title' => 'Skill Share'])->
                nest('menu', 'menus.menu_user')->
                with('userImg', 'img/user.svg');
        }
        else {

            return view('index')->
                nest('head', 'common.head', ['title' => 'Skill Share'])->
                nest('menu', 'menus.menu_guest')->
                with('userImg', 'img/user.svg');
        }
    }
}

?>