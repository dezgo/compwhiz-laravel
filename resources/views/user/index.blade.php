@extends('web')

@section('content')
@include('/includes/flash_message_content')
    <h1>Show Users</h1>

    <div class="container">
        <table class="table-condensed" id="userTable">
            <tbody>
                <tr>
                    <td><h4>Name</h4></td>
                    <td><h4>Email</h4></td>
                </tr>
            @foreach($users as $user)
            <tr>
                <td>
                    <a href='{{ action('UserController@edit', $user->id) }}'>{{ $user->name }}</a>
                </td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
<hr />
    </div>

@stop

@section('footer')
@include('/includes/flash_message_footer')

<script language="javascript">

$(document).ready (function(){
    $('#userTable').on('mouseover', 'tbody tr', function(event) {
        $(this).addClass('bg-info').siblings().removeClass('bg-info');
    });
});

</script>
@stop
