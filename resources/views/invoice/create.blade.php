@extends('admin')

@section('content1')
    <h1 align="left">Create Invoice</h1>

    {!! Form::open(['route' => 'invoice.store']) !!}
        @include('invoice.form', ['submitButtonText' => 'Save'])
    {!! Form::close() !!}

    @include('errors.list')
@stop

@section('footer')
    <script type="text/javascript">
        $('#invoice_item_list').select2({
            placeholder: 'Choose an invoice item',
            tags: false,
            theme: "classic"
        });

        $('#customer_list').select2({
            placeholder: 'Choose a customer',
            tags: false,
            theme: "classic"
        });
    </script>
@stop

