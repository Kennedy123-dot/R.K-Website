<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;

// Redirect to GitHub
Route::get('/login/github', function () {
    return Socialite::driver('github')->redirect();
})->name('github.login');


// GitHub callback
Route::get('/login/github/callback', function () {
    try {
        $githubUser = Socialite::driver('github')->user();
    } catch (\Exception $e) {
        return redirect('/login')->withErrors('Failed to authenticate with GitHub.');
    }

    // Find or create user
    $user = User::firstOrCreate(
        ['email' => $githubUser->getEmail()],
        [
            'name' => $githubUser->getName(),
            'github_id' => $githubUser->getId(),
            'github_token' => $githubUser->token,
            'password' => bcrypt(String::random(24)), // required by Laravel auth
        ]
    );

    // Log the user in
    Auth::login($user, true); // true = remember me

    return redirect()->intended('/dashboard'); // or '/home'
});

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes (Protected)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Skills
    Route::get('/skills', [SkillController::class, 'index'])->name('skills');

    // Services
    Route::resource('services', ServiceController::class);

    // Projects
    Route::resource('projects', ProjectController::class);

// Redirect to GitHub for authentication
Route::get('/login/github', function () {
    return Socialite::driver('github')->redirect();
})->name('github.login');

// Handle the callback from GitHub
Route::get('/login/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    // You can now log the user in or create an account
    // Example:
    // $user = User::firstOrCreate([...]);

    // Auth::login($user);

    return redirect('/dashboard'); // or wherever you want to redirect after login
})->name('github.callback');
});

// Auth Routes (Breeze)
require __DIR__.'/auth.php';
