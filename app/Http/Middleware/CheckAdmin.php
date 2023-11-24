<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::user() && Auth::user()->role_id == 1){
            return $next($request);
        }
        return redirect()->route('login');
    }
}
