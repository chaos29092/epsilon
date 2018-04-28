<?php

namespace App\Http\Middleware;

use Closure;
use Ramsey\Uuid\Uuid;

class UserIdCheck
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
        $response = $next($request);
        if ($request->cookie('userId')){
            $userId = $request->cookie('userId');
        }
        else{
            $userId = Uuid::uuid1();
        }

        return $response->cookie('userId',$userId,1051200,null,null,false,false);
    }
}
