<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->put('/api/v1/5/reservations',[
            'user_id' => 1,
            'day' => '2000-06-03 18:00:00',
            'number' => 2
        ]);

        $response->assertStatus(200);

        $response = $this->get('/api/v1/1/reservations');

        $response->assertStatus(200);

        $response = $this->delete('/api/v1/1/reservations',[
            'reservation_id' => 1,
        ]);

        $response->assertStatus(200);
    }
}
