<?php $options['class'] = 'form-control' ?>

<div class="form-group">
    {!! Form::label('customer', 'Customer:', ['class' => 'control-label']) !!}

    <?php $options['id'] = 'customer_list' ?>
    {!! Form::select('customer_id', $customer_list, null, $options) !!}
    <?php unset($options['id']) ?>
</div>

<div class="form-group">
    {!! Form::label('invoice_number', 'Invoice Number:', ['class' => 'control-label']) !!}
    {!! Form::text('invoice_number', null, $options) !!}
</div>

<div class="form-group">
    {!! Form::label('invoice_date', 'Invoice Date:', ['class' => 'control-label']) !!}
    {!! Form::text('invoice_date', null, $options) !!}
</div>

<?php $count = 0; ?>
@while($count < 5)
    <?php $count = $count + 1; ?>
    <div class="form-group">
        {!! Form::label('quantity', 'Quantity:', ['class' => 'control-label']) !!}
        {!! Form::text('quantity', null, $options) !!}
    </div>

    <div class="form-group">
        {!! Form::label('invoice_item', 'Invoice Item:', ['class' => 'control-label']) !!}

        <?php $options['id'] = 'invoice_item_list' ?>
        {!! Form::select('invoice_item_id', $invoice_items, null, $options) !!}
        <?php unset($options['id']) ?>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::text('description', null, $options) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sell_price', 'Price:', ['class' => 'control-label']) !!}
        {!! Form::text('sell_price', null, $options) !!}
    </div>
@endwhile
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
