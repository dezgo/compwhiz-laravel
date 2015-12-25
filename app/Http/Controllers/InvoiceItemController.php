<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\InvoiceItem;
use App\InvoiceItemCategory;
use App\Http\Requests\InvoiceItemRequest;

class InvoiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice_items = InvoiceItem::all();
        return view('invoiceitem.index', compact('invoice_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice_item_categories = InvoiceItemCategory::lists('description', 'id');
        return view('invoiceitem.create', compact('invoice_item_categories'));
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
        $invoice_item_categories = InvoiceItemCategory::categoryList();
        $invoice_item = InvoiceItem::findOrFail($id);
        return view('invoiceitem.show', compact('invoice_item', 'invoice_item_categories'));
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
        $invoice_item_categories = InvoiceItemCategory::categoryList();
        return view('invoiceitem.edit', compact('invoice_item', 'invoice_item_categories'));
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
        $invoice_item = InvoiceItem::findOrFail($id);
        $invoice_item_categories = InvoiceItemCategory::lists('description', 'id');
        return view('invoiceitem.delete', compact('invoice_item','invoice_item_categories'));
    }
}
