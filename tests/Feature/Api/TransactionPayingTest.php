<?php

namespace Tests\Feature\Api;

use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionPayingTest extends TestCase
{
    use RefreshDatabase;

    public function test_transaction_paying(): void
    {
        $unpaidTransaction = Transaction::find(1);
        $response = $this->postJson('/api/employees/pay-salaries');
        $response->assertStatus(200);
        $unpaidTransaction->update([
            'is_paid' => true,
        ]);
        $this->assertDatabaseHas('transactions', [
            'is_paid' => true,
        ]);
    }
}
