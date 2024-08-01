<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function store(EmployeeStoreRequest $request)
    {
        $employee = Employee::create($request->validated());

        return EmployeeResource::make($employee);
    }
}
