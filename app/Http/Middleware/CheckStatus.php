<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStatus
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
        $response = $next($request);
        //If the status is not approved redirect to login
        if(Auth::check() && !Auth::user()->is_active){
            Auth::logout();
            return redirect()->route('login')
                ->withErrors(['inactive'=>'Inactive Account! Please contact administrator to activate your account']);
        }
        return $response;
    }
}
