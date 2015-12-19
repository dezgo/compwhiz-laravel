<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsOnInvoiceTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items_on_invoice', function (Blueprint $table) {
			$table->integer('invoice_id')->unsigned();
			$table->foreign('invoice_id')->references('id')->on('invoices');
			$table->integer('invoice_item_id')->unsigned();
			$table->foreign('invoice_item_id')->references('id')->on('invoice_items');
			$table->decimal('quantity',6,2);
			$table->decimal('price',6,2);
			$table->decimal('gst',6,2);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items_on_invoice');
	}
}
