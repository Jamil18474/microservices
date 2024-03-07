<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testIndexReturnsAllUsers()
    {
        $response = $this->get('/api/utilisateurs');
       // $response = $this->json('GET', '/api/users');
        $response->assertStatus(200);
        /*    ->assertJsonStructure([
                '*' => ['id', 'userType', 'password', 'email', 'age', 'reservations']
            ]);*/
    }

    public function testShowReturnsOneUser()
    {
        $response = $this->get('/api/utilisateurs/1');
        //$response = $this->json('GET', '/api/users/1');
        $response->assertStatus(200);
           /* ->assertJsonStructure([
                'id', 'userType', 'password', 'email', 'age', 'reservations'
            ]);*/
    }

    public function testShowReturns404IfUserNotFound()
    {
        $response = $this->get('/api/utilisateurs/999');
       // $response = $this->json('GET', '/api/utilisateurs/999');
        $response->assertStatus(404);
         /*   ->assertJsonStructure([
                'message'
            ]);*/
    }

    protected function tearDown(): void
    {
        $this->assertDatabaseHas('users', ['email' => 'carson.murphy@example.net']);
        parent::tearDown();
    }
}
