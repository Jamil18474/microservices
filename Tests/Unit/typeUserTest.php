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

    public function test_TypeUser_creation(){
        $response = $this->post('/api/types', ['nom' => 'test']);
        $response->assertStatus(200);
    }

    public function test_TypeUser_update(){
        $response = $this->put('api/types/11', ['nom' => 'nouveau nom']);
        $response->assertStatus(200);

        $response = $this->get('api/types/11');
        $response->assertJsonStructure([
            '*' => 'nom'
        ])->assertJson(['nom' => 'nouveau nom']);
    }

    public function test_typeUser_delete(){
        $response = $this->delete('api/types/11')->assertStatus(200);
        $response = $this->get('api/types/11')->assertContent('{}');
    }
}
