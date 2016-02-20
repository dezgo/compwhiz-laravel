@extends('web')

@section('content')
{!! Form::model(['route' => 'invoice.send']) !!}

<div class="form-group">
    {!! Form::label('from', 'From:', ['class' => 'control-label']) !!}
    {{ Form::text('from', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {!! Form::label('to', 'To:', ['class' => 'control-label']) !!}
    {{ Form::text('to', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {!! Form::label('cc', 'Cc:', ['class' => 'control-label']) !!}
    {{ Form::text('cc', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {!! Form::label('bcc', 'Bcc:', ['class' => 'control-label']) !!}
    {{ Form::text('bcc', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {!! Form::label('subject', 'Subject:', ['class' => 'control-label']) !!}
    {{ Form::text('subject', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:', ['class' => 'control-label']) !!}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>

{!! Form::close() !!}

@stop
