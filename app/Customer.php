<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
	use SoftDeletes;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * Explicitly specify the table name for this model.
	 *
	 * @var string
	 */
	protected $table = 'customers';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name',
		'last_name',
		'address1',
		'address2',
		'suburb',
		'state',
		'postcode'
	];

	public static function customerList() {
		return Customer::selectRaw('CONCAT(first_name, "&nbsp;", last_name, "&nbsp;of&nbsp;", suburb) as fullname, id')
			->orderBy('first_name')->lists('fullname', 'id');
	}

}
