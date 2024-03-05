<?php

namespace Database\Seeders;

use Faker\Calculator\Iban;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("reservations")->insert([
            "idUser" => Int::random,
            "idTarif" => Int::random,
            "idSeance" => Int::random
        ]);
    }
}
