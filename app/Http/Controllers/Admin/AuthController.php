<?php
// File: app/Http/Controllers/Admin/AuthController.php
// Description: Handles Google login authentication for Admin with approval and rejection check (Syllaverse)

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Redirect the Admin to Google's OAuth page.
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google OAuth for Admin login.
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $email = $googleUser->getEmail();

            // Restrict login to BSU GSuite domain
            if (!str_ends_with($email, '@g.batstate-u.edu.ph')) {
                return redirect()->route('admin.login.form')->withErrors([
                    'email' => 'Only BSU GSuite accounts are allowed.',
                ]);
            }

            // Find or create user with pending status
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'role' => 'admin',
                    'status' => 'pending'
                ]
            );

            // Handle rejection
            if ($user->status === 'rejected') {
                return redirect()->route('admin.login.form')->withErrors([
                    'rejected' => 'Your account has been rejected. Please contact the Super Admin.',
                ]);
            }

            // Handle unapproved accounts
            if ($user->status !== 'active') {
                return redirect()->route('admin.login.form')->withErrors([
                    'approval' => 'Your account is pending approval by the Super Admin.',
                ]);
            }

            Auth::login($user);
            return redirect()->route('admin.dashboard');

        } catch (\Exception $e) {
            return redirect()->route('admin.login.form')->withErrors([
                'login' => 'Google login failed. Please try again.',
            ]);
        }
    }
}
