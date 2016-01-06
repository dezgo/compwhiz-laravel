@extends('admin')

@section('content1')
    <h1 align="left">Edit Invoice Item Category</h1>

    {!! Form::model($invoice_item_category, ['method' => 'PUT', 'url' => 'invoiceitemcategory/'.$invoice_item_category->id]) !!}
        @include('invoiceitemcategory.form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}

    @include('errors.list')
@stop