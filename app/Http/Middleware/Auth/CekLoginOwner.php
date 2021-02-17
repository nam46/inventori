<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class CekLoginOwner
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('owner')->check()) {
            return redirect()->route('ownerLogin');
        }

        return $next($request);
    }
}
