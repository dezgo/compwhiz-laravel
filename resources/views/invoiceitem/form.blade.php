<?php $options['class'] = 'form-control' ?>

    {!! Form::hidden('id', null) !!}
    {!! Form::hidden('invoice_id', $invoice_id) !!}

    <div class="form-group">
        {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}

        <?php $options['id'] = 'category_list' ?>
        {{ Form::select('category_id', ['' => ''] + $invoice_item_categories->toArray(), null, $options) }}
        <?php unset($options['id']) ?>
    </div>

    <div class="form-group">
        {{ Form::label('description_label', 'Description:', ['class' => 'control-label']) }}

        <?php $options['id'] = 'description_list' ?>
        {{ Form::select('description', ['' => ''] + $invoice_item_list->toArray(), null, $options) }}
        <?php unset($options['id']) ?>
    </div>

    <div class="form-group">
        {{ Form::label('quantity', 'Quantity:', ['class' => 'control-label']) }}
        {{ Form::text('quantity', null, $options) }}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price:', ['class' => 'control-label']) !!}
        {{ Form::text('price', null, $options) }}
    </div>


    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

@section('footer1')
<script type="text/javascript">
$( document ).ready(function() {
    $('#category_list').select2({
        placeholder: "Choose a category",
        tags: false,
        theme: "classic"
    });

    $('#description_list').select2({
        placeholder: "Choose an item",
        tags: true,
        theme: "classic",
    });
});
</script>
@stop
