<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (\Auth::Volnteer()->can($role . '-access')) {
            return $next($request);
        }
        return redirect("Login");

       // return response('blank', 404);
    }
}
