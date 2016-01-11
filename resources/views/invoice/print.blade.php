@extends('master')
@section('content')
<br>
<div class="row">
  <div class="col-xs-9">
    <img src='/images/cw_logo.png' width="70%" height="70%">
  </div>
  <div class="col-xs-3">
    <h2 class="text-right cred">INVOICE</h2><br>
    <br>
    <div class="text-right">ABN:&nbsp;26&nbsp;537&nbsp;857&nbsp;341</div>
  </div>
</div>
<Br>

<div class="row">
  <div class="col-xs-9">
    <div class="cred">Customer Details:</div>
  </div>
  <div class="col-xs-1">
    <div class="cred">Invoice&nbsp;Number:</div>
  </div>
  <div class="col-xs-2 text-right">
    {{ $invoice->invoice_number }}
  </div>
</div>

<div class="row">
  <div class="col-xs-9">
    {{ $invoice->customer->full_name }}
  </div>
  <div class="col-xs-1">
    <div class="cred">Invoice&nbsp;Date:</div>
  </div>
  <div class="col-xs-2 text-right">
    {{ $invoice->invoice_date }}
  </div>
</div>

<div class="row">
  <div class="col-xs-9">
    {!! $invoice->customer->address_multi !!}
  </div>
  <div class="col-xs-1">
    <div class="cred">Payment&nbsp;Terms:</div>
  </div>
  <div class="col-xs-2 text-right">
    7 Days
  </div>
</div>

<br><br>

<div class="row">
  <div class="col-xs-1"><b>Qty</b></div>
  <div class="col-xs-1"><b>Code</b></div>
  <div class="col-xs-8"><b>Description</b></div>
  <div class="col-xs-1 text-right"><b>Unit&nbsp;Price</b></div>
  <div class="col-xs-1 text-right"><b>Total</b></div>
</div>

@foreach($invoice->invoice_items as $invoice_item)
<div class="row">
  <div class="col-xs-1">{{ (int) $invoice_item->quantity }}</div>
  <div class="col-xs-1">{{ $invoice_item->id }}</div>
  <div class="col-xs-8">{{ $invoice_item->description }}</div>
  <div class="col-xs-1 text-right">{{ $invoice_item->price }}</div>
  <div class="col-xs-1 text-right">{{ number_format($invoice_item->total, 2) }}</div>
</div>
@endforeach
<br>
<div class="row">
  <div class="col-xs-9">&nbsp;</div>
  <div class="col-xs-2"><b>Grand-total:</b></div>
  <div class="col-xs-1 text-right">{{ number_format($invoice->total, 2) }}</div>
</div>
<div class="row">
  <div class="col-xs-9">&nbsp;</div>
  <div class="col-xs-2"><b>Amount&nbsp;paid:</b></div>
  <div class="col-xs-1 text-right">{{ number_format($invoice->paid, 2) }}</div>
</div>
<div class="row">
  <div class="col-xs-9">&nbsp;</div>
  <div class="col-xs-2"><b>Balance&nbsp;owing:</b></div>
  <div class="col-xs-1 text-right">{{ number_format($invoice->owing, 2) }}</div>
</div>
<br>
<div class="row">
  <div class="col-xs-9">&nbsp;</div>
  <div class="col-xs-3">No GST has been included</div>
</div>
<br>
<hr>
<div class="row">
  <div class="col-xs-9"><h4 class="cred">How to Pay</h4></div>
  <div class="col-xs-3"><h4 class="cred">Enquiries</h4></div>
</div>
<div class="row">
  <div class="col-xs-5">Payment by EFT</div>
  <div class="col-xs-4">Payment by Cheque</div>
  <div class="col-xs-3">Phone: (02) 6112 8025</div>
</div>
<div class="row">
  <div class="col-xs-1">BSB:<br>Account:<br>Reference:</div>
  <div class="col-xs-4">082-902<br>115287822<br>Inv{{ $invoice->invoice_number}}</div>
  <div class="col-xs-4">Mail Cheques to<br>238 La Perouse St<br>Red Hill ACT 2603</div>
  <div class="col-xs-3">E mail@computerwhiz.com.au<br>W www.computerwhiz.com.au</div>
</div>

@stop
