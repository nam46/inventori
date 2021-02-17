<?php

namespace App\Http\Controllers\Sekertaris;

use App\Sekertaris;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (!Auth::guard('sekertaris')->check()) {
            return view('auth.login-sekertaris');
        }

        return redirect()->route('sekertaris.dashboard');
    }

    public function cekLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('sekertaris')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect(route('sekertaris.dashboard'));
        }
        return redirect(route('sekertarisLogin'));
    }

    public function logout()
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            Auth::guard('sekertaris')->logout();
        }
        return redirect(route('sekertarisLogin'));
    }
}
