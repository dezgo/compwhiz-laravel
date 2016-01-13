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
    * First step in creating an invoice item - select category
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('invoiceitem.create', compact('invoice'));
    }

    /**
     * First step in creating an invoice item - select category
     *
     * @return \Illuminate\Http\Response
     */
    public function create1($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice_item_categories = \App\InvoiceItemCategory::all()->lists('description', 'id');
        return view('invoiceitem.create1', compact('invoice','invoice_item_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceItemRequest $request)
    {
        $item = InvoiceItem::findOrFail($request->id);
        $item->category_id = $request->category_id;
        $item->description = $request->description;
        $item->quantity = $request->quantity;
        $item->price = $request->price;
        $item->save();
        return redirect('/invoice/'.$request->invoice_id);
    }

    /**
     * End step 1. Pass through invoice to which item relates and
     * and the selected category to step 2
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
    {
        $rules = ['category_id' => 'required'];
        $messages = ['category_id.required' => 'The category field is required'];
        $this->validate($request, $rules, $messages);

        $invoice = Invoice::findOrFail($request->invoice_id);
        $category = \App\InvoiceItemCategory::findOrFail($request->category_id);
        $invoice_item_list = \App\InvoiceItem::invoiceItemList($category->id);

        return view('invoiceitem.create2', compact('invoice','category',
            'invoice_item_list'));
    }

    /**
     * End step 1. Pass through invoice to which item relates and
     * and the selected category to step 2
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
    {
        $validator = \Validator::make($request->all(), [
                'description' => 'required',
            ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $invoice_id = $request->invoice_id;
        $invoice = Invoice::findOrFail($invoice_id);
        $invoice_item = new InvoiceItem();
        $invoice_item->invoice_id = $invoice_id;
        $invoice_item->category_id = $request->category_id;
        $invoice_item->description = $request->description;
        $invoice_item->quantity = 1;
        $invoice_item->price = $invoice_item->getPrice();
        $invoice_item->save();

        return view('invoiceitem.create', compact('invoice','invoice_item', 'invoice_id'));
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
