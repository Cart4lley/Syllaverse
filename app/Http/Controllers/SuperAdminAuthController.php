<?php
// File: app/Http/Controllers/SuperAdminAuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\SuperAdmin;

class SuperAdminAuthController extends Controller
{
    /**
     * Handle Super Admin login.
     */
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Fetch the superadmin by username
        $superadmin = SuperAdmin::where('username', $request->username)->first();

        if ($superadmin && Hash::check($request->password, $superadmin->password)) {
            // Optionally regenerate session to prevent fixation
            $request->session()->regenerate();

            // Store superadmin session
            Session::put('superadmin_logged_in', true);
            Session::put('superadmin_id', $superadmin->id);

            return redirect('/superadmin/dashboard');
        } else {
            return redirect()->route('superadmin.login.form')
                ->with('error', 'Invalid username or password.');
        }
    }

    /**
     * Handle Super Admin logout.
     */
    public function logout(Request $request)
    {
        // Flush only superadmin session variables
        Session::forget(['superadmin_logged_in', 'superadmin_id']);
        // Optionally invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('superadmin.login.form');
    }
}
