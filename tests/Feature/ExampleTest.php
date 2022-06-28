<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_create_user()
    {
        $data = [
            'name' => 'vahid',
            'age' => '36',
            'email' => 'vahid.test@gmail.com',
            'country_id' => '1'
        ];

        $response = $this->post('/api/users', $data);

        $response->assertStatus(201);
    }
}
