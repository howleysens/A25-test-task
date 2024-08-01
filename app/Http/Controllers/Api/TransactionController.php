<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionStoreRequest;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function store(TransactionStoreRequest $request)
    {
        $transaction = Transaction::query()->create($request->validated());

        return response()->json(['status' => 'Транзакция произведена.'], 200);
    }

    public function getSalaries()
    {
        $unpaidSalaries = Transaction::getUnpaidSalaries();

        return response()->json($unpaidSalaries);
    }

    public function paySalaries()
    {
        try {
            $paySalariesRequest = Transaction::paySalaries();

            return response()->json(['status' => 'Статус изменен на "выплачено"']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'Ошибка: '.$exception]);
        }
    }
}
