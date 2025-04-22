<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SlotSeeder extends Seeder
{
    public function run()
    {
        $slots = [];

        $start = Carbon::createFromTime(0, 0, 0);
        for ($i = 0; $i < 24; $i++) {
            $slots[] = [
                'start_time' => $start->format('H:i:s'),
                'end_time' => $start->copy()->addHour()->format('H:i:s'),
                'created_at' => now(),
                'updated_at' => now()
            ];
            $start->addHour();
        }

        DB::table('slots')->insert($slots);
    }
}
