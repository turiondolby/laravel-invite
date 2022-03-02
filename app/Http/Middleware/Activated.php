<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Activated
{
    public function handle(Request $request, Closure $next)
    {
        if (! optional($request->user())->active()) {
            return $request->expectsJson()
                ? abort(403, 'Your account is not activated.')
                : redirect()->guest(route('activate'));
        }

        return $next($request);
    }
}
