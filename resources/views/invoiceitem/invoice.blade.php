@extends('admin')

@section('content1')
<h1>Select Invoice</h1>

{!! Form::open(['method' => 'GET', 'url' => 'invoiceitem/select']) !!}

<div class="form-group">
    {!! Form::label('invoice', 'Invoice:', ['class' => 'control-label']) !!}
    {!! Form::select('invoice_id', $invoice_list, null, ['class' => 'form-control', 'id' => 'invoice_list']) !!}
</div>

{!! Form::submit('Select', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@include('errors.list')
@stop

@section('footer')
    <script type="text/javascript">
        $('#invoice_list').select2({
            placeholder: 'Select an invoice',
            tags: false,
            theme: "classic"
        });
    </script>
@stop

