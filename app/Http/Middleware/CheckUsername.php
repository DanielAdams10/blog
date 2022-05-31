<?php

namespace App\Http\Middleware;

use Closure;

class CheckUsername
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
        #check username
        if( empty($request->username) ) {
            return response()->json([ 'status' => 'NG', 'message' => 'Username is required'], 200);

        } elseif (!preg_match ("/^[a-zA-z]*$/", $request->username) ) {
            return response()->json([ 'status' => 'NG', 'message' => 'Username must not have space and special characters...']);
        }
        return $next($request);

    }
}
