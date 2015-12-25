@extends('admin')

@section('content1')
    <h1 align="left">Create Invoice Item</h1>

    {!! Form::open(['route' => 'invoiceitem.store']) !!}
        @include('invoiceitem.form', ['submitButtonText' => 'Save'])
    {!! Form::close() !!}

    @include('errors.list')
@stop

@section('footer')
    <script type="text/javascript">
        $('#category_list').select2({
            placeholder: "Choose a category",
            tags: false,
            theme: "classic"
        });
    </script>
@stop

