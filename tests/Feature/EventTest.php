<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{

    /**
     * Test duplication of users
     *
     * @return void
     */
    public function test_user()
    {
        $response = $this->post('/api/login/',[
            'email'=>'rkihn@example.net',
            'password' => 'password'
        ]);
        $response->assertStatus(200);
    }
}
