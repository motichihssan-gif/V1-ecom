<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        
        // Pas connecté
        if (!$user) {
            return redirect()->route('login');
        }
        
        // Si c'est un ADMIN, rediriger vers espaceadmin
        if ($user->role === 'ADMIN') {
            return redirect()->route('espaceadmin');
        }
        
        // Sinon laisser passer (USER ou autre)
        return $next($request);
    }
}
