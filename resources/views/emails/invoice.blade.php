@extends('master')
@section('content')
Hi {{ $invoice->customer->full_name }},<br />
<br />
Please find attached invoice {{ $invoice->invoice_number }} for {{ $invoice->total }}<br />
<br />
Thanks,<br />
Derek Gillett<br />
Computer Whiz - Canberra

@stop
