<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user()->role !== $role) {
            // return response('Unauthorized', 401);
            if ($request->user()->role === 'admin') {
                return Redirect::route('admin.dashboard');
            } else {
                return Redirect::route('dashboard');
            }
        }
        return $next($request);
    }
}
