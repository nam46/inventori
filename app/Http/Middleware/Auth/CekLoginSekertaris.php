<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class CekLoginSekertaris
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('sekertaris')->check()) {
            return redirect()->route('sekertarisLogin');
        }

        return $next($request);
    }
}
