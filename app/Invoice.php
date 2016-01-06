<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Invoice extends Model
{
	protected $table = 'invoices';
	protected $dateFormat = 'd-m-Y';
	protected $dates = ['invoice_date', 'due_date'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'invoice_number',
		'customer_id',
		'invoice_date',
		'due_date',
	];

	public function __construct(array $attributes = array())
	{
		$this->setRawAttributes(array(
			'invoice_date' => $this->getDefaultInvoiceDate(),
			'due_date' => $this->getDefaultDueDate(),
			'invoice_number' => $this->getNextInvoiceNumber(),
		), true);
		parent::__construct($attributes);
	}

	private function getNextInvoiceNumber()
	{
		return DB::table('invoices')->max('invoice_number')+1;
	}

	private function getDefaultInvoiceDate()
	{
		return Carbon::today();
	}

	private function getDefaultDueDate()
	{
		return Carbon::today()->addDays(7);
	}

	public function getDescriptionAttribute()
	{
		return $this->invoice_number.': '.$this->customer->fullname;
	}

	/**
	 * Setup the relationship to customers
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}

	/**
	 * Get the invoice items for this invoice
	 */
	public function invoice_items()
	{
		return $this->hasMany('App\InvoiceItem');
	}

	public function getTotalAttribute()
	{
		return $this->invoice_items->sum('total');
	}

	public function getOwingAttribute()
	{
		return $this->total - $this->paid;
	}

	/**
 	 * Convert due date into an instance of Carbon

	 * @param $value
	 */
	public function setDueDateAttribute($value)
	{
		$this->attributes['due_date'] = Carbon::createFromFormat('d-m-Y', $value);
	}

	/**
	 * Convert invoice date into an instance of Carbon
	 *
	 * @param $value
	 */
	public function setInvoiceDateAttribute($value)
	{
		$this->attributes['invoice_date'] = Carbon::createFromFormat('d-m-Y', $value);
	}
}
