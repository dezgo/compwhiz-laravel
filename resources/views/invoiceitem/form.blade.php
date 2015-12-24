<?php $options['class'] = 'form-control' ?>

    <div class="form-group">
        {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}

        <?php $options['id'] = 'state_list' ?>
        {!! Form::select('category_list', $item_categories, null, $options) !!}
        <?php unset($options['id']) ?>
    </div>

    <div class="form-group">
        {!! Form::label('buy_price', 'Buy Price:', ['class' => 'control-label']) !!}
        {!! Form::text('buy_price', null, $options) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sell_price', 'Sell Price:', ['class' => 'control-label']) !!}
        {!! Form::text('sell_price', null, $options) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}

        <?php $options['size'] = 40 ?>
        {!! Form::text('description', null, $options) !!}
        <?php unset($options['size']) ?>
    </div>

    {!! Form::submit('Create New Invoice Item', ['class' => 'btn btn-primary']) !!}
