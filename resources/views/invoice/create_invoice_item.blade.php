@extends('admin')

@section('content1')
    <h1 align="left">Invoicing - Create Invoice Item</h1>

    {!! Form::open([
    'route' => 'invoice/store_item'
    ]) !!}

    <div class="form-group">
        {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}
        {!! Form::select('category_list', $item_categories, null, ['id' => 'category_list', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('buy_price', 'Buy Price:', ['class' => 'control-label']) !!}
        {!! Form::text('buy_price', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sell_price', 'Sell Price:', ['class' => 'control-label']) !!}
        {!! Form::text('sell_price', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::text('description', null, ['size' => 40, 'class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Create New Invoice Item', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@stop

@section('footer')
    <script type="text/javascript">
        $('#category_list').select2({
            placeholder: 'Choose a category',
            tags: true,
            theme: "classic",
        });
    </script>
@stop