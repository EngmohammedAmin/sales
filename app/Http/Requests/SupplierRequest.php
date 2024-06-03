<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'start_balance_status' => 'required',
            'start_balance' => 'required|min:0',
            'active' => 'required',
            'suppliers_categories_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم المورد مطلوب',
            'start_balance_status.required' => 'حالة رصيد الأولي مطلوب',
            'start_balance.required' => ' الرصيد الأولي مطلوب',
            'active.required' => 'حالة التفعيل مطلوبة',
            'suppliers_categories_id.required' => ' نوع فئة الموردين مطلوبة',

        ];
    }
}