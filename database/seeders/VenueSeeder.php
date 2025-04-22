<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venue;
use Faker\Factory as Faker;

class VenueSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        
        $venues = [
            'Saina Nehwal Sports Complex',
            'P.V. Sindhu Badminton Court',
            'Shuttle King Arena',
            'Nalini Sports Center',
            'Ace Sports Arena',
            'Shuttle Masters Stadium',
            'Babu Badminton Ground',
            'Vijay Sports Hall',
            'Kolkata Racket Court',
            'Chennai Shuttle Court'
        ];

        foreach ($venues as $venue) {
            $openingHour = $faker->numberBetween(5, 8);
            $closingHour = $faker->numberBetween(20, 23);

            Venue::create([
                'name' => $venue,
                'opening_time' => sprintf('%02d:00:00', $openingHour),
                'closing_time' => sprintf('%02d:00:00', $closingHour),
            ]);
        }
    }
}
