@extends('web')

@section('content')
    @include('includes.flash_message_content')

    <h1 align="left">Show Invoice</h1>

    {!! Form::model($invoice, ['method' => 'GET', 'url' => 'invoice/'.$invoice->id.'/edit']) !!}
        <?php $options['disabled'] = 'true'; ?>
        @include('invoice.form', ['submitButtonText' => 'Edit', 'invoice_id' => $invoice->id])
        <?php unset($options['disabled']) ?>
    {!! Form::close() !!}

    @include('/invoiceitem/index')
<br><br>
    <a class="btn btn-info" target="_blank" href="{{ url('/invoice/'.$invoice->id.'/print') }}">
        Print
    </a>
    @if(Gate::check('admin'))
    <a class="btn btn-info" href="{{ url('/invoice/'.$invoice->id.'/email') }}">
        Email
    </a>
    @endif

@stop

@section('footer')
    @include('includes.flash_message_footer')

    <script language="javascript">

    $('#invoiceItemTable').on('mouseover', 'tbody tr', function(event) {
        $(this).addClass('bg-info').siblings().removeClass('bg-info');
    });

    </script>
@stop
