@extends('admin')

@section('content1')
    <h1>Show Customers</h1>

    <div class="row">
        <h4 class="col-xs-2">Name</h4>
        <h4 class="col-xs-4">Address</h4>
        <h4 class="col-xs-4">Actions</h4>
    </div>
    @foreach($customers as $customer)
        <div class="row">
            <div class="col-xs-2">
                {{ $customer->full_name }}
            </div>
            <div class="col-xs-4">
                {{ $customer->address }}
            </div>
            <div class="col-xs-4">
                <a class="btn btn-success" href="{{ action('CustomerController@edit', [$customer->id]) }}">
                    Edit
                </a>
                <a class="btn btn-primary" href="{{ action('CustomerController@show', [$customer->id]) }}">
                    Details
                </a>
                <a class="btn btn-danger" href="{{ url('/customer/'.$customer->id.'/delete') }}">
                    Delete
                </a>
            </div>
        </div>
        <!-- add this empty row to get a 1 pixel separator between buttons on each row -->
        <div class="row"><div class="col-md-10"></div></div>
    @endforeach

    <a href='{{ action('CustomerController@create') }}'" class="btn btn-success">Create Customer</a>
@stop
