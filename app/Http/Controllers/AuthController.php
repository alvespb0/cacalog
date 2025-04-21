<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password', 'tipo');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
    
        return back()->withErrors([
            'email' => 'As credenciais informadas estão incorretas.',
        ]);    
    }
}
