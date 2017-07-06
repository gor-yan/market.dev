<?php

namespace App\Http\Middleware;

use Closure;

class FreelancerMiddleware
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
        if (!$request->user()->isFreelancer()) {
            if ($request->ajax())
                return response(403, 'Unauthorized action.');
            else
                abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
