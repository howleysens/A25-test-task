<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'exists:employees,id'],
            'work_hours' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required' => 'Поле employee_id обязательно для заполнения',
            'employee_id.exists' => 'Указанный сотрудник не существует',
            'hours.required' => 'Поле hours обязательно для заполнения.',
            'hours.numeric' => 'Поле hours должно быть числом',
            'hours.min' => 'Количество часов должно быть больше 0',
        ];
    }
}
