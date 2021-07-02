<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->post('/api/v1/users/login',[
            'email' => 'ryuna6337@gmail.com',
            'password' => 'test'
        ]);

        $response->assertStatus(200);
    }
}
