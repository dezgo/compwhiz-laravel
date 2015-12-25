@extends('admin')

@section('content1')
    <h1 align="left">Edit Invoice Item</h1>

    {!! Form::model($invoice_item, ['method' => 'PUT', 'url' => 'invoiceitem/'.$invoice_item->id]) !!}
        @include('invoiceitem.form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}

    @include('errors.list')
@stop

@section('footer')
    <script type="text/javascript">
        $('#category_list').select2({
            placeholder: 'Choose a category',
            tags: false,
            theme: "classic"
        });
    </script>
@stop

