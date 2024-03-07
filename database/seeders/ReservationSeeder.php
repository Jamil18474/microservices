<?php

namespace Database\Seeders;

use App\Models\Reservations;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservations::factory(10)->create();
    }
}
