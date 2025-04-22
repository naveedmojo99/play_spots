<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OtpController;
// Show OTP request form
Route::get('/otp-login', function () {
    return view('otp_login');
});


// Handle OTP request (from login form)
Route::post('/request-otp', [OtpController::class, 'requestOtp'])->name('otp.request');

// Show OTP verification form
Route::get('/verify-otp', [OtpController::class, 'showOtpForm'])->name('otp.form');

// Handle OTP verification
Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('otp.verify');


Route::get('/home', function () {
    $user = Auth::user();
    return view('home', compact('user'));
})->name('home')->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/otp-login');
})->middleware('auth')->name('logout');
