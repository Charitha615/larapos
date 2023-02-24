<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'voucher_type_id' => 'required|integer',
            'description' => 'required|string|max:85',
            'value' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'print_receipt' => 'nullable|integer',
            'unlimited' => 'nullable|integer',
        ];
    }
}
