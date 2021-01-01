<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->is_banned) {
            $banned = Auth::user()->is_banned == "1";
            Auth::logout();

            if($banned == 1) {
                $message = "Your account has been deactivated, please contact administrator";
            }

            return redirect()->route('login')
                ->with('status', $message)
                ->withErrors(['email' => 'Your account has been deactivated, please contact administrator']);
        }

        return $next($request);
    }
}
