<?php

namespace App\Http\Controlleras

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class NavigationController extends Controller {

    /*
     * Verifica se há uma sessão aberta e, se for o caso,
     * exibe o perfil do usuário, caso contrário, vai para
     * a página inicial.
     */
    public function handleSession(Request $request) {

        if ($request->session()->has('logged')) {

            echo 'Yeah! You are logged!';
        }
        else {

            return view('index');
        }
    }
}

?>