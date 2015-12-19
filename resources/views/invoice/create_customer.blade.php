@extends('admin')

@section('content1')
    <h1 align="left">Create Customer</h1>

    {!! Form::open([
    'route' => 'invoice/store_customer'
    ]) !!}

    <!-- First_name Form Input -->
    <div class="form-group">
        {!! Form::label('first_name', 'First name:', ['class' => 'control-label']) !!}
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Last name Form Input -->
    <div class="form-group">
        {!! Form::label('last_name', 'Last name:', ['class' => 'control-label']) !!}
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Address 1 Form Input -->
    <div class="form-group">
        {!! Form::label('address1', 'Address 1:', ['class' => 'control-label']) !!}
        {!! Form::text('address1', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Address 2 Form Input -->
    <div class="form-group">
        {!! Form::label('address2', 'Address 2:', ['class' => 'control-label']) !!}
        {!! Form::text('address2', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Suburb Form Input -->
    <div class="form-group">
        {!! Form::label('suburb', 'Suburb:', ['class' => 'control-label']) !!}
        {!! Form::text('suburb', null, ['class' => 'form-control']) !!}
    </div>

    <!-- State Form Input -->
    <div class="form-group">
        {!! Form::label('state', 'State:', ['class' => 'control-label']) !!}
        {!! Form::select('state_list', [
                'ACT' => 'ACT',
                'NSW' => 'NSW',
                'SA' => 'SA',
                'WA' => 'WA',
                'TAS' => 'TAS',
                'NT' => 'NT',
                'QLD' => 'QLD',
                'VIC' => 'VIC'
            ], null, ['id' => 'state_list', 'class' => 'form-control']) !!}
    </div>

    <!-- Postcode Form Input -->
    <div class="form-group">
        {!! Form::label('postcode', 'Postcode:', ['class' => 'control-label']) !!}
        {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Create New Customer', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@stop

@section('footer')
    <script type="text/javascript">
        $('#state_list').select2({
            placeholder: 'Choose a state',
            tags: false,
            theme: "classic"
        });
    </script>
@stop