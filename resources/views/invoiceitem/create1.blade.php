@extends('admin')

@section('content1')
    <h1 align="left">Create Invoice Item for invoice {{ $invoice->description }}</h1>
    <h2>Step 1 - Select category</h2>
    {!! Form::open(['route' => 'invoiceitem.store1']) !!}

    <div class="form-group">
        {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}

        {!! Form::select('category_id', ['' => ''] + $invoice_item_categories->toArray(), null,
            ['class' => 'form-control', 'id' => 'category_list']) !!}
    </div>

    {!! Form::submit('Next', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    @include('errors.list')
@stop

@section('footer1')
<script type="text/javascript">
$('#category_list').select2({
    placeholder: "Choose a category",
    tags: false,
    theme: "classic"
});
</script>
@stop
