<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class levelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        if (!auth()->check()) {
            abort(403);
        }

        if(!in_array(auth()->user()->level, $levels)){
            abort(403,'Acesso negado');
        }
        return $next($request);
    }
}
