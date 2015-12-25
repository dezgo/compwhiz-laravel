<?php $options['class'] = 'form-control' ?>

    <div class="form-group">
        {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}

        <?php $options['id'] = 'category_list' ?>
        {!! Form::select('category_id', $invoice_item_categories, null, $options) !!}
        <?php unset($options['id']) ?>
    </div>

    <div class="form-group">
        {!! Form::label('buyprice', 'Buy Price:', ['class' => 'control-label']) !!}
        {!! Form::text('buyprice', null, $options) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sellprice', 'Sell Price:', ['class' => 'control-label']) !!}
        {!! Form::text('sellprice', null, $options) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}

        <?php $options['size'] = 40 ?>
        {!! Form::text('description', null, $options) !!}
        <?php unset($options['size']) ?>
    </div>

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
