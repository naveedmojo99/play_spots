<?php

use App\Http\Controllers\BookingContoller;
use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\VenueController;
// Show OTP request form
Route::get('/otp-login', function () {
    return view('otp_login');
})->name('otp.login');



Route::get('/venues', [VenueController::class, 'index'])->name('venues.index');
Route::get('/venues/{venue}/slots', [VenueController::class, 'showSlots'])->name('venues.slots');
Route::post('/bookslot',[BookingContoller::class,'bookSlot'])  ->middleware('otp.auth')->name('book.slot');
Route::get('/reports',[ReportsController::class,'index'])->name('reports.index');
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
    return redirect('http://127.0.0.1:8000/venues');
})->middleware('auth')->name('logout');
