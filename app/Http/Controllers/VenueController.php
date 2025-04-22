<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index()
    {
        // Fetch all venues from the database
        $venues = Venue::all();
       
        // Return the view with the venues data
        return view('venues.index', compact('venues'));
    }

    public function showSlots($id)
    {
        $venue = Venue::findOrFail($id);
        $slots = Slot::all();
        
        return view('venues.slots', compact('venue', 'slots'));
    }
}
