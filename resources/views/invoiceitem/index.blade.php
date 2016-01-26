<div class="form-group">
    <div class="row">
        @if ($invoice->invoice_items->count() > 0)
            <h4 class="col-xs-1">Qty</h4>
            <h4 class="col-xs-5">Description</h4>
            <h4 class="col-xs-2">Price</h4>
            <h4 class="col-xs-4">Actions</h4>
        @endif
    </div>
    @foreach($invoice->invoice_items as $invoice_item)
        <div class="row">
            <div class="col-xs-1">
                {{ $invoice_item->quantity }}
            </div>
            <div class="col-xs-5">
                {{ $invoice_item->description }}
            </div>
            <div class="col-xs-2">
                {{ $invoice_item->price }}
            </div>
            <div class="col-xs-4">
                <a class="btn btn-success" href="{{ action('InvoiceItemController@edit', [$invoice_item->id]) }}">
                    Edit
                </a>
                <a class="btn btn-primary" href="{{ action('InvoiceItemController@show', [$invoice_item->id]) }}">
                    View
                </a>
                <a class="btn btn-danger" href="{{ action('InvoiceItemController@delete', [$invoice_item->id]) }}">
                    Delete
                </a>
            </div>
        </div>
        <!-- add this empty row to get a 1 pixel separator between buttons on each row -->
        <div class="row"><div class="col-md-10"></div></div>
    @endforeach

</div>
        <div class="row">
            <div class="col-md-1">
                <a name='btnCreateItem' href="{{ action('InvoiceItemController@create1', [$invoice->id]) }}">
                    <button class="btn btn-primary">Create Item</button>
                </a>
            </div>
        </div>
