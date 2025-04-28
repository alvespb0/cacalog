<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $tipo
     */
    public function handle(Request $request, Closure $next, ...$tipos)
    {
        // Verificar se o tipo do usuário está na lista dos tipos permitidos
        if (!in_array(auth()->user()->tipo, $tipos)) {
            abort(403, 'Acesso não permitido.');
        }
    
        return $next($request);
    }
    
}
