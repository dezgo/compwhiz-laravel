<div class="form-group">
    {!! Form::label('customer', 'Customer:', ['class' => 'control-label']) !!}

    {!! Form::select('customer_id', $customer_list, null, ['class' => 'form-control', 'id' => 'customer_list']) !!}
</div>

<div class="form-group">
    {!! Form::label('invoice_number', 'Invoice Number:', ['class' => 'control-label']) !!}
    {!! Form::text('invoice_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('invoice_date', 'Invoice Date:', ['class' => 'control-label']) !!}
    {!! Form::text('invoice_date', null, ['class' => 'form-control', 'id' => 'invoice_date']) !!}
</div>

<div class="form-group">
    {!! Form::label('due_date', 'Due Date:', ['class' => 'control-label']) !!}
    {!! Form::text('due_date', null, ['class' => 'form-control', 'id' => 'due_date']) !!}
</div>

{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
