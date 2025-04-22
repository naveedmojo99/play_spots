<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VenueSeeder extends Seeder
{
    public function run(): void
    {
        // Temporarily disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the venues table to remove old data before seeding
        DB::table('venues')->truncate();

        // Insert 10 sample badminton courts located in Kozhikode city with specific locations and one-hour gap times
        DB::table('venues')->insert([
            [
                'name' => 'Kozhikode Sports Complex',
                'location' => 'Vellayil, Kozhikode',
                'description' => 'Indoor badminton court with world-class facilities.',
                'opening_time' => '06:00:00',
                'closing_time' => '22:00:00',
            ],
            [
                'name' => 'SMI Badminton Academy',
                'location' => 'Kallai, Kozhikode',
                'description' => 'Badminton academy with well-maintained courts and training programs.',
                'opening_time' => '07:00:00',
                'closing_time' => '21:00:00',
            ],
            [
                'name' => 'Kozhikode Indoor Badminton Court',
                'location' => 'Calicut University, Kozhikode',
                'description' => 'An indoor facility for both professional and recreational badminton.',
                'opening_time' => '08:00:00',
                'closing_time' => '20:00:00',
            ],
            [
                'name' => 'Elite Badminton Academy',
                'location' => 'Puthiyara, Kozhikode',
                'description' => 'Badminton training center offering individual coaching.',
                'opening_time' => '09:00:00',
                'closing_time' => '21:00:00',
            ],
            [
                'name' => 'Lakshmi Badminton Academy',
                'location' => 'Mavoor Road, Kozhikode',
                'description' => 'Badminton court for training and casual play.',
                'opening_time' => '06:00:00',
                'closing_time' => '19:00:00',
            ],
            [
                'name' => 'Polytechnic Badminton Court',
                'location' => 'Kozhikode City, Kozhikode',
                'description' => 'Public badminton court for all age groups.',
                'opening_time' => '07:00:00',
                'closing_time' => '18:00:00',
            ],
            [
                'name' => 'Sree Badminton Court',
                'location' => 'Nellikkode, Kozhikode',
                'description' => 'A high-quality badminton court for sports enthusiasts.',
                'opening_time' => '08:00:00',
                'closing_time' => '22:00:00',
            ],
            [
                'name' => 'Nellikkode Badminton Court',
                'location' => 'Kondotty, Kozhikode',
                'description' => 'A local badminton court perfect for friendly matches.',
                'opening_time' => '06:00:00',
                'closing_time' => '20:00:00',
            ],
            [
                'name' => 'Kozhikode Badminton Hall',
                'location' => 'SM Street, Kozhikode',
                'description' => 'A spacious badminton hall for tournaments and casual play.',
                'opening_time' => '07:00:00',
                'closing_time' => '23:00:00',
            ],
            [
                'name' => 'Modern Badminton Academy',
                'location' => 'Ram Mohan Road, Kozhikode',
                'description' => 'Academy with professional coaching for aspiring players.',
                'opening_time' => '08:00:00',
                'closing_time' => '21:00:00',
            ],
        ]);

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
