<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifierUpdateRequest extends FormRequest
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
            'modifiers_category_id' => 'required|integer',
            'description' => 'required|string|max:100',
            'price_x_tax' => 'required|numeric|min:0.00',
            'price_inc_tax' => 'required|numeric|min:0.00'
        ];
    }
}
