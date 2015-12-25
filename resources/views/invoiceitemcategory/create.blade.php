@extends('admin')

@section('content1')
    <h1 align="left">Create Invoice Item Category</h1>

    {!! Form::open(['route' => 'invoiceitemcategory.store']) !!}
        @include('invoiceitemcategory.form', ['submitButtonText' => 'Save'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
