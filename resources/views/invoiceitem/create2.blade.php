@extends('admin')

@section('content1')
    <h1 align="left">Create Invoice Item for invoice {{ $invoice->description }}</h1>
    <h2>Step 2 - Enter/select description</h2>
    {!! Form::model($invoice_item, ['route' => 'invoiceitem.store2']) !!}

    <div class="form-group">
        {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}
        {!! Form::text('category_id', null, ['class' => 'control-label']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        <?php $options['id'] = 'description_list' ?>
        {!! Form::select('description_sel', ['' => ''] + $invoice_item_list->toArray(), null, $options) !!}
        <?php $options['id'] = 'description' ?>
        {!! Form::hidden('description', null, $options) !!}
        <?php unset($options['id']) ?>
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
