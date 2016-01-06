@extends('admin')

@section('content1')
    <h1 align="left">Create Invoice Item for invoice {{ $invoice->description }}</h1>

    {!! Form::open(['route' => 'invoiceitem.store']) !!}
        @include('invoiceitem.form', ['submitButtonText' => 'Save'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
