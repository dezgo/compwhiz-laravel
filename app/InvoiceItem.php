<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
	protected $table = 'invoice_items';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'category_id',
		'description',
		'quantity',
		'price',
		'invoice_id'
	];

	/**
	* Get the category for this invoice item
	*/
	public function category()
	{
		return $this->belongsTo('App\InvoiceItemCategory');
	}

	public static function invoiceItemList($category_id = 0) {
		if ($category_id == 0) {
			return InvoiceItem::orderBy('description')
				->lists('description', 'description');
		}
		else {
			return InvoiceItem::all()
				->where('category_id', $category_id)
				->orderBy('description')
				->lists('description', 'description');
		}
	}

	public function getTotalAttribute()
	{
		return $this->quantity * $this->price;
	}

}
