@extends('admin')

@section('content1')
    <h1 align="left">Show Invoice Item for invoice {{ $invoice->description }}</h1>

    {!! Form::model($invoice_item, ['method' => 'GET', 'url' => 'invoiceitem/'.$invoice_item->id.'/edit']) !!}
        <?php $options['disabled'] = 'true'; ?>
        @include('invoiceitem.form', ['submitButtonText' => 'Edit'])
    {!! Form::close() !!}
@stop

