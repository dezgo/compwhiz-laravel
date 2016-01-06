@extends('admin')

@section('content1')
    <h1 align="left">Edit Customer</h1>

    {!! Form::model($customer, ['method' => 'PUT', 'url' => 'customer/'.$customer->id]) !!}
        @include('customer.form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}

    @include('errors.list')
@stop

@section('footer')
    <script type="text/javascript">
        $('invoice_date').datepicker({
            format: 'dd/mm/yyyy'
        });

        $('#customer_list').select2({
            placeholder: 'Choose a customer',
            tags: false,
            theme: "classic"
        });
    </script>
@stop

