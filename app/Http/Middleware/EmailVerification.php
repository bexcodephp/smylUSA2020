<?php

namespace App\Http\Middleware;

use Closure;

class EmailVerification
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
        if(auth()->check())
        {
            if(auth()->user()->email_verified_at == null)
            {
                auth()->logout();
                return redirect('login')->with(['message' => 'Please verify your email', 'status' => 0]);
            }
        }
        return $next($request);
    }
}
