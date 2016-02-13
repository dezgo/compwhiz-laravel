@extends('web')

@section('content')
    @include('includes.flash_message_content')

    <h1 align="left">Show Invoice</h1>

    {!! Form::model($invoice, ['method' => 'GET', 'url' => 'invoice/'.$invoice->id.'/edit']) !!}
        <?php $options['disabled'] = 'true'; ?>
        @include('invoice.form', ['submitButtonText' => 'Edit', 'invoice_id' => $invoice->id])
    {!! Form::close() !!}

    @include('/invoiceitem/index')
<br>
    <a class="btn btn-info" target="_blank" href="{{ url('/invoice/'.$invoice->id.'/print') }}">
        Print
    </a>
    <a class="btn btn-info" href="{{ url('/invoice/'.$invoice->id.'/email') }}">
        Email
    </a>

@stop

@section('footer')
    @include('includes.flash_message_footer')
@stop
