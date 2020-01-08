<?php

namespace App\Http\Middleware;

use Closure;

class ProdukMiddleware
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
        // dd($request);
        if ($request->header('Authorization') === 'abcd') {
            return $next($request);
        } else {
            return response()->json([ 'code' => 401, 'message' => 'Unauthorized' ], 401);
        }

    }
}
