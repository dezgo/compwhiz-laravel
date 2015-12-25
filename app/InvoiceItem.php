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
		'buyprice',
		'sellprice',
		'description',
	];

	/**
	* Get the category for this invoice item
	*/
	public function category()
	{
		return $this->belongsTo('App\InvoiceItemCategory');
	}

	public static function invoiceItemList() {
		return InvoiceItem::selectRaw('CONCAT(first_name, "&nbsp;", last_name, "&nbsp;of&nbsp;", suburb) as fullname, id')
			->orderBy('first_name')->lists('fullname', 'id');
	}
}
