<?php
// File: app/Http/Controllers/SuperAdmin/AuthController.php
// Description: Handles Super Admin login and logout using .env credentials (Syllaverse)

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
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

        if (
            $request->username === env('SUPERADMIN_USERNAME') &&
            $request->password === env('SUPERADMIN_PASSWORD')
        ) {
            Session::put('is_superadmin', true);
            return redirect()->intended('/superadmin/dashboard');
        }

        return redirect()->route('superadmin.login.form')
            ->with('error', 'Invalid username or password.');
    }

    /**
     * Handle Super Admin logout.
     */
    public function logout(Request $request)
    {
        Session::forget('is_superadmin');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('superadmin.login.form');
    }
}
