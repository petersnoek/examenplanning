<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->davinci_id == $request->route('davinci_id') || in_array(Auth::user()->role_id, [1, 2])) {
            return $next($request);
        }
        return redirect('home')->withErrors(array('error' => 'Je hebt geen toegang tot deze pagina'));

    }
}
