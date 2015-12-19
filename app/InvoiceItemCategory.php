<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItemCategory extends Model
{
	protected $table = 'invoice_item_categories';

	protected $fillable = ['description'];
}
