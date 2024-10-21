<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_user_registration()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Jose Daniel',
            'email' => 'jose@ejemplo.com',
            'password' => 'contraseña123'
        ]);

        $response->assertStatus(200)
       ;
    }
}
