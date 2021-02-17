<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (!Auth::guard('admin')->check()) {
            return view('auth.login-admin');
        }

        return redirect()->route('admin.dashboard');
    }

    public function cekLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect(route('admin.dashboard'));
        }
        return redirect(route('adminLogin'));
    }

    public function logout()
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            Auth::guard('admin')->logout();
        }
        return redirect(route('adminLogin'));
    }
}
