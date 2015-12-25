<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Invoice;
use App\InvoiceItemCategory;

class InvoiceController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$invoices = Invoice::all();
		return view('invoice.index', compact('invoices'));
	}

	/**
	 * Show the form for creating a new invoice - step2, the actual invoice.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$customer_list = Customer::customerList();
		$invoice_items = InvoiceItem::invoiceItemList();
		return view('invoice.create',compact('customer_list'));
	}

	/**
	 * Add items to invoice
	 *
	 * @param Invoice $invoice
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function add_invoice_items(Invoice $invoice)
	{
		return view('invoice/create_invoice_item', compact('invoice'));
	}

	/**
	 * Store newly created invoice
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store_top(CustomerRequest $request)
	{
		if (isset($request->customer_list))
		{
			$customer = Customer::find($request->customer_list);
		}
		else
		{
			$customer = new Customer();
		}
		$customer->first_name = $request->first_name;
		$customer->last_name = $request->last_name;
		$customer->address1 = $request->address1;
		$customer->address2 = $request->address2;
		$customer->suburb = $request->suburb;
		$customer->state = $request->state_list;
		$customer->postcode = $request->postcode;
		$customer->save();

		$invoice = new Invoice();
		$invoice->invoice_date = $request->invoice_date;
		$invoice->invoice_number = $request->invoice_number;
		$invoice->customer = $customer;

		$item_categories = InvoiceItemCategory::lists('description', 'id');
		return view('invoice/create_invoice_item', compact('invoice', 'item_categories'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
