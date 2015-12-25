<!-- Customer Form Input -->
<div class="form-group">
    {!! Form::label('customer', 'Customer:', ['class' => 'control-label']) !!}
    {!! Form::select('customer_list', $customer_list, null, ['id' => 'customer_list', 'class' => 'form-control']) !!}
</div>
