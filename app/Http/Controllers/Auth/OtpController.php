<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OtpController extends Controller
{
    // Request OTP
    public function requestOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|size:10',
            'name' => 'nullable|string|max:255'
        ]);

        // Generate a random OTP
        $otp = rand(100000, 999999);

        // Save OTP to the database
        Otp::updateOrCreate(
            ['mobile' => $request->mobile],
            ['otp' => $otp, 'expires_at' => Carbon::now()->addMinutes(5)]
        );

        session([
            'mobile' => $request->mobile,
            'name' => $request->name ?? 'Guest',
        ]);

        // Redirect user to OTP verification page
        return redirect()->route('otp.verify');
    }

    // Show OTP verification form
    public function showOtpForm(Request $request)
    {
        return view('verify_otp', [
            'mobile' => session('mobile'),
            'name' => session('name'),
        ]);
    }

    // Verify OTP and Login/Register
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|size:10',
            'otp' => 'required|string|size:6',
        ]);
    
        $otpRecord = Otp::where('mobile', $request->mobile)
                        ->where('otp', $request->otp)
                        ->where('expires_at', '>', now())
                        ->first();
    
        if (!$otpRecord) {
            return redirect()->route('otp.verify')->with('error', 'Invalid or expired OTP');
        }
    
        // Create or find user
        $user = User::firstOrCreate(
            ['mobile' => $request->mobile],
            ['name' => $request->name ?? 'Guest']
        );
    
        // Log the user in
        Auth::login($user);
    
        // Clear OTP and session
        $otpRecord->delete();
        session()->forget(['mobile', 'name']);
    
        // Redirect to home or dashboard
        return redirect()->route('home')->with('success', 'Login successful!');
    }
}
