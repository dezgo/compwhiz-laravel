@extends('admin')

@section('content1')
    <h1>Show Customers</h1>

    @foreach($customers as $customer)
        <div class="row">
            <div class="col-xs-6">
                {{ $customer->id }}:&nbsp;
                <a href="{{ action('CustomerController@show', [$customer->id]) }}">
                    {{ $customer->first_name }}&nbsp;{{ $customer->last_name }}&nbsp;of&nbsp;{{ $customer->suburb }}
                </a>
            </div>
            <div class="col-xs-4">
                <a class="btn btn-danger" href="{{ url('/customer/'.$customer->id.'/delete') }}">
                    Delete
                </a>
            </div>
        </div>
    @endforeach

    <button onclick="location.href='{{ action('CustomerController@create') }}'" class="btn btn-primary">
        Create
    </button>
@stop

