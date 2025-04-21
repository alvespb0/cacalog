<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * retorna a view de login
     */
    public function login(){
        return view('/auth/login');
    }

    /**
     * recebe via post email senha e tipo e verifica se as credenciais são válidas para o login
     * @param Request
     * @return Redirect
     */
    public function tryLogin(Request $request){
        $credenciais = [
            'email' => $request->email,
            'password' => $request->senha
        ];

        if (Auth::attempt($credenciais)) {
            return redirect(route('readCliente'));
        }
    
        session()->flash('mensagem', 'Credenciais inválidas');
        return redirect(route('login'));
    }

    /**
     * só faz o logout
     */
    function logout(){
        Auth::logout();

        return redirect(route('login'));
    }

}
