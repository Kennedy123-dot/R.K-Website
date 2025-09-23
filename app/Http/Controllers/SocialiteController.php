
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();

            $user = User::where('github_id', $githubUser->id)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $githubUser->name ?? $githubUser->nickname,
                    'email' => $githubUser->email ?? $githubUser->id . '@github.com',
                    'github_id' => $githubUser->id,
                    'password' => bcrypt(Str::random(24)),
                ]);
            }

            Auth::login($user, true);
            return redirect()->intended('/');

        } catch (\Exception $e) {
            Log::error('GitHub Login Error: ' . $e->getMessage());
            return redirect('/login')->withErrors(['error' => 'GitHub login failed. Please try again.']);
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt(Str::random(24)),
                ]);
            }

            Auth::login($user, true);
            return redirect()->intended('/');

        } catch (\Exception $e) {
            Log::error('Google Login Error: ' . $e->getMessage());
            return redirect('/login')->withErrors(['error' => 'Google login failed. Please try again.']);
        }
    }
}