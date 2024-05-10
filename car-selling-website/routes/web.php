<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   // Registration Routes
Route::get('/register', [RegisteredUserController::class, 'create'])
->middleware('guest')
->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
->middleware('guest');

// Login Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
->middleware('guest')
->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
->middleware('guest');

// Logout Route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
->middleware('auth')
->name('logout');

// Password Reset Routes
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
->middleware('guest')
->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
->middleware('guest')
->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
->middleware('guest')
->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
->middleware('guest')
->name('password.update');

// Email Verification Routes
Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
->middleware('auth')
->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
->middleware(['auth', 'signed', 'throttle:6,1'])
->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
->middleware(['auth', 'throttle:6,1'])
->name('verification.send');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
