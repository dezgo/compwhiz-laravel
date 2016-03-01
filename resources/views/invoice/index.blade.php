@extends('web')

@section('content')
    <h1>Show Invoices</h1>

    <div class="container">
        <table class="table-condensed" id="invoiceTable">
            <tbody>
                <tr>
                    <td><h4>Num</h4></td>
                    <td><h4>Date</h4></td>
                    <td><h4>Total</h4></td>
                </tr>

    @foreach($invoices as $invoice)
    <tr>
        <td>
            <a href='{{ action('InvoiceController@show', $invoice->id) }}'>{{ $invoice->invoice_number }}</a>
        </td>
        <td>{{ $invoice->invoice_date }}</td>
        <td>{{ $invoice->total }}</td>
    </tr>
    @endforeach
    </tbody>
    </table>

    <hr />
        </div>

    @if(Gate::check('admin'))
    <a href="{{ url('/invoice/create') }}" class="btn btn-success">Create</a>
    @endif
@stop

@section('footer')
@include('/includes/flash_message_footer')

<script language="javascript">

$(document).ready (function(){
    $('#invoiceTable').on('mouseover', 'tbody tr', function(event) {
        $(this).addClass('bg-info').siblings().removeClass('bg-info');
    });
});

</script>
@stop
