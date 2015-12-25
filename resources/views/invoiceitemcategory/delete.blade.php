@extends('admin')

@section('content1')
    <h1 align="left">Delete Invoice Item Category</h1>

    {!! Form::model($invoice_item_category, ['method' => 'DELETE', 'url' => 'invoiceitemcategory/'.$invoice_item_category->id]) !!}

    <?php
    $options['disabled'] = 'true';
    ?>
    @include('invoiceitemcategory.form', ['submitButtonText' => 'Delete'])
    {!! Form::close() !!}
@stop

