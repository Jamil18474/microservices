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
    public function testCreateUser() {
        $response = $this->post('/api/utilisateurs', [ 'nom' => 'last' ,'prenom' => 'last', 'idTypeUser' => '1', 'email' => 'user@user.com',
            'password' => 'admin',
            'age' => '28']);
        $response->assertStatus(200);

    }
    public function testUpdateUser() {
        $responseput = $this->put('/api/utilisateurs/6', [ 'nom' => 'six' ,'prenom' => 'six', 'idTypeUser' => '1', 'email' => 'huit@hut.com',
            'password' => 'six',
            'age' => '27']);
        $response = $this->get('/api/utilisateurs/6');
        $response->assertJsonStructure([
            '*' =>
                'id',
                'nom',
                'prenom',
                'idTypeUser',
                'email',
                'password',
                'age'
        ])->assertJson(['id' => '6', 'nom' => 'six', 'prenom' => 'six', 'idTypeUser' => '1', 'email' => 'huit@hut.com', 'password' => 'six', 'age' => '27']);

    }

    public function testDeleteUser() {


        $response = $this->delete('api/utilisateurs/2');
        $response = $this->get('/api/utilisateurs/2')->assertContent('{}');

    }
}
