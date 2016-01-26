@extends('web')

@section('content')
    <h1 align="left">Create Customer</h1>

    {!! Form::open(['route' => 'customer.store']) !!}
        @include('customer.form', ['submitButtonText' => 'Save'])
    {!! Form::close() !!}

    @include('errors.list')
@stop

@section('footer')
    <script type="text/javascript">
        $('#state_list').select2({
            placeholder: 'Choose a state',
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
