@extends('print')
@section('content')
<table cellpadding="0" cellspacing="0" width="100%" border="0">
    <tr>
        <td width="8.33%">&nbsp;</td>
        <td width="8.33%">&nbsp;</td>
        <td width="8.33%">&nbsp;</td>
        <td width="8.33%">&nbsp;</td>
        <td width="8.33%">&nbsp;</td>
        <td width="8.33%">&nbsp;</td>
        <td width="8.33%">&nbsp;</td>
        <td width="8.33%">&nbsp;</td>
        <td width="8.33%">&nbsp;</td>
        <td width="8.33%">&nbsp;</td>
        <td width="8.33%">&nbsp;</td>
        <td width="8.33%">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="12" align="right">
            <h2 class="cred text-uppercase">
                {{ strtoupper($invoice->type) }}
            </h2>
            <br>
            <br>
            ABN:&nbsp;26&nbsp;537&nbsp;857&nbsp;341<br />
            <br />
        </td>
    </tr>

    <tr>
      <td colspan="7">
        <div class="cred">Customer Details:</div>
      </td>
      <td colspan="2">
        <div class="cred">{{ $invoice->type }}&nbsp;Number:</div>
      </td>
      <td colspan="3" align="right">
          {{ $invoice->invoice_number }}
      </td>
    </tr>

    <tr>
      <td colspan="7">
          {{ $invoice->customer->full_name }}
      </td>
      <td colspan="2">
        <div class="cred">{{ $invoice->type }}&nbsp;Date:</div>
      </td>
      <td colspan="3" align="right">
          {{ $invoice->invoice_date }}
      </td>
    </tr>

    <tr>
      <td colspan="7">
        {!! $invoice->customer->address_multi !!}
      </td>
      @if ($invoice->owing > 0)
      <td colspan="2" valign="top">
        <div class="cred">Payment&nbsp;Terms:</div>
      </td>
      <td colspan="3" valign="top" align="right">
        7 Days
      </td>
      @endif
    </tr>
    <tr><td colspan="12"><br /><br /></td></tr>

    <tr>
      <td colspan="1"><b>Qty</b></td>
      <td colspan="7"><b>Description</b></td>
      <td colspan="2" align="right"><b>Unit&nbsp;Price</b></td>
      <td colspan="2" align="right"><b>Total</b></td>
  </tr>

  @foreach($invoice->invoice_items as $invoice_item)
    <tr>
      <td colspan="1">{{ (int) $invoice_item->quantity }}</td>
      <td colspan="7">{{ $invoice_item->description }}</td>
      <td colspan="2" align="right">{{ $invoice_item->price }}</td>
      <td colspan="2" align="right">{{ number_format($invoice_item->total, 2) }}</td>
    </tr>
  @endforeach
  <tr><td><br /></td></tr>
<tr>
  <td colspan="7">&nbsp;</td>
  <td colspan="3"><b>Grand-total:</b></td>
  <td colspan="2" align="right">{{ number_format($invoice->total, 2) }}</td>
</tr>
<tr>
  <td colspan="7">&nbsp;</div>
  <td colspan="3"><b>Amount&nbsp;paid:</b></div>
  <td colspan="2" align="right">{{ number_format($invoice->paid, 2) }}</div>
</tr>
<tr>
  <td colspan="7">&nbsp;</div>
  <td colspan="3"><b>Balance&nbsp;owing:</b></div>
  <td colspan="2" align="right">{{ number_format($invoice->owing, 2) }}</div>
</tr>
<tr><td><br /></td></tr>
<tr>
  <td colspan="7">&nbsp;</div>
  <td colspan="5">No GST has been included</div>
</tr>
<tr><td><br /><hr /></td></tr>
<tr>
  <td colspan="8"><h4 class="cred">How to Pay</h4></div>
  <td colspan="4"><h4 class="cred">Enquiries</h4></div>
</tr>
<tr>
  <td colspan="4">Payment by EFT</div>
  <td colspan="4">Payment by Cheque</div>
  <td colspan="4">Phone: (02) 6112 8025</div>
</tr>
<tr>
  <td>BSB:<br>Account:<br>Reference:</div>
  <td colspan="3">082-902<br>115287822<br>Inv{{ $invoice->invoice_number}}</div>
  <td colspan="4">Mail Cheques to<br>238 La Perouse St<br>Red Hill ACT 2603</div>
  <td colspan="4">E mail@computerwhiz.com.au<br>W www.computerwhiz.com.au</div>
</tr>
</table>

@stop
