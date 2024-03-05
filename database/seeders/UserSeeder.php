<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MongoDB\BSON\Int64;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "nom" => Str::random(7),
            "prenom" => Str::random(9),
            "idTypeUser" => Int::random,
            "email" => Str::random(9)."@gmail.com",
            "password" => Str::random(12),
            "age" => Int::random
        ]);
    }
}
