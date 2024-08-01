<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateEmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateEmployee(): void
    {
        $response = $this->post('/api/employees', [
            'email' => 'test@test.com',
            'password' => '123',
            'hourly_rate' => 1,
        ]);
        $response->assertStatus(201);
        $response->assertJsonPath('data.email', 'test@test.com');
        $this->assertDatabaseHas('employees', [
            'email' => 'test@test.com',
        ]);
    }
}
