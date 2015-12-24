@extends('admin')

@section('content1')
    <h1 align="left">Show Customer</h1>

    {!! Form::model($customer, ['method' => 'GET', 'url' => 'customer/'.$customer->id.'/edit']) !!}
{{--        @include('  customer.select')--}}

        <?php $options['disabled'] = 'true'; ?>
        @include('customer.form', ['submitButtonText' => 'Edit'])
    {!! Form::close() !!}

    <br>

    {!! Form::open(['method' => 'DELETE', 'url' => 'customer/'.$customer->id]) !!}
        {!! Form::submit('Delete', ['class' => 'btn']) !!}
    {!! Form::close() !!}
@stop

