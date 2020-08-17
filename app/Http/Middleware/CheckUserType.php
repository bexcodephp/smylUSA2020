<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckUserType
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
        $prefix = $request->route()->getPrefix();
        if(auth()->guard('employee')->check() && $prefix)
        {
            $user = auth()->guard('employee')->user();
            $prefix =  str_replace('/','',$prefix);

            if ($user->hasRole('dentist') && $prefix != "dentist") {
                abort(404);
            } elseif ($user->hasRole('pharmacist') && $prefix  != "operator" ) {
                abort(404);
            } elseif ($user->hasRole('vendor') && $prefix != "vendor" ) {
                abort(404);
            }elseif(($user->hasRole('admin') || $user->hasRole('superadmin')) && $prefix != 'admin'){
                abort(404);
            }
            return $next($request);
        }else{
            if(auth()->check())
            {
                return $next($request);
            }
            return redirect('/');
        }

    }
}
