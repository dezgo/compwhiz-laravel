@extends('web')

@section('content')
    <h1 align="left">Delete Customer</h1>

    {!! Form::model($customer, ['method' => 'DELETE', 'url' => 'customer/'.$customer->id]) !!}

    <?php
    $options['disabled'] = 'true';
    ?>
    @include('customer.form', ['submitButtonText' => 'Delete'])
    {!! Form::close() !!}
@stop
