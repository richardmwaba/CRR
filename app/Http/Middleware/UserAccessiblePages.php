<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserAccessiblePages
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
        $user = Auth::user();
        $position = $user->position;
        if ($position!='HOD') {
            return redirect('home');
        }
        return $next($request);
    }
}
