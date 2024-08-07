<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'work_hours',
        'is_paid',
    ];

    protected $casts = [
        'paid' => 'boolean',
    ];

    public static function getUnpaidSalaries()
    {
        return self::query()
            ->join('employees', 'transactions.employee_id', '=', 'employees.id')
            ->select(['employee_id', DB::raw('SUM(work_hours) * employees.hourly_rate as unpaid_salary')])
            ->where('is_paid', '=', 0)
            ->groupBy('employee_id')
            ->get();
    }

    public static function paySalaries()
    {
        return self::query()->where('is_paid', '=', false)->update(['is_paid' => true]);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
