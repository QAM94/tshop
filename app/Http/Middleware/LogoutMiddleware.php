<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class LogoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (auth()->user()->is_logout) {

            $user_model = new User();

            $user_model->find(auth()->user()->id)->update(['is_logout' => 0]);

            auth()->logout();

            return redirect()->route('dashboard');

        }

        return $next($request);
    }
}
