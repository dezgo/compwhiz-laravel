@extends('admin')

@section('content1')
    <h1 align="left">Create Invoice Item for invoice {{ $invoice->description }}</h1>

    {!! Form::model($invoice_item, ['route' => 'invoiceitem.store']) !!}
        @include('invoiceitem.form', ['submitButtonText' => 'Save', 'invoice_id' => $invoice->id])
    {!! Form::close() !!}

    @include('errors.list')
@stop
