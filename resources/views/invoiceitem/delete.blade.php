@extends('admin')

@section('content1')
    <h1 align="left">Delete Invoice Item</h1>

    {!! Form::model($invoice_item, ['method' => 'DELETE', 'url' => 'invoiceitem/'.$invoice_item->id]) !!}

    <?php
    $options['disabled'] = 'true';
    ?>
    @include('invoiceitem.form', ['submitButtonText' => 'Delete'])
    {!! Form::close() !!}
@stop

