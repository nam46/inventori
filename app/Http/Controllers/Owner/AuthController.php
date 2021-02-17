<?php

namespace App\Http\Controllers\Owner;

use App\Owner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (!Auth::guard('owner')->check()) {
            return view('auth.login-owner');
        }

        return redirect()->route('owner.dashboard');
    }

    public function cekLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('owner')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect(route('owner.dashboard'));


        }

        return redirect(route('ownerLogin'));
    }

    public function logout()
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            Auth::guard('owner')->logout();
        }
        return redirect(route('ownerLogin'));
    }
}
