<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsVerified
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user()->verified && !Auth::user()->hasRole('admin')) {
            return response()->json([
                'message' => 'User not verified',
                'status' => 'error'
            ], 401);
        }
        return $next($request);
    }
}
