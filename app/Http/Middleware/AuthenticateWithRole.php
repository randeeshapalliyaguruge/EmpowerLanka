<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateWithRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {

        // check if the user is logged in
        if (!$request->user()) {
            abort(403, 'Sorry, you need to be logged in to the system to access this page.');
        }

        // check if the user has the role
        if (!$request->user()->hasRole($role)) {
            abort(403, 'Sorry, you are not allowed to access this page.');
        }

        return $next($request);
    }
}
