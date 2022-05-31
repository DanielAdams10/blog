<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if( empty($request->role) ) {
            return response()->json(['status' => 'NG', 'message' => 'Role must be needed...']);
        } elseif ( $request->role == 'user') {
            return response()->json(['status' => 'NG', 'message' => 'You must be admin...']);
        } 
        return $next($request);
    }
}
