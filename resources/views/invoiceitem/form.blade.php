<?php $options['class'] = 'form-control' ?>

    {!! Form::hidden('invoice_id', $invoice->id) !!}

    <div class="form-group">
        {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}

        <?php $options['id'] = 'category_list' ?>
        {!! Form::select('category_id', $invoice_item_categories, null, $options) !!}
        <?php unset($options['id']) ?>
    </div>

    <?php $options['id'] = 'description_list' ?>
    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::select('description', $invoice_item_list, null, $options) !!}
    </div>
    <?php unset($options['id']) ?>

    <div class="form-group">
        {!! Form::label('quantity', 'Quantity:', ['class' => 'control-label']) !!}
        {!! Form::text('quantity', null, $options) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price:', ['class' => 'control-label']) !!}
        {!! Form::text('price', null, $options) !!}
    </div>

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
