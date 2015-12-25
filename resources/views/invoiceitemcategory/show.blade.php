@extends('admin')

@section('content1')
    <h1 align="left">Show Invoice Item Category</h1>

    {!! Form::model($invoice_item_category, ['method' => 'GET', 'url' => 'invoiceitemcategory/'.$invoice_item_category->id.'/edit']) !!}
        <?php $options['disabled'] = 'true'; ?>
        @include('invoiceitemcategory.form', ['submitButtonText' => 'Edit'])
    {!! Form::close() !!}
@stop

