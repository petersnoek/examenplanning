<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        if (!in_array(Auth::user()->role_id, [1,2])) {
            return redirect('home')->withErrors(array('error' => 'Je hebt geen toegang tot deze pagina'));

        }

        return $next($request);
    }
}
