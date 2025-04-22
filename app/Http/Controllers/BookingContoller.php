<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Auth;
use Illuminate\Http\Request;
use Log;

class BookingContoller extends Controller
{
    public function bookSlot(Request $request)
    {
        

        $data = $request->only(['venue_id', 'slot_id', 'booking_date']);

        Booking::create([
            'user_id' => Auth::user()->id, 
            'venue_id' => $data['venue_id'],
            'slot_id' => $data['slot_id'],
            'booking_date' => $data['booking_date'],
        ]);
        Log::info('Booking Created', $data);
        return redirect()->back()->with('success', 'Booking done successfully!');
    }
}
