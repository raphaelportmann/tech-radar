<?php

namespace App\Http\Middleware;

use Closure;

class UserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->role === $role) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
