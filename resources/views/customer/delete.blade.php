@extends('admin')

@section('content1')
    <h1 align="left">Delete Customer</h1>

    {!! Form::model($customer, ['method' => 'DELETE', 'url' => 'customer/'.$customer->id]) !!}
    {{--        @include('  customer.select')--}}

    <?php
    $options['disabled'] = 'true';
            $options['class']
    ?>
    @include('customer.form', ['submitButtonText' => 'Delete'])
    {!! Form::close() !!}
@stop

