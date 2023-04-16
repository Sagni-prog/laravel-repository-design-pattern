<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BanThisUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $user)
    {
        // if($request->ip() === '127.0.0.1'){
        //     return response("Banned Ip Adress",403);
        // }

        if($user === "Mike"){
            return response("Mike you are banned from this site");
        }
        return $next($request);
    }
}
