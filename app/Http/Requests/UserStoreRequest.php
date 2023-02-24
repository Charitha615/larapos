<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'employee_number' => 'required|integer|min:1|unique:users,employee_number',
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'branch_id' => 'required|integer|min:0',
            'role_id' => 'required|integer|min:0',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|string|min:8',
            'card_password' => 'nullable|string|min:5',
        ];
    }
}
