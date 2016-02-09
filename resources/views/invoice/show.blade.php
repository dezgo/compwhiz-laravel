@extends('web')

@section('content')
    @if (Session::has('status'))
    <div class="alert alert-warning alert-dismissible" role="alert" id="warning-alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('status') }}
    </div>
    @endif

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
<script language="Javascript">
$(document).ready (function(){
    $("#warning-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#warning-alert").alert('close');
    });
});
</script>
@stop
