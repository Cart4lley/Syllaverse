<?php
// File: app/Http/Controllers/SuperAdminAuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Auth;

class SuperAdminAuthController extends Controller
{
    /**
     * Handle Super Admin login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $superadmin = SuperAdmin::where('username', $request->username)->first();

        if ($superadmin && Hash::check($request->password, $superadmin->password)) {
            Auth::login($superadmin); // Laravel Auth!

            $request->session()->regenerate();

            return redirect('/superadmin/dashboard');
        } else {
            return redirect()->route('login')
                ->with('error', 'Invalid username or password.');
        }
    }

    /**
     * Handle Super Admin logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');

    }

}
