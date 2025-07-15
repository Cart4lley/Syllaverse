<?php
// File: app/Http/Controllers/Faculty/AuthController.php
// Description: Handles Google Login for Faculty (Syllaverse)

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Redirect the Faculty to Google's OAuth page.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->redirectUrl(env('GOOGLE_REDIRECT_URI_FACULTY'))
            ->redirect();
    }

    /**
     * Handle the callback from Google OAuth for Faculty login.
     */
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')
            ->stateless()
            ->redirectUrl(env('GOOGLE_REDIRECT_URI_FACULTY'))
            ->user();

        $email = $googleUser->getEmail();

        $user = User::where('email', $email)->first();

        if ($user) {
            if ($user->role !== 'faculty') {
                return redirect()->route('faculty.login.form')
                    ->with('error', 'This account is already registered as a different role.');
            }
        } else {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $email,
                'role' => 'faculty',
                'status' => 'active',
            ]);
        }

        Auth::login($user);
        return redirect()->route('faculty.dashboard');
    }
}
