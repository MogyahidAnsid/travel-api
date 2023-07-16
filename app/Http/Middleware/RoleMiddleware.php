<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Not authenticated
        if (!auth()->check()) {
            abort(Response::HTTP_UNAUTHORIZED); //401
        }

        // User is authenticated but if they don't have the role, abort
        if (!auth()->user()->roles()->where('name', $role)->exists()) {
            abort(Response::HTTP_FORBIDDEN); //403
        }

        return $next($request);
    }
}
