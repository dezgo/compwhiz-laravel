@extends('web')

@section('content')
    <h1>Show Users</h1>

    <div class="container">
        <div class="row">
            <h4 class="col-xs-4">Name</h4>
            <h4 class="col-xs-6">Email</h4>
            <h4 class="col-xs-2">&nbsp;</h4>
        </div>
        <div id="userTable">
        @foreach($users as $user)
            <div class="row">
                <div class="col-xs-4">
                    {{ $user->name }}
                </div>
                <div class="col-xs-6">
                    {{ $user->email }}
                </div>
                <div class="col-xs-2">
                    <a class="btn btn-success" href="{{ action('UserController@edit', $user->id) }}">
                        Edit
                    </a>
                </div>
            </div>
            <!-- add this empty row to get a 1 pixel separator between buttons on each row -->
            <div class="row"><div class="col-xs-6"></div></div>
        @endforeach
        </div>
    </div>

@stop
