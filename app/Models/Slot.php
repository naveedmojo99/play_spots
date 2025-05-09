<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [ 'start_time', 'end_time'];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}