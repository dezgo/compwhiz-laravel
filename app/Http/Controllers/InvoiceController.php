<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\InvoiceItem;
use App\Customer;
use App\Http\Requests\InvoiceRequest;
use App\Jobs\SendInvoiceEmail;

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
	 * Use this method when coming into the invoice creation screen*
	 * having already selected a customer
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function createFromCustomer(Customer $customer)
	{
		return redirect('/invoice/'.$customer->id.'/create');
	}

	/**
	 * Show the form for creating a new invoice - step2, the actual invoice.
	 * optionally pass in the customer - to cover the wizard where Customer
	 * is selected on previous screen
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Customer $customer = null)
	{
		$invoice = new Invoice();
		if (!is_null($customer)) {
			$invoice->customer_id = $customer->id;
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
		$invoice = Invoice::create($request->all());
		return redirect('/invoice/'.$invoice->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Invoice $invoice)
	{
		return view('invoice.show', compact('invoice'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Invoice $invoice)
	{
		$invoice_items = InvoiceItem::all()->where('invoice_id', $invoice->id);
		return view('invoice.edit', compact('invoice','invoice_items'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(InvoiceRequest $request, Invoice $invoice)
	{
		$invoice->update($request->all());
		return redirect('/invoice/'.$invoice->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Invoice $invoice)
	{
		$invoice->delete();
		return redirect('/invoice');
	}

	/**
	 * Show the specified resource to be deleted.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Invoice $invoice)
	{
		return view('invoice.delete', compact('invoice'));
	}

	/**
	 * Show the printed version of the invoice
	 *
	 */
	public function prnt(Invoice $invoice)
	{
		return view('invoice.print', compact('invoice'));
	}

	/**
	 * Email the invoice to the Customer
	 */
	public function email(Invoice $invoice)
	{
		if ($invoice->customer->email != '') {
			$this->dispatch(new SendInvoiceEmail($invoice));
			\Session()->flash('status-success', 'Email sent to '.$invoice->customer->email);
		}
		else {
			\Session()->flash('status-warning', 'Customer does not have an email address!');
		}

		return redirect('/invoice/'.$invoice->id);
	}
}
