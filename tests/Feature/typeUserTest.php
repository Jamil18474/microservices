<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class typeUserTest extends TestCase
{
    public function test_example(): void
    {
        $response = $this->get('/api/types');

        $response->assertStatus(200);
    }
    public function testIndexReturnsAllUsers()
    {
        $response = $this->json('GET', '/api/users');
        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'userType', 'password', 'email', 'age', 'reservations']
            ]);
    }

    public function testShowReturnsOneUser()
    {
        $response = $this->json('GET', '/api/users/1');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'id', 'userType', 'password', 'email', 'age', 'reservations'
            ]);
    }

    public function testShowReturns404IfUserNotFound()
    {
        $response = $this->json('GET', '/api/users/999');
        $response->assertStatus(404)
            ->assertJsonStructure([
                'message'
            ]);
    }

    protected function tearDown(): void
    {
        $this->assertDatabaseHas('users', ['email' => 'admin@admin.fr']);
        $this->assertDatabaseHas('user_types', ['name' => 'Admin']);
        $this->assertDatabaseHas('user_types', ['name' => 'User']);

        parent::tearDown();
    }
}
