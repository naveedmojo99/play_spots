<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(){
        $month = Carbon::now()->format('Y-m'); // current month in YYYY-MM format

        // Fetch all venues with total booking count
        $venues = \App\Models\Venue::withCount('bookings')->get();
    
        // Add monthly booking count, category and rank
        foreach ($venues as $venue) {
            $monthlyCount = DB::table('bookings')
            ->where('venue_id', $venue->id)
            ->whereRaw("DATE_FORMAT(booking_date, '%Y-%m') = ?", [$month]) // Change 'created_at' to 'booking_date'
            ->count();

             $venue->monthly_bookings = $monthlyCount;
            // Category assignment
            if ($monthlyCount > 15) {
                $venue->category = 'A';
            } elseif ($monthlyCount >= 10) {
                $venue->category = 'B';
            } elseif ($monthlyCount >= 5) {
                $venue->category = 'C';
            } else {
                $venue->category = 'D';
            }
        }
    
        // Sort by monthly bookings and assign ranks
        $venues = $venues->sortByDesc('monthly_bookings')->values();
        foreach ($venues as $index => $venue) {
            $venue->rank = $index + 1;
        }
    
        $maxBookings = $venues->max('bookings_count');
        $minBookings = $venues->min('bookings_count');
    
        return view('reports.index', compact('venues', 'maxBookings', 'minBookings'));
    }
}


