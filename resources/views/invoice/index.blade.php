@extends('web')

@section('content')
    <h1>Show Invoices</h1>

    <div class="row">
        <h4 class="col-xs-2">Num</h4>
        <h4 class="col-xs-2 text-nowrap">Date</h4>
        <h4 class="col-xs-2">Total</h4>
        <h4 class="col-xs-6">Actions</h4>
    </div>
    @foreach($invoices as $invoice)
        <div class="row">
            <div class="col-xs-2">
                {{ $invoice->invoice_number }}
            </div>
            <div class="col-xs-2 text-nowrap">
                {{ $invoice->invoice_date }}
            </div>
            <div class="col-xs-2">
                {{ $invoice->total }}
            </div>
            <div class="col-xs-6">
                <a class="btn btn-primary" href="{{ url('/invoice/'.$invoice->id) }}">
                    View
                </a>
                <a class="btn btn-danger" href="{{ url('/invoice/'.$invoice->id.'/delete') }}">
                    Delete
                </a>
                <a class="btn btn-info" target="_blank" href="{{ url('/invoice/'.$invoice->id.'/print') }}">
                    Print
                </a>
            </div>
        </div>
        <!-- add this empty row to get a 1 pixel separator between buttons on each row -->
        <div class="row"><div class="col-md-12"></div></div>
    @endforeach

    <a href="/invoice/create" class="btn btn-success">Create</a>
@stop
