@extends('admin')

@section('content1')
    <h1 align="left">Create Invoice</h1>

    {!! Form::model($invoice->toArray(), ['route' => 'invoice.store']) !!}
        @include('invoice.form', ['submitButtonText' => 'Save'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
