<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'venue_id',
        'booking_date',
       'slot_id'
    ];

  
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
