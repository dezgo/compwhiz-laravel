@extends('admin')

@section('content1')
    <h1 align="left">Create Invoice</h1>

    {!! Form::model($invoice->toArray(), ['route' => 'invoice.store']) !!}
        @include('invoice.form', ['submitButtonText' => 'Save'])
    {!! Form::close() !!}

    @include('errors.list')
@stop

@section('footer')
    <script type="text/javascript">
        $('#invoice_date').datepicker({
            dateFormat: 'dd-mm-yy',
        });
        $('#due_date').datepicker({
            dateFormat: 'dd-mm-yy',
        });

        $('#customer_list').select2({
            placeholder: 'Choose a customer',
            tags: false,
            theme: "classic"
        });
    </script>
@stop

