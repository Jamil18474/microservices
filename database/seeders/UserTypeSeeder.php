<?php

namespace Database\Seeders;

use App\Models\typeUsers;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        typeUsers::factory(10)->create();
    }
}
