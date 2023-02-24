<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
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
            'description' => 'required|string|max:255',
            'plu_no' => 'required|integer',
            'department_id' => 'required|integer',
            // 'supplier_id' => 'required|integer',
            'unit_id' => 'required|integer',
            // 'number_of_units' => 'required|integer',
            'tax_id' => 'required|integer',
            // 'carton_cost' => 'required|numeric|min:0',
            'open_price' => 'nullable|integer',
            'open_description' => 'nullable|integer',
            'modifier_popup' => 'nullable|integer',
            'inc_price_in_kp' => 'nullable|integer',
            // 'no_of_dockets' =>  'nullable|integer',
            'kp_description' => 'nullable|string|max:255',
            ];
    }
}
