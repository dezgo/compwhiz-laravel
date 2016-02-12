@extends('master')
@section('content')
Hi {{ $invoice->customer->first_name }},<br />
<br />
Please find attached invoice {{ $invoice->invoice_number }} for ${{ number_format($invoice->total, 2) }}<br />
<br />
Thanks,<br />
Derek Gillett<br />
Computer Whiz - Canberra

@stop
