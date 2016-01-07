@extends('admin')

@section('content1')
    <h1 align="left">Edit Invoice</h1>

    {!! Form::model($invoice, ['method' => 'PUT', 'url' => 'invoice/'.$invoice->id]) !!}
        @include('invoice.form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
