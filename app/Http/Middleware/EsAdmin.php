<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->es_admin) {
            abort(403, 'No tienes permiso para acceder aquí.');
        }

        return $next($request);
    }
}