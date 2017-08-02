<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Hash;
class admin
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
        $next($request);
    }
}
