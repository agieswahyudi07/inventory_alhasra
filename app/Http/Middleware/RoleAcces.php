<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAcces
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (auth()->check()) {
            if (is_null($role)) {
                return redirect()->route('login');
            }

            if (empty($role)) {
                return redirect()->back();
            }

            if (auth()->user()->role == $role) {
                return $next($request);
            }
        }

        return redirect()->route('login');
    }
}
