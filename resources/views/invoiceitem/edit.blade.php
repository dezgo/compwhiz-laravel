@extends('admin')

@section('content1')
    <h1 align="left">Edit Invoice Item for invoice {{ $invoice->description }}</h1>

    {!! Form::model($invoice_item, ['method' => 'PUT', 'url' => 'invoiceitem/'.$invoice_item->id]) !!}
        @include('invoiceitem.form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
