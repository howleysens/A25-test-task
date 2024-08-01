<?php

namespace Tests\Feature\Api;

use App\Models\Employee;
use Tests\TestCase;

class CreateTransactionTest extends TestCase
{
    public function test_create_transaction(): void
    {
        $employee = Employee::query()->create([
            'email' => 'test@test.com',
            'password' => 123,
            'hourly_rate' => 1,
        ]);
        $response = $this->post('/api/transaction', [
            'employee_id' => $employee->id,
            'work_hours' => 6,
        ]);
        $response->assertStatus(200);
        $response->assertJsonPath('status', 'Транзакция произведена.');
        $this->assertDatabaseHas('transactions', [
            'employee_id' => $employee->id,
            'work_hours' => 6,
        ]);
    }
}
