<?php $options['class'] = 'form-control' ?>

<!-- First_name Form Input -->
<div class="form-group">
    {!! Form::label('first_name', 'First name:', ['class' => 'control-label']) !!}
    {!! Form::text('first_name', null, $options) !!}
</div>

<!-- Last name Form Input -->
<div class="form-group">
    {!! Form::label('last_name', 'Last name:', ['class' => 'control-label']) !!}
    {!! Form::text('last_name', null, $options) !!}
</div>

<!-- Address 1 Form Input -->
<div class="form-group">
    {!! Form::label('address1', 'Address:', ['class' => 'control-label']) !!}
    {!! Form::text('address1', null, $options) !!}
    {!! Form::text('address2', null, $options) !!}
</div>

<!-- Suburb Form Input -->
<div class="form-group">
    {!! Form::label('suburb', 'Suburb:', ['class' => 'control-label']) !!}
    {!! Form::text('suburb', null, $options) !!}
</div>

<!-- State Form Input -->
<?php $options['id'] = 'state_list' ?>
<div class="form-group">
    {!! Form::label('state', 'State:', ['class' => 'control-label']) !!}
    {!! Form::select('state', [
            'ACT' => 'ACT',
            'NSW' => 'NSW',
            'SA' => 'SA',
            'WA' => 'WA',
            'TAS' => 'TAS',
            'NT' => 'NT',
            'QLD' => 'QLD',
            'VIC' => 'VIC'
        ], null, $options) !!}
</div>
<?php unset($options['id']) ?>

<!-- Postcode Form Input -->
<div class="form-group">
    {!! Form::label('postcode', 'Postcode:', ['class' => 'control-label']) !!}
    {!! Form::text('postcode', null, $options) !!}
</div>

{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
