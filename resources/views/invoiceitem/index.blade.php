<div class="form-group">
    <div class="container">
        <table class="table-condensed" id="invoiceItemTable">
            <tbody>
                @if ($invoice->invoice_items->count() > 0)
                <tr>
                    <td><h4>Qty</h4></td>
                    <td><h4>Description</h4></td>
                    <td><h4>Price</h4></td>
                </tr>
                @endif

    @foreach($invoice->invoice_items as $invoice_item)
    <tr>
        <td>{{ $invoice_item->quantity }}</a></td>
        <td>
            @if(Gate::check('admin'))
            <a href='{{ action('InvoiceItemController@show', $invoice_item->id) }}'>
                {{ $invoice_item->description }}
            </a>
            @else
                {{ $invoice_item->description }}
            @endif
        </td>
        <td>{{ $invoice_item->price }}</td>
    </tr>
    @endforeach
    </tbody>
    </table>

    <hr />
    </div>
    @if(Gate::check('admin'))
    <a name='btnCreateItem' href="{{ action('InvoiceItemController@create1', [$invoice->id]) }}">
        <button class="btn btn-primary">Create Item</button>
    </a>
    @endif
