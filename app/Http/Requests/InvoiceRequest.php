<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class InvoiceRequest extends Request
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
			'customer_id' => 'required|numeric',
			'invoice_date' => 'required|date',
			'invoice_number' => 'required|unique:invoices,invoice_number|numeric',
			'due_date' => 'required|date',
		];
	}
}
