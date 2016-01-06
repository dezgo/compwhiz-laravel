@extends('admin')

@section('content1')
    <h1>Show Invoices</h1>

    <div class="row">
        <h4 class="col-xs-4">Customer</h4>
        <h4 class="col-xs-1 text-nowrap">Inv Date</h4>
        <h4 class="col-xs-1 text-nowrap">Due Date</h4>
        <h4 class="col-xs-1">Number</h4>
        <h4 class="col-xs-1">Total</h4>
        <h4 class="col-xs-4">Actions</h4>
    </div>
    @foreach($invoices as $invoice)
        <div class="row">
            <div class="col-xs-4">
                {{ $invoice->customer->full_name }}
            </div>
            <div class="col-xs-1 text-nowrap">
                {{ $invoice->invoice_date->format('d-m-Y') }}
            </div>
            <div class="col-xs-1 text-nowrap">
                {{ $invoice->due_date->format('d-m-Y') }}
            </div>
            <div class="col-xs-1">
                {{ $invoice->invoice_number }}
            </div>
            <div class="col-xs-1">
                {{ $invoice->total }}
            </div>
            <div class="col-xs-4">
                <a class="btn btn-success" href="{{ action('InvoiceController@edit', [$invoice->id]) }}">
                    Edit
                </a>
                <a class="btn btn-primary" href="{{ action('InvoiceController@show', [$invoice->id]) }}">
                    Details
                </a>
                <a class="btn btn-danger" href="{{ url('/invoice/'.$invoice->id.'/delete') }}">
                    Delete
                </a>
                <a class="btn btn-info" href="{{ url('/invoice/'.$invoice->id.'/print') }}">
                    Print
                </a>
            </div>
        </div>
        <!-- add this empty row to get a 1 pixel separator between buttons on each row -->
        <div class="row"><div class="col-md-12"></div></div>
    @endforeach

    <button onclick="location.href='{{ action('InvoiceController@create') }}'" class="btn btn-success">
        Create
    </button>
@stop
