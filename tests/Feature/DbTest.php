<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DbTest extends TestCase
{

    /**
     * Test existence of database
     *
     * @return void
     */
    public function test_db()
    {
        $this->assertDatabaseMissing('users',[
            'name' => 'Pepa'
        ]);
    }
}
