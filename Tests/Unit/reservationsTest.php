<?php

namespace Tests\Unit;

use App\Models\Reservations;
use Database\Seeders\ReservationSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UserTypeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class reservationsTest extends TestCase
{
    public function test_reservation_index(): void
    {
        $response = $this->get('api/reservation');

        $response->assertStatus(200)
            ->assertJsonStructure([
            '*' => ['idUser', 'idTarif', 'idSeance']
        ]);
    }

    public function test_reservation_find(): void{
        $response = $this->get('api/reservation/1');

        $response->assertStatus(200);
    }

    public function test_reservation_not_found(): void{
        $response = $this->get('api/reservation/999');

        $response->assertContent('{}');
    }

    public function test_creation_reservation(): void{
        $response = $this->post('api/reservation',['idUser' => 2],['idTarif' => 2, 'idSeance' => 2]);
        $response->assertStatus(200);
    }
}
