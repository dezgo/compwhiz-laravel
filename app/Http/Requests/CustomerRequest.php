<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class CustomerRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'address1' => 'required|min:2',
            'suburb' => 'required|min:2',
            'state' => 'required|min:2|max:3',
            'postcode' => 'required|Regex:/^[0-9]{4}$/',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'postcode.regex' => 'Postcode must be 4 numbers',
        ];
    }
}
