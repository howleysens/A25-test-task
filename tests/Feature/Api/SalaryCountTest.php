<?php

namespace Tests\Feature\Api;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalaryCountTest extends TestCase
{
    use RefreshDatabase;

    public function test_salary_count(): void
    {
        $response = $this->get('/api/employees/unpaid-salaries');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'employee_id' => 1,
            'unpaid_salary' => 6,
        ]);
    }
}
