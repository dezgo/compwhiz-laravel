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
     * Display a listing of the invoice items for the currently selected invoice
     * OR
     * If no invoice selected, show the invoice selection screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice_id = session('invoice_id', 0);
        if ($invoice_id == 0)
        {
            return view('invoiceitem.invoice');
        }
        else
        {
            $invoice = Invoice::findOrFail($invoice_id);
            $invoice_items = InvoiceItem::all()->where('invoice_id', $invoice->id);
            return view('invoiceitem.index', compact('invoice_items', 'invoice'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice = Invoice::findOrFail(session('invoice_id'));
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
        return redirect('/invoiceitem');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::findOrFail(session('invoice_id'));
        $invoice_item = InvoiceItem::findOrFail($id);
        return view('invoiceitem.show', compact('invoice_item','invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::findOrFail(session('invoice_id'));
        $invoice_item = InvoiceItem::findOrFail($id);
        return view('invoiceitem.edit', compact('invoice_item','invoice'));
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
        return redirect('/invoiceitem');
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
        return redirect('/invoiceitem');
    }

    /**
     * Show the specified resource to be deleted.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $invoice = Invoice::findOrFail(session('invoice_id'));
        $invoice_item = InvoiceItem::findOrFail($id);
        return view('invoiceitem.delete', compact('invoice_item','invoice'));
    }

	/**
     * User has just selected a particular invoice to be processed
     *
     * @param Request $request
     */
    public function select(Request $request)
    {
        session(['invoice_id' => $request->invoice_id]);
        return redirect('/invoiceitem');
    }

	/**
     * Forget about the currently selected invoice so user can select a new one
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function clear()
    {
        session()->forget('invoice_id');
        return redirect('/invoiceitem');
    }
}
