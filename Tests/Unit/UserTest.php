<?php

namespace Tests\Unit;

use http\Client\Curl\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testIndexReturnsAllUsers()
    {
        $response = $this->get('/api/utilisateurs');
        $response->assertStatus(200);
    }

    public function testUserStructureOK(){
        $response = $this->get('/api/utilisateurs');
        $response->assertJsonStructure([
        '*' => [
            'id',
            'nom',
            'prenom',
            'idTypeUser',
            'email',
            'password',
            'age'
        ]
        ]);
    }

    public function testShowReturnsOneUser()
    {
        $response = $this->get('/api/utilisateurs/1');
        $response->assertStatus(200);
    }

    public function testShowReturns404IfUserNotFound()
    {
        $response = $this->get('/api/utilisateurs/999');
        $response->assertContent("{}");
    }
}
