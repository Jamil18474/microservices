<?php

namespace Tests\Unit;

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


    protected function tearDown(): void
    {
        $this->assertDatabaseHas('type_users', ['nom' => 'Admin']);
        $this->assertDatabaseHas('type_users', ['nom' => 'User']);
        parent::tearDown();
    }
}
