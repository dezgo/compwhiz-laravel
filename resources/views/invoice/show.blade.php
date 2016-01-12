@extends('admin')

@section('content1')
    <h1 align="left">Show Invoice</h1>

    {!! Form::model($invoice, ['method' => 'GET', 'url' => 'invoice/'.$invoice->id.'/edit']) !!}
        <?php $options['disabled'] = 'true'; ?>
        @include('invoice.form', ['submitButtonText' => 'Edit', 'invoice_id' => $invoice->id])
    {!! Form::close() !!}

    @include('/invoiceitem/index')

@stop
