<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
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
            'first_name' => 'required|string|max:245',
            'last_name' => 'required|string|max:245',
            'card_number' => 'required|string|max:245',
            'store_credit' => 'nullable|numeric',
            'phone_no' => 'nullable|string|max:20',
            'mobile_no' => 'nullable|string|max:20',
            'email_address' => 'nullable|string|max:45',
            'discount' => 'nullable|numeric|between:0.01,99.99',
            'address' => 'nullable|string|max:255',
            'suburb' => 'nullable|string|max:45',
            'state' => 'nullable|string|max:45',
            'post_code' => 'nullable|string|max:45',
            'notes' => 'nullable|string|max:255'
            
        ];
    }
}
