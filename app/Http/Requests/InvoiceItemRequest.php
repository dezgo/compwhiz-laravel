<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class InvoiceItemRequest extends Request
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
			'category_id' => 'required',
			'price' => 'required|numeric',
			'quantity' => 'required|numeric',
			'description' => 'required|string|min:2|unique:invoice_items,description',
		];
	}

	public function messages()
	{
		return [
			'category_id.required' => 'The category field is required'
		];
	}
}
