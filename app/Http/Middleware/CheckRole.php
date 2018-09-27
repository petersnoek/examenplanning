<?php

namespace App\Http\Middleware;

use App\User;
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
        if(Auth::user()->davinci_id == $request->route('davinci_id') || (Auth::user()->role_id == 2 && User::where('davinci_id', $request->route('davinci_id'))->get()->count() != 0))
        {
            return $next($request);
        }
        else{
            return redirect()->back()->withErrors(array('error' => 'Je hebt geen toegang tot deze pagina, of er bestaat geen student met dit OVnummer'));
        }
    }
}
