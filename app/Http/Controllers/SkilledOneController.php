<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\SkilledOne;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Auth;

class SkilledOneController extends Controller {
    
    private function buildErrorView($message, $imgPath) {
        
        $menu = (Auth::check() && Auth::user()->super) ?
                 'menus.menu_admin' : 'menus.menu_guest';
        
        return view('errors.access_error')->
            nest('head', 'common.head', ['title' => 'Skill Share'])->
            with('error', $message)->
            with('userImg', $imgPath)->
            nest('menu', $menu);
    }

    public function subscribe(Request $request) {
        
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        // Para poder adicionar outro administrador é necessário
        // estar logado como outro administrador
        $super = ($request->input('super') && Auth::user()->super) ? true : false;
        
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
            
            // Se um administrador visualizar os outros usuários
            // é necessário manter informação sobre qual a página
            // atual que ele vê
            if (Auth::user()->super)
                $request->session()->put('listUsersPageCount', 0);
            
            return redirect()->intended('/');
        }
        else {
            
            return $this->buildErrorView('Usuário inexistente', 'img/user.svg');
        }
    }
    
    public function logout(Request $request) {
        
        Auth::logout();
        $request->session()->flush();
        return 'Logout';
    }
    
    public function delete(Request $request) {
        
        if (Auth::check() && Auth::user()->super) {
            
            $email = $request->input('email');
            $targetUser = User::where('email', $email)->first();
            
            if ($targetUser && !$targetUser->super) {
                $targetUser->delete();
                
                return 'Sucesso';
            }
                
            return new Response('Erro ao deletar usuário', '400');
        }
    }
    
    public function edit(Request $request) {
        
        if (Auth::check() && Auth::user()->super) {
            
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $super = $request->input('super');
            
            if ($name && $email) {
                
                $targetUser = User::where('email', $email)->first();
                
                if ($targetUser) {
                    $targetUser->name = $name;
                    $targetUser->email = $email;
                    
                    if ($password)
                        $targetUser->password = bcrypt($password);
                        
                    $targetUser->super = $super;
                    $targetUser->save();               
                    
                    return $this->buildErrorView('Informações atualizadas', 'img/user.svg');                  
                }
            }
            
            //return new Response('Erro ao editar usuário', '400');
        }
    }
}

?>