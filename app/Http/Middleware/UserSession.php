<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class UserSession
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('users_login')) {
            \Session::flush();
            \Session::flash('message', 'Please login first ..');
            return redirect()->route('login');
        }
        return $next($request);
    }
}