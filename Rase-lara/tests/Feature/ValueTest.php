<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValueTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    { 
        {
            $response = $this->post('/api/v1/2/values', [
                'user_id' => 1,
                'value' => 5,
            ]);

            $response->assertStatus(200);
        }        
        {
            $response = $this->get('/api/v1/2/values');

            $response->assertStatus(200);
        }

        
    }
}
