<?php

namespace App\Http\Middleware;

use App\Exceptions\GeneralException;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if(Auth::guard($guard)->guest()){ // 如果没有登陆 返回true
            //dd(123);
            //abort(404);
            //throw new GeneralException(GeneralException::ERROR_UNAUTHORISED);
        }
        return $next($request);
    }
}
