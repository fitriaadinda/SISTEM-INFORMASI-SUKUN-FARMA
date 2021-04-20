<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $role = session('role');
        if (!in_array($role, $roles)) return redirect()->back()->with('error_message', 'Anda tidak memiliki akses!');

        return $next($request);
    }
}
