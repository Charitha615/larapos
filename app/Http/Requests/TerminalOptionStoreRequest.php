<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerminalOptionStoreRequest extends FormRequest
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
            'terminal_id' => 'required|int',
            'terminal_option_detail_id' => 'required|int',
            'terminal_value' => 'nullable|string|max:100',
            'terminal_purpose' => 'nullable|string|max:45',
        ];
    }
}
