<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
	// Se nella sessione dell'utente è salvata una lingua, usala.
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }
        // Altrimenti, Laravel userà la lingua di default (impostata in config/app.php).
        return $next($request);
    }
}
