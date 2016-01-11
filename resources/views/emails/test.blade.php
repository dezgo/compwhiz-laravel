@extends('master')
@section('content')
<h1>This is a test email</h1>
<p>Invoice: {{ $invoice->invoice_number }}</p>

<p>
    And here's some text in the email
</p>
@stop
