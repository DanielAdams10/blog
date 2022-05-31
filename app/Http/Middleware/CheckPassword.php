<?php

namespace App\Http\Middleware;

use Closure;

class CheckPassword
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
        #check password
        if ( empty($request->password)) {
            return response()->json(['status' => 'NG', 'message' => 'Password is required...'], 200);
        } elseif( strlen($request->password) < 6) {
            return response()->json(['status' => 'NG', 'message' => 'Password must be at least 6...'], 200);
        }

        return $next($request);
    }
}
