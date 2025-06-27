<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\SuperAdmin;

class SuperAdminAuthController extends Controller
{
    // Handle login POST
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $superadmin = SuperAdmin::where('username', $request->username)->first();

        if ($superadmin && Hash::check($request->password, $superadmin->password)) {
            Session::put('superadmin_id', $superadmin->id);
            return redirect('/superadmin/dashboard');
        } else {
            return back()->with('error', 'Invalid username or password.');
        }
    }

    // Handle logout POST
    public function logout()
    {
        Session::forget('superadmin_id');
        return redirect()->route('superadmin.login.form');
    }
}
