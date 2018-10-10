<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckRequestedUserAgenda
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
        if(User::where('davinci_id', $request->route('davinci_id'))->get()->count() != 0)
        {
            return $next($request);
        }
        else{
            return redirect()->back()->withErrors(array('error' => 'Er bestaat geen gebruiker met deze identificatiecode'));
        }
    }
}
