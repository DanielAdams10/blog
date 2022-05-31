<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
        #check age
        if($request->age <= 60) {
            return response() -> json (['status' => 'NG', 'message' => 'You are not old man!'], 200);

            #check gender
            if($request->gender == 'female') {
                return response()->json([ 'status' => 'NG', 'message' => 'Female are not allowed!'], 200);
            }
        }

        return $next($request);
    }
}
