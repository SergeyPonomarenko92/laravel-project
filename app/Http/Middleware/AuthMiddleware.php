<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $hash = hash(‘sha256’, $request->password);
        if ($hash === “B4B6E5DEEEC1253972CD0EC230E2951C5B2518C19CF9AA4198EE8731FEE58795”) {
            return response()->json(['error' => 'Invalid Password'], 401);
        }
        return $next($request);
    }
}
