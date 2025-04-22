<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Slot;
use App\Models\Venue;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Log;
class VenueController extends Controller
{
    public function index()
    {
        // Fetch all venues from the database
        $venues = Venue::all();
       
        // Return the view with the venues data
        return view('venues.index', compact('venues'));
    }

    public function showSlots($id,Request $request)
{
    $venue = Venue::findOrFail($id);


    $bookingDate = $request->input('date', Carbon::today()->toDateString());
    // Convert opening and closing times to Carbon instances for comparison
    $openingTime = Carbon::createFromFormat('H:i:s', $venue->opening_time);
    $closingTime = Carbon::createFromFormat('H:i:s', $venue->closing_time);

    // Handle midnight case (if closing is 00:00:00, treat it as 24:00:00)
    if ($closingTime->lessThan($openingTime)) {
        $closingTime->addDay(); // to handle venues open overnight
    }

    // Get all slots
    $allSlots = Slot::all();

    // Filter slots within the opening and closing time
    $filteredSlots = $allSlots->filter(function ($slot) use ($openingTime, $closingTime) {
        $start = Carbon::createFromFormat('H:i:s', $slot->start_time);
        $end = Carbon::createFromFormat('H:i:s', $slot->end_time);

        // Handle wrap-around (midnight)
        if ($end->lessThan($start)) {
            $end->addDay();
        }

        return $start->gte($openingTime) && $end->lte($closingTime);
    })->values(); // reset keys


    $bookedSlots = Booking::where('venue_id', $id)
    ->where('booking_date', $bookingDate)
    ->pluck('slot_id')
    ->toArray();
   
     // Mark slots as booked
     $filteredSlots = $filteredSlots->map(function ($slot) use ($bookedSlots) {
        // Check if the current slot is booked
        $slot->is_booked = in_array($slot->id, $bookedSlots);
        return $slot;
    });
    
    return view('venues.slots', [
        'venue' => $venue,
        'slots' => $filteredSlots,
        'booking_date'=>$bookingDate
        ]);
}
}
