<?php

namespace App\Http\Middleware;

use Closure;

class CheckGender
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
        #check gender
        if($request->gender == 'female') {
            return response()->json([ 'status' => 'NG', 'message' => 'Female are not allowed!'], 200);
        }
        return $next($request);
    }
}
