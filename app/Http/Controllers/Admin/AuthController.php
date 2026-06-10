<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AuthController extends AdminController
{
    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials, $request->boolean('remember'))) {
            if (!auth()->user()->is_active) {
                auth()->logout();
                return back()->with('error', 'Your account has been deactivated.');
            }
            $request->session()->regenerate();
            \App\Models\ActivityLog::record('login', 'Admin logged in');
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        \App\Models\ActivityLog::record('logout', 'Admin logged out');
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
