@extends('admin')

@section('content1')
    <h1>Show Invoice Items for invoice {{ $invoice->description }}</h1>

    <div class="form-group">
    <div class="row">
        <h4 class="col-xs-1">Quantity</h4>
        <h4 class="col-xs-2">Category</h4>
        <h4 class="col-xs-4">Description</h4>
        <h4 class="col-xs-1">Price</h4>
        <h4 class="col-xs-4">Actions</h4>
    </div>
    @foreach($invoice_items as $invoice_item)
        <div class="row">
            <div class="col-xs-1">
                {{ $invoice_item->quantity }}
            </div>
            <div class="col-xs-2">
                {{ $invoice_item->category->description }}
            </div>
            <div class="col-xs-4">
                {{ $invoice_item->description }}
            </div>
            <div class="col-xs-1">
                {{ $invoice_item->price }}
            </div>
            <div class="col-xs-4">
                <a class="btn btn-success" href="{{ action('InvoiceItemController@edit', [$invoice_item->id]) }}">
                    Edit
                </a>
                <a class="btn btn-primary" href="{{ action('InvoiceItemController@show', [$invoice_item->id]) }}">
                    Details
                </a>
                <a class="btn btn-danger" href="{{ url('/invoiceitem/'.$invoice_item->id.'/delete') }}">
                    Delete
                </a>
            </div>
        </div>
        <!-- add this empty row to get a 1 pixel separator between buttons on each row -->
        <div class="row"><div class="col-md-10"></div></div>
    @endforeach

        <div class="row">
            <div class="col-md-1">
                <button onclick="location.href='{{ action('InvoiceItemController@create', $invoice->id) }}'" class="btn btn-primary">
                    Create
                </button>
            </div>
            <div class="col-md-1">
                <button onclick="location.href='{{ action('InvoiceItemController@clear') }}'" class="btn btn-success">
                    Back
                </button>
            </div>
        </div>
    </div>
@stop
