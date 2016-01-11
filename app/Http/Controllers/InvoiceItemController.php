<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\InvoiceItem;
use App\Http\Requests\InvoiceItemRequest;

class InvoiceItemController extends Controller
{
    /**
     * No longer showing the invoiceitem list separately, shown when viewing
     * an invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/invoice');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('invoiceitem.create', compact('invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceItemRequest $request)
    {
        InvoiceItem::create($request->all());
        return redirect('/invoice/'.$request->invoice_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice_item = InvoiceItem::findOrFail($id);
        return view('invoiceitem.show', compact('invoice_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice_item = InvoiceItem::findOrFail($id);
        return view('invoiceitem.edit', compact('invoice_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvoiceItemRequest $request, $id)
    {
        $invoice_item = InvoiceItem::findOrFail($id);
        $invoice_item->update($request->all());
        return redirect('/invoice/'.$invoice_item->invoice->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice_item = InvoiceItem::findOrFail($id);
        $invoice_item->delete();
        return redirect('/invoice/'.$invoice_item->invoice->id);
    }

    /**
     * Show the specified resource to be deleted.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $invoice_item = InvoiceItem::findOrFail($id);
        return view('invoiceitem.delete', compact('invoice_item'));
    }
}
