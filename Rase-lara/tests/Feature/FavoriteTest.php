<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FavoriteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        {
            $response = $this->post('/api/v1/1/favorites', [
                'store_id' => 1,
            ]);

            $response->assertStatus(200);
        } 
        
        {
            $response = $this->get('/api/v1/1/favorites');

            $response->assertStatus(200);
        } 
        
        {
            $response = $this->delete('/api/v1/1/favorites', [
                    'store_id' => 1,
                ]);

            $response->assertStatus(200);
        }
    }

    
        

        
    
}
