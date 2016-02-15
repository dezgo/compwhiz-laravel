@extends('web')

@section('content')
    <h1 align="left">Edit User</h1>

    {!! Form::model($user, ['method' => 'PUT', 'route' =>
        ['user.update', $user->id]]) !!}

        <div class="form-group">
            {{ Form::label('name', 'Name:', ['class' => 'control-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'autofocus' => 'true']) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email:', ['class' => 'control-label']) }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::radio('role', 'super_admin', null) }}&nbsp;
            {{ Form::label('super_admin', 'Super Admin', ['class' => 'control-label']) }}
            <br />
            {{ Form::radio('role', 'admin', null) }}&nbsp;
            {{ Form::label('admin', 'Admin', ['class' => 'control-label']) }}
            <br />
            {{ Form::radio('role', 'customer', null) }}&nbsp;
            {{ Form::label('customer', 'Customer', ['class' => 'control-label']) }}
            <br />
            {{ Form::radio('role', 'user', null) }}&nbsp;
            {{ Form::label('user', 'User', ['class' => 'control-label']) }}
        </div>

<br />
        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}

    @include('errors.list')
@stop

@section('footer')
<script language="javascript">
$('#btnSuperAdmin').trigger('click');
</script>
@stop
