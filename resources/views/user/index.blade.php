@extends('web')

@section('head')
<style>
#userTable {
    cursor: pointer;
}
</style>
@stop

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
                    <input type="hidden" id="user_id" value="{{ $user->id }}" />
                    {{ $user->name }}
                </td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
<hr />
        <a class="btn btn-success" id="editBtn">
            Edit
        </a>
    </div>

@stop

@section('footer')
@include('/includes/flash_message_footer')

<script language="javascript">

$(document).ready (function(){
    $('#userTable').on('click dblclick', 'tbody tr', function(event) {
        $(this).addClass('bg-info').siblings().removeClass('bg-info');
        var $user_id = $(this).find("input")[0].value;
        document.getElementById('editBtn').href = '/user/'+$user_id+'/edit';
        if (event.type == 'dblclick') window.location.href='/user/'+$user_id+'/edit';
    });
});

</script>
@stop
