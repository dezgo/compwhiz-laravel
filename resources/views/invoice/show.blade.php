@extends('admin')

@section('content1')
    <h1 align="left">Show Customer</h1>

    {!! Form::model($customer, ['method' => 'GET', 'url' => 'customer/'.$customer->id.'/edit']) !!}
        <?php $options['disabled'] = 'true'; ?>
        @include('customer.form', ['submitButtonText' => 'Edit'])
    {!! Form::close() !!}
@stop

