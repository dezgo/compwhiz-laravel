<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Invoice extends Model
{
	protected $table = 'invoices';

	protected $dates = ['invoice_date'];

	public function getNextInvoiceNumber() {
		return DB::table('invoices')->max('id')+1;
	}

	public function getDefaultInvoiceDate() {
		return Carbon::today();
	}

	/**
	 * Get the invoice items for this invoice
	 */
	public function invoiceitems()
	{
		return $this->hasMany('App\InvoiceItem');
	}
}
