<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $isLoggedIn = (bool) session('is_logged_in');
        if(!$isLoggedIn) return redirect('/login')->with('error_message', 'Anda harus login terlebih dahulu!');

        return $next($request);
    }
}
