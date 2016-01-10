<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\InvoiceItem;
use App\Http\Requests\InvoiceRequest;

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
	public function create($customer_id = 0)
	{
		$invoice = new Invoice();
		if ($customer_id > 0) {
			$invoice->customer_id = $customer_id;
		}
		$invoice_items = InvoiceItem::invoiceItemList();
		return view('invoice.create',compact('invoice','invoice_items'));
	}

	/**
	 * Store newly created invoice
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(InvoiceRequest $request)
	{
//		dd($request->all());
		Invoice::create($request->all());
		return redirect('/invoice');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$invoice = Invoice::findOrFail($id);
		return view('invoice.show', compact('invoice'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$invoice = Invoice::findOrFail($id);
		return view('invoice.edit', compact('invoice'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(InvoiceRequest $request, $id)
	{
		$invoice = Invoice::findOrFail($id);
		$invoice->update($request->all());
		return redirect('/invoice');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$invoice = Invoice::findOrFail($id);
		$invoice->delete();
		return redirect('/invoice');
	}

	/**
	 * Show the specified resource to be deleted.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function delete($id)
	{
		$invoice = Invoice::findOrFail($id);
		return view('invoice.delete', compact('invoice'));
	}

	/**
	 * Show the printed version of the invoice
	 *
	 */
	public function prnt($id)
	{
		$invoice = Invoice::findOrFail($id);
		return view('invoice.print', compact('invoice'));
	}

	/**
	 * Email the invoice to the Customer
	 */
	public function email($id)
	{
		$invoice = Invoice::findOrFail($id);

		$sent = Mail::send('invoice.print', ['invoice' => $invoice], function ($m) use ($invoice) {
            $m->from('mail@computerwhiz.com.au', 'Computer Whiz - Canberra');

			$m->to('test@derekgillett.com', 'Derek')->subject('Hi '.$invoice->customer->first_name.', here\'s that invoice');
			// $m->to($user->email, $user->name)->subject('Here\'s that invoice!');
        });
	}
}
